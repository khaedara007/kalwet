<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function send_whatsapp($phone, $message)
{
    // Simple stub for WhatsApp notifications. Integrate with real API later.
    $log = date('Y-m-d H:i:s') . " | WhatsApp to: $phone | $message\n";
    $file = APPPATH . '../whatsapp.log';
    file_put_contents($file, $log, FILE_APPEND);
    return true;
}
