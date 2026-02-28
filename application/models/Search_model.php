<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_model extends CI_Model
{

    // Data layanan hardcoded (tanpa database)
    private $layanan = [
        [
            'id' => 1,
            'kode_layanan' => 'SKTM',
            'nama_layanan' => 'Surat Keterangan Tidak Mampu',
            'deskripsi' => 'Surat keterangan untuk warga yang tidak mampu',
            'persyaratan' => 'Surat Pengantar RT RW, KTP dan Kartu Keluarga',
            'link' => 'service/submit/sktm'
        ],
        [
            'id' => 2,
            'kode_layanan' => 'SKD',
            'nama_layanan' => 'Surat Keterangan Domisili',
            'deskripsi' => 'Surat keterangan tempat tinggal',
            'persyarpsi' => 'Surat Pengantar RT RW, KTP dan Kartu Keluarga',
            'link' => 'service/submit/skd'
        ],
        [
            'id' => 3,
            'kode_layanan' => 'SKPO',
            'nama_layanan' => 'Surat Keterangan Penghasilan Orang Tua',
            'deskripsi' => 'Surat keterangan penghasilan untuk beasiswa dll',
            'persyaratan' => 'Surat Pengantar RT RW, KTP dan Kartu Keluarga',
            'link' => 'service/submit/skpo'
        ],
        [
            'id' => 4,
            'kode_layanan' => 'SKBM',
            'nama_layanan' => 'Surat Keterangan Belum Menikah',
            'deskripsi' => 'Surat keterangan status belum menikah',
            'persyaratan' => 'Surat Pengantar RT RW, KTP dan Kartu Keluarga',
            'link' => 'service/submit/skbm'
        ],
        [
            'id' => 5,
            'kode_layanan' => 'SKBR',
            'nama_layanan' => 'Surat Keterangan Belum Memiliki Rumah',
            'deskripsi' => 'Surat keterangan belum punya rumah',
            'persyaratan' => 'Surat Pengantar RT RW, KTP dan Kartu Keluarga',
            'link' => 'service/submit/skbr'
        ],
        [
            'id' => 6,
            'kode_layanan' => 'SKIH',
            'nama_layanan' => 'Surat Izin Hajatan',
            'deskripsi' => 'Izin untuk mengadakan hajatan/pernikahan',
            'persyaratan' => 'Surat Pengantar RT RW, KTP dan Kartu Keluarga',
            'link' => 'service/submit/skih'
        ],
        [
            'id' => 7,
            'kode_layanan' => 'SKCK',
            'nama_layanan' => 'Surat Pengantar SKCK',
            'deskripsi' => 'Surat pengantar untuk keperluan pembuatan SKCK baru',
            'persyaratan' => 'Surat Pengantar RT RW, KTP dan Kartu Keluarga',
            'link' => 'service/submit/skck'
        ],
        [
            'id' => 8,
            'kode_layanan' => 'SPKD',
            'nama_layanan' => 'Surat Pengantar Kehilangan Dokumen',
            'deskripsi' => 'Surat pengantar yang menyatakan seorang warga kehilangan dokumen penting',
            'persyaratan' => 'Surat Pengantar RT RW, KTP dan Kartu Keluarga',
            'link' => 'service/submit/spkd'
        ],
        [
            'id' => 9,
            'kode_layanan' => 'SKSN',
            'nama_layanan' => 'Surat Keterangan Satu Nama',
            'deskripsi' => 'Surat keterangan bahwa beberapa nama berbeda yang tercantum dalam dokumen kependudukan',
            'persyaratan' => 'Surat Pengantar RT RW, KTP dan Kartu Keluarga, Akta Kelahiran, Akta Nikah (Jika Sudah Menikah), Berkas Identitas yang Berbeda',
            'link' => 'service/submit/sksn'
        ],
        [
            'id' => 10,
            'kode_layanan' => 'SKM',
            'nama_layanan' => 'Surat Keterangan Kematian',
            'deskripsi' => 'Digunakan sebagai syarat administratif dasar untuk mengajukan Akta Kematian',
            'persyaratan' => 'Surat Pengantar RT RW, KTP  dan Kartu Keluarga yang meninggal, KTP Pelapor, KTP Saksi 2 orang, Surat Ket. Dokter',
            'link' => 'service/submit/home'

        ],
        [
            'id' => 11,
            'kode_layanan' => 'SKL',
            'nama_layanan' => 'Surat Keterangan Kelahiran',
            'deskripsi' => 'Digunakan sebagai syarat administratif dasar untuk mengajukan Akta Kelahiran',
            'persyaratan' => 'Surat Pengantar RT RW, KTP  dan Kartu Keluarga Orang Tua, Buku Nikah Orang Tua, KTP Pelapor, KTP Saksi 2 orang, Surat Ket. Dokter',
            'link' => 'service/submit/home'
        ],
        [
            'id' => 12,
            'kode_layanan' => 'SKKM',
            'nama_layanan' => 'Surat Kesaksian Kematian',
            'deskripsi' => 'Untuk kasus yang sudah lama meninggal namun belum memiliki akta sebagai bukti sah kematian untuk mengurus Akta Kematian',
            'persyaratan' => 'Surat Pengantar RT RW, KTP / Kartu Keluarga yang meninggal, KTP Saksi 2 orang, KK Saksi, Materai Rp. 10.000',
            'link' => 'service/submit/home'
        ],
        [
            'id' => 13,
            'kode_layanan' => 'SKKL',
            'nama_layanan' => 'Surat Kesaksian Kelahiran',
            'deskripsi' => 'Untuk membuktikan adanya kelahiran seseorang (baik bayi maupun orang dewasa/lansia yang belum punya akta)',
            'persyaratan' => 'Surat Pengantar RT RW, KTP / Kartu Keluarga Pemohon, KTP Saksi 2 orang, KK Saksi, Materai Rp. 10.000',
            'link' => 'service/submit/home'
        ]
    ];

    // Cari layanan (tanpa query database)
    public function cari($keyword)
    {
        $hasil = [];
        $keyword = strtolower($keyword);

        foreach ($this->layanan as $layanan) {
            if (
                strpos(strtolower($layanan['nama_layanan']), $keyword) !== false ||
                strpos(strtolower($layanan['deskripsi']), $keyword) !== false ||
                strpos(strtolower($layanan['kode_layanan']), $keyword) !== false
            ) {
                $hasil[] = $layanan;
            }
        }

        return $hasil;
    }

    // Ambil semua layanan
    public function get_all()
    {
        return $this->layanan;
    }
}
