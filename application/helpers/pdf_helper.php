<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('get_pdf_base64')) {
    function get_pdf_base64($filename)
    {
        $file_path = FCPATH . 'assets/uploads/sop/' . $filename;

        if (!file_exists($file_path)) {
            return false;
        }

        $pdf_content = file_get_contents($file_path);
        return base64_encode($pdf_content);
    }
}
