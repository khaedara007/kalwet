<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testpdf extends CI_Controller
{
    public function index()
    {
        // Test load DOMPDF
        if (file_exists(FCPATH . 'vendor/autoload.php')) {
            require_once FCPATH . 'vendor/autoload.php';
            echo "Composer autoload ditemukan!<br>";

            try {
                $options = new \Dompdf\Options();
                echo "DOMPDF Options class loaded!<br>";

                $dompdf = new \Dompdf\Dompdf($options);
                echo "DOMPDF berhasil di-load!";
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "File vendor/autoload.php tidak ditemukan!<br>";
            echo "Silakan install DOMPDF dengan: composer require dompdf/dompdf";
        }
    }
}
