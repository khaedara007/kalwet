<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Service_model', 'Service_type_model'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
    }

    protected function check_login()
    {
        $user = $this->session->userdata('user');
        if (!$user) redirect('login');
        return $user;
    }

    public function submit($jenis_layanan)
    {
        $user = $this->check_login();

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('name', 'Full Name', 'required');
            $this->form_validation->set_rules('nik', 'NIK', 'required|exact_length[16]');
            $this->form_validation->set_rules('kk_number', 'KK Number', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('service_type', 'Service Type', 'required');

            if ($this->form_validation->run() === FALSE) {
                $data['types'] = $this->Service_type_model->get_active();
                $data['jenis_layanan'] = $jenis_layanan;
                if ($jenis_layanan === 'sktm') {
                    $this->load->view('user/service_form_sktm', $data);
                } elseif ($jenis_layanan === 'skd') {
                    $this->load->view('user/service_form_skd', $data);
                } elseif ($jenis_layanan === 'skpo') {
                    $this->load->view('user/service_form_skpo', $data);
                } elseif ($jenis_layanan === 'skbm') {
                    $this->load->view('user/service_form_skbm', $data);
                } elseif ($jenis_layanan === 'skbr') {
                    $this->load->view('user/service_form_skbr', $data);
                } elseif ($jenis_layanan === 'sih') {
                    $this->load->view('user/service_form_sih', $data);
                } elseif ($jenis_layanan === 'sksn') {
                    $this->load->view('user/service_form_sksn', $data);
                } elseif ($jenis_layanan === 'skm') {
                    $this->load->view('user/service_form_skm', $data);
                } elseif ($jenis_layanan === 'skl') {
                    $this->load->view('user/service_form_skl', $data);
                } elseif ($jenis_layanan === 'skck') {
                    $this->load->view('user/service_form_skck', $data);
                } elseif ($jenis_layanan === 'spkd') {
                    $this->load->view('user/service_form_spkd', $data);
                } else {
                    show_404();
                }
                return;
            }

            // handle upload - use absolute path and robust checks
            $config = [
                'upload_path' => FCPATH . 'assets/uploads/documents/',
                'allowed_types' => 'pdf|jpg|jpeg|png',
                'max_size' => 4096, // 4MB
            ];

            if (!is_dir($config['upload_path'])) {
                @mkdir($config['upload_path'], 0755, true);
            }

            $this->load->library('upload', $config);
            $payload = [];

            $service_type = $this->input->post('service_type');
            if (in_array($service_type, ['sktm', 'skd', 'skpo', 'skbm', 'skbr', 'sih', 'skck', 'spkd'])) {
                $upload_errors = [];
                $fields = ['upload_suratrtrw', 'upload_kk', 'upload_ktp'];
                foreach ($fields as $field) {
                    if (!empty($_FILES[$field]['name'])) {
                        $ext = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
                        $rand = mt_rand(100000, 999999);
                        $new_name = 'documents_' . $service_type . '_' . $rand . '_' . $field . '.' . $ext;
                        $config['file_name'] = $new_name;
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload($field)) {
                            $data_file = $this->upload->data();
                            $payload[$field] = isset($data_file['file_name']) ? $data_file['file_name'] : null;
                        } else {
                            $upload_errors[$field] = $this->upload->display_errors('', '');
                            $payload[$field] = null;
                        }
                    } else {
                        $payload[$field] = null;
                    }
                }
            }
            if (in_array($service_type, ['sksn'])) {
                $upload_errors = [];
                $fields = ['upload_suratrtrw', 'upload_kk', 'upload_ktp', 'upload_aktal', 'upload_aktan', 'upload_identitaslain'];
                foreach ($fields as $field) {
                    if (!empty($_FILES[$field]['name'])) {
                        $ext = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
                        $rand = mt_rand(100000, 999999);
                        $new_name = 'documents_' . $service_type . '_' . $rand . '_' . $field . '.' . $ext;
                        $config['file_name'] = $new_name;
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload($field)) {
                            $data_file = $this->upload->data();
                            $payload[$field] = isset($data_file['file_name']) ? $data_file['file_name'] : null;
                        } else {
                            $upload_errors[$field] = $this->upload->display_errors('', '');
                            $payload[$field] = null;
                        }
                    } else {
                        $payload[$field] = null;
                    }
                }
            }
            if (in_array($service_type, ['skm'])) {
                $upload_errors = [];
                $fields = ['upload_suratrtrw', 'upload_kk', 'upload_ktp', 'upload_ktpp', 'upload_ktps1', 'upload_ktps2', 'upload_suketdok'];
                foreach ($fields as $field) {
                    if (!empty($_FILES[$field]['name'])) {
                        $ext = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
                        $rand = mt_rand(100000, 999999);
                        $new_name = 'documents_' . $service_type . '_' . $rand . '_' . $field . '.' . $ext;
                        $config['file_name'] = $new_name;
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload($field)) {
                            $data_file = $this->upload->data();
                            $payload[$field] = isset($data_file['file_name']) ? $data_file['file_name'] : null;
                        } else {
                            $upload_errors[$field] = $this->upload->display_errors('', '');
                            $payload[$field] = null;
                        }
                    } else {
                        $payload[$field] = null;
                    }
                }
            }
            if (in_array($service_type, ['skl'])) {
                $upload_errors = [];
                $fields = ['upload_suratrtrw', 'upload_aktan', 'upload_kk', 'upload_ktp', 'upload_ktpp', 'upload_ktps1', 'upload_ktps2', 'upload_suketdok'];
                foreach ($fields as $field) {
                    if (!empty($_FILES[$field]['name'])) {
                        $ext = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
                        $rand = mt_rand(100000, 999999);
                        $new_name = 'documents_' . $service_type . '_' . $rand . '_' . $field . '.' . $ext;
                        $config['file_name'] = $new_name;
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload($field)) {
                            $data_file = $this->upload->data();
                            $payload[$field] = isset($data_file['file_name']) ? $data_file['file_name'] : null;
                        } else {
                            $upload_errors[$field] = $this->upload->display_errors('', '');
                            $payload[$field] = null;
                        }
                    } else {
                        $payload[$field] = null;
                    }
                }
            }


            $payload += [
                'user_id' => $user->id,
                'name' => $this->input->post('name'),
                'nik' => $this->input->post('nik'),
                'kk_number' => $this->input->post('kk_number'),
                'phone' => $this->input->post('phone'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'address' => $this->input->post('address'),
                'service_type' => $this->input->post('service_type'),
                'additional_notes' => $this->input->post('additional_notes'),
                'status' => 'under_review',
                'submitted_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->Service_model->create_request($payload);
            $this->load->view('user/sukses', ['success' => 'Request submitted.']);
            return;
        }

        $data['types'] = $this->Service_type_model->get_active();
        $data['jenis_layanan'] = $jenis_layanan;
        if ($jenis_layanan === 'sktm') {
            $this->load->view('user/service_form_sktm', $data);
        } elseif ($jenis_layanan === 'skd') {
            $this->load->view('user/service_form_skd', $data);
        } elseif ($jenis_layanan === 'skpo') {
            $this->load->view('user/service_form_skpo', $data);
        } elseif ($jenis_layanan === 'skbm') {
            $this->load->view('user/service_form_skbm', $data);
        } elseif ($jenis_layanan === 'skbr') {
            $this->load->view('user/service_form_skbr', $data);
        } elseif ($jenis_layanan === 'sih') {
            $this->load->view('user/service_form_sih', $data);
        } elseif ($jenis_layanan === 'sksn') {
            $this->load->view('user/service_form_sksn', $data);
        } elseif ($jenis_layanan === 'skm') {
            $this->load->view('user/service_form_skm', $data);
        } elseif ($jenis_layanan === 'skl') {
            $this->load->view('user/service_form_skl', $data);
        } elseif ($jenis_layanan === 'skck') {
            $this->load->view('user/service_form_skck', $data);
        } elseif ($jenis_layanan === 'spkd') {
            $this->load->view('user/service_form_spkd', $data);
        } else {
            show_404();
        }
    }

    public function revise($id)
    {
        $user = $this->session->userdata('user');
        if (!$user) {
            redirect('login');
        }

        // Ambil data permohonan
        $this->db->where('id', $id);
        $this->db->where('user_id', $user->id);
        $request = $this->db->get('service_requests')->row();

        if (!$request) {
            $this->session->set_flashdata('error', 'Permohonan tidak ditemukan!');
            redirect('dashboard');
        }
        $layanan_mapping = [
            'sktm' => 'Surat Keterangan Tidak Mampu',
            'skbr' => 'Surat Keterangan Belum Memiliki Rumah',
            'skd' => 'Surat Keterangan Domisili',
            'sksn' => 'Surat Keterangan Satu Nama',
            'skpo' => 'Surat Keterangan Penghasilan Orang Tua',
            'skck' => 'Surat Keterangan Catatan Kepolisian',
            'skbm' => 'Surat Keterangan Belum Menikah',
            'sih' => 'Surat Izin Hajatan',
            'skm' => 'Surat Keterangan Kematian',
            'skl' => 'Surat Keterangan Kelahiran',
            'spkd' => 'Surat Pengantar Kehilangan Dokumen',
            // tambahkan lainnya sesuai kebutuhan
        ];

        // Tambahkan property baru untuk nama layanan lengkap
        $request->service_name_display = isset($layanan_mapping[$request->service_type])
            ? $layanan_mapping[$request->service_type]
            : $request->service_type;

        // Proses jika POST
        if ($this->input->method() === 'post') {

            // Update data pribadi
            $data_update = array(
                'name' => $this->input->post('name'),
                'nik' => $this->input->post('nik'),
                'kk_number' => $this->input->post('kk_number'),
                'phone' => $this->input->post('phone'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'address' => $this->input->post('address'),
                'additional_notes' => $this->input->post('additional_notes'),
                'status' => 'under_review',
                'rejection_reason' => null,
                'updated_at' => date('Y-m-d H:i:s')
            );

            // Update dokumen jika ada file baru
            $upload_fields = array(
                'upload_suratrtrw',
                'upload_kk',
                'upload_ktp',
                'upload_aktal',
                'upload_aktan',
                'upload_identitaslain',
                'upload_ktpp',
                'upload_ktps1',
                'upload_ktps2',
                'upload_suketdok'
            );

            $config['upload_path'] = './assets/uploads/documents/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            foreach ($upload_fields as $field) {
                if (!empty($_FILES[$field]['name'])) {
                    if ($this->upload->do_upload($field)) {
                        $upload_data = $this->upload->data();
                        $data_update[$field] = $upload_data['file_name'];
                    }
                }
            }

            // Update database
            $this->db->where('id', $id);
            $this->db->update('service_requests', $data_update);

            $this->session->set_flashdata('success', 'Permohonan berhasil direvisi dan dikirim ulang!');
            redirect('user/landing');
        }

        $data['request'] = $request;
        $this->load->view('user/revise', $data);
    }

    public function pilih_service()
    {
        $this->load->view('user/pilih_service');
    }
}
