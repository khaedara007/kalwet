<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * EscapeInput hook for CodeIgniter 3
 * - Recursively applies html_escape() to all $_GET/$_POST/$_REQUEST values
 * - Respects an exceptions config file at application/config/escape.php
 * - Preserves non-string values
 * - Handles JSON request bodies (stores escaped array in $this->escaped_json)
 *
 * Install:
 * 1. Put this file into application/hooks/EscapeInput.php
 * 2. Create application/config/escape.php (example below)
 * 3. Enable hooks in application/config/config.php: $config['enable_hooks'] = TRUE;
 * 4. Add the hook to application/config/hooks.php (example below)
 *
 * Notes:
 * - This will mutate PHP superglobals early in the request life-cycle so your
 *   controllers will see escaped values via $this->input->post() / $_POST etc.
 * - Use the exceptions config to keep raw HTML fields (e.g. WYSIWYG inputs)
 */

class EscapeInput
{
    protected $CI;
    protected $exceptions = array();

    public function __construct()
    {
        $this->CI = &get_instance();
        // Load optional config file (create application/config/escape.php)
        if ($this->CI->config->load('escape', TRUE, TRUE)) {
            $cfg = $this->CI->config->item('exceptions', 'escape');
            if (is_array($cfg)) {
                $this->exceptions = $cfg;
            }
        }

        // ensure html_escape() is available
        if (!function_exists('html_escape')) {
            $this->CI->load->helper('security');
        }
    }

    // Hook entry point
    public function run()
    {
        // Don't run for CLI
        if (defined('STDIN')) return;

        // Respect content-type for JSON bodies
        $content_type = isset($_SERVER['CONTENT_TYPE']) ? strtolower($_SERVER['CONTENT_TYPE']) : '';

        // Escape superglobals
        $_GET     = $this->recursive_escape($_GET);
        $_POST    = $this->recursive_escape($_POST);
        $_REQUEST = $this->recursive_escape($_REQUEST);

        // If JSON body, parse and store escaped version on the CI instance
        if (strpos($content_type, 'application/json') !== false) {
            $raw = file_get_contents('php://input');
            $json = json_decode($raw, true);
            if (is_array($json)) {
                $this->CI->escaped_json = $this->recursive_escape($json);
            }
        }
    }

    // Recursively escape strings in arrays/values
    protected function recursive_escape($data, $path = '')
    {
        if (is_array($data)) {
            $out = array();
            foreach ($data as $k => $v) {
                $newPath = ($path === '') ? $k : ($path . '.' . $k);
                if ($this->is_exception($newPath, $k)) {
                    $out[$k] = $v; // leave raw
                } else {
                    $out[$k] = $this->recursive_escape($v, $newPath);
                }
            }
            return $out;
        }

        // For scalars, only escape strings
        if (is_string($data)) {
            return html_escape($data);
        }

        return $data;
    }

    // Determine if a field/key should be left raw
    protected function is_exception($path, $key)
    {
        // Exact key match or dot-path match
        foreach ($this->exceptions as $ex) {
            if ($ex === $key || $ex === $path) return true;

            // Support wildcard at end: "some.field.*" or "description_*"
            if (substr($ex, -1) === '*') {
                $prefix = rtrim($ex, '*');
                if (strpos($path, $prefix) === 0 || strpos($key, $prefix) === 0) return true;
            }
        }
        return false;
    }
}
