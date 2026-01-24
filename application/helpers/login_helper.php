<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Login Helper
 * Provides simple IP-based login attempt limitation using session.
 *
 * Usage example in controller:
 * 
 *   if (!check_login_attempts()) {
 *       show_error('Too many failed login attempts. Please wait.', 429);
 *       return;
 *   }
 * 
 *   if ($auth_success) {
 *       reset_login_attempts();
 *   } else {
 *       record_failed_login();
 *   }
 */

/**
 * Check if current IP can attempt login.
 *
 * @param int $max_attempts   Maximum allowed attempts
 * @param int $lockout_time   Lockout duration in seconds
 * @return bool
 */
function check_login_attempts($max_attempts = 5, $lockout_time = 600)
{
    $CI = &get_instance();
    $ip = $CI->input->ip_address();

    $attempts = $CI->session->userdata('login_attempts_' . $ip);
    if (!is_array($attempts)) {
        $attempts = [];
    }

    // Remove expired attempts
    $current_time = time();
    $attempts = array_filter($attempts, function ($timestamp) use ($current_time, $lockout_time) {
        return ($timestamp > ($current_time - $lockout_time));
    });

    // Save cleaned list
    $CI->session->set_userdata('login_attempts_' . $ip, $attempts);

    if (count($attempts) >= $max_attempts) {
        return FALSE; // Locked out
    }

    return TRUE; // Allowed
}

/**
 * Record a failed login attempt.
 */
function record_failed_login()
{
    $CI = &get_instance();
    $ip = $CI->input->ip_address();

    $attempts = $CI->session->userdata('login_attempts_' . $ip);
    if (!is_array($attempts)) {
        $attempts = [];
    }

    $attempts[] = time();
    $CI->session->set_userdata('login_attempts_' . $ip, $attempts);
}

/**
 * Reset login attempts (on successful login).
 */
function reset_login_attempts()
{
    $CI = &get_instance();
    $ip = $CI->input->ip_address();
    $CI->session->unset_userdata('login_attempts_' . $ip);
}
