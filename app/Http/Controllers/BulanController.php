<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\SubKegiatan;

class BulanController extends Controller
{
    // Metode index untuk admin
    public function index()
    {
        $bulan = Bulan::orderBy('created_at', 'asc')->get();
        return Inertia::render('Bulan/Index', ['bulan' => $bulan]);
    }

    public function tampil(Bulan $bulan)
    {
    // Fetch the month with related programs, activities, and sub-activities
    $bulan = Bulan::with(['programs.kegiatans.subKegiatans'])->find($bulan->id);

    return Inertia::render('Bulan/Show', [
        'bulan' => $bulan
    ]);
}
    // Metode khusus untuk user (userBulanIndex)
    public function userBulanIndex()
    {
        // Urutkan berdasarkan 'created_at' secara ascending
        $bulan = Bulan::orderBy('created_at', 'asc')->get();
        return Inertia::render('User/Bulan/Index', ['bulan' => $bulan]);
    }

    public function create()
    {
        return Inertia::render('Bulan/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($request) {
            $bulan = Bulan::create($request->only('bulan'));

            // Tambah program, kegiatan, sub-kegiatan secara otomatis di sini
                        // Daftar program yang akan dibuat
            $programs = [
                [
                    'nama_program' => 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA',
                    'nama_indikator' => 'Persentase Perencanaan dan pelaporan Kinerja SKPD',
                    'jumlah_indikator' => 100,
                    'tipe_indikator' => 'Persen',
                    'anggaran_murni' => 0,
                    'kegiatans' => [
                        [
                            'nama_kegiatan' => 'Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat Daerah',
                            'nama_indikator' => 'Persentase perencanaan dan pelaporan kinerja SKPD',
                            'jumlah_indikator' => 100,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Penyusunan Dokumen Perencanaan Perangkat Daerah',
                                    'nama_indikator' => 'Jumlah Dokumen Perencanaan Perangkat Daerah',
                                    'jumlah_indikator' => 3,
                                    'tipe_indikator' => 'Dokumen',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Koordinasi dan Penyusunan Dokumen RKA-SKPD',
                                    'nama_indikator' => 'Jumlah Dokumen RKA-SKPD dan Laporan Hasil Koordinasi Penyusunan Dokumen RKA-SKPD',
                                    'jumlah_indikator' => 1,
                                    'tipe_indikator' => 'Dokumen',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Koordinasi dan Penyusunan Dokumen Perubahan RKA-SKPD',
                                    'nama_indikator' => 'Jumlah Dokumen Perubahan RKA-SKPD dan Laporan Hasil Koordinasi Penyusunan Dokumen
Perubahan RKA-SKPD',
                                    'jumlah_indikator' => 1,
                                    'tipe_indikator' => 'Dokumen',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Koordinasi dan Penyusunan DPA-SKPD',
                                    'nama_indikator' => 'Jumlah Dokumen DPA-SKPD dan Laporan Hasil Koordinasi Penyusunan Dokumen DPA-SKPD',
                                    'jumlah_indikator' => 1,
                                    'tipe_indikator' => 'Dokumen',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Koordinasi dan Penyusunan Perubahan DPA-SKPD',
                                    'nama_indikator' => 'Jumlah Dokumen Perubahan DPA-SKPD dan Laporan Hasil Koordinasi Penyusunan Dokumen',
                                    'jumlah_indikator' => 1,
                                    'tipe_indikator' => 'Dokumen',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Koordinasi dan Penyusunan Laporan Capaian Kinerja dan Ikhtisar Realisasi Kinerja SKPD',
                                    'nama_indikator' => 'Jumlah Laporan Capaian Kinerja dan Ikhtisar Realisasi Kinerja SKPD dan Laporan Hasil	',
                                    'jumlah_indikator' => 2,
                                    'tipe_indikator' => 'Dokumen',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Evaluasi Kinerja Perangkat Daerah',
                                    'nama_indikator' => 'Jumlah Laporan Evaluasi Kinerja Perangkat Daerah',
                                    'jumlah_indikator' => 3,
                                    'tipe_indikator' => 'Dokumen',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Administrasi Keuangan Perangkat Daerah',
                            'nama_indikator' => 'Persentase kinerja administrasi dan pelaporan keuangan',
                            'jumlah_indikator' => 100,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Gaji dan Tunjangan ASN',
                                    'nama_indikator' => 'Jumlah Orang yang Menerima Gaji dan Tunjangan ASN	',
                                    'jumlah_indikator' => 71,
                                    'tipe_indikator' => 'orang/bulan',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Administrasi Pelaksanaan Tugas ASN',
                                    'nama_indikator' => 'Jumlah Dokumen Hasil Penyediaan Administrasi Pelaksanaan Tugas ASN',
                                    'jumlah_indikator' => 12,
                                    'tipe_indikator' => 'Dokumen',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Koordinasi dan Penyusunan Laporan Keuangan Bulanan/Triwulanan/Semesteran SKPD',
                                    'nama_indikator' => 'Jumlah Laporan Keuangan Bulanan/ Triwulanan/ Semesteran SKPD dan Laporan Koordinasi',
                                    'jumlah_indikator' => 12,
                                    'tipe_indikator' => 'Laporan',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Administrasi Umum Perangkat Daerah',
                            'nama_indikator' => 'Persentase tersedianya sarana prasarana perkantoran Dinas Tenaga Kerja',
                            'jumlah_indikator' => 100,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Komponen Instalasi Listrik/Penerangan Bangunan Kantor',
                                    'nama_indikator' => 'Jumlah Paket Komponen Instalasi Listrik/Penerangan Bangunan Kantor yang Disediakan',
                                    'jumlah_indikator' => 3,
                                    'tipe_indikator' => 'Paket',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Peralatan dan Perlengkapan Kantor',
                                    'nama_indikator' => 'Jumlah Paket Peralatan dan Perlengkapan Kantor yang Disediakan',
                                    'jumlah_indikator' => 2,
                                    'tipe_indikator' => 'Paket',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Peralatan Rumah Tangga',
                                    'nama_indikator' => 'Jumlah Paket Peralatan Rumah Tangga yang Disediakan',
                                    'jumlah_indikator' => 5,
                                    'tipe_indikator' => 'Paket',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Bahan Logistik Kantor',
                                    'nama_indikator' => 'Jumlah Paket Bahan Logistik Kantor yang Disediakan',
                                    'jumlah_indikator' => 8,
                                    'tipe_indikator' => 'Paket',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Barang Cetakan dan Penggandaan',
                                    'nama_indikator' => 'Jumlah Paket Barang Cetakan dan Penggandaan yang Disediakan',
                                    'jumlah_indikator' => 7,
                                    'tipe_indikator' => 'Paket',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Bahan Bacaan dan Peraturan Perundang-undangan',
                                    'nama_indikator' => 'Jumlah Dokumen Bahan Bacaan dan Peraturan Perundang-Undangan yang Disediakan',
                                    'jumlah_indikator' => 36,
                                    'tipe_indikator' => 'Dokumen',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Fasilitasi Kunjungan Tamu',
                                    'nama_indikator' => 'Jumlah Laporan Fasilitasi Kunjungan Tamu',
                                    'jumlah_indikator' => 200,
                                    'tipe_indikator' => 'Laporan',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyelenggaraan Rapat Koordinasi dan Konsultasi SKPD',
                                    'nama_indikator' => 'Jumlah Laporan Penyelenggaraan Rapat Koordinasi dan Konsultasi SKPD',
                                    'jumlah_indikator' => 100,
                                    'tipe_indikator' => 'Laporan',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penatausahaan Arsip Dinamis pada SKPD',
                                    'nama_indikator' => 'Jumlah Dokumen Penatausahaan Arsip Dinamis pada SKPD',
                                    'jumlah_indikator' => 4,
                                    'tipe_indikator' => 'Dokumen',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Dukungan Pelaksanaan Sistem Pemerintahan Berbasis Elektronik pada SKPD',
                                    'nama_indikator' => 'Jumlah Dokumen Dukungan Pelaksanaan Sistem Pemerintahan Berbasis Elektronik pada SKPD',
                                    'jumlah_indikator' => 3,
                                    'tipe_indikator' => 'Dokumen',
                                ],

                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Pengadaan Barang Milik Daerah Penunjang Urusan Pemerintah Daerah',
                            'nama_indikator' => 'Persentase tersedianya sarana prasarana perkantoran Dinas Tenaga Kerja',
                            'jumlah_indikator' => 100,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Pengadaan Mebel',
                                    'nama_indikator' => 'Jumlah Paket Mebel yang Disediakan',
                                    'jumlah_indikator' => 48,
                                    'tipe_indikator' => 'Unit',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Penyediaan Jasa Penunjang Urusan Pemerintahan Daerah',
                            'nama_indikator' => 'Persentase tersedianya sarana prasarana perkantoran Dinas Tenaga Kerja',
                            'jumlah_indikator' => 100,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Jasa Komunikasi, Sumber Daya Air dan Listrik',
                                    'nama_indikator' => 'Jumlah Laporan Penyediaan Jasa Komunikasi, Sumber Daya Air dan Listrik yang Disediakan',
                                    'jumlah_indikator' => 12,
                                    'tipe_indikator' => 'Laporan',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Jasa Pelayanan Umum Kantor',
                                    'nama_indikator' => 'Jumlah Laporan Penyediaan Jasa Pelayanan Umum Kantor yang Disediakan',
                                    'jumlah_indikator' => 12,
                                    'tipe_indikator' => 'Laporan',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Pemeliharaan Barang Milik Daerah Penunjang Urusan Pemerintahan Daerah',
                            'nama_indikator' => 'Persentase tersedianya sarana prasarana perkantoran Dinas Tenaga Kerja',
                            'jumlah_indikator' => 100,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Jasa Pemeliharaan, Biaya Pemeliharaan dan Pajak Kendaraan Perorangan Dinas atau Kendaraan Dinas Jabatan',
                                    'nama_indikator' => 'Jumlah Kendaraan Perorangan Dinas atau Kendaraan Dinas Jabatan yang Dipelihara dan',
                                    'jumlah_indikator' => 1,
                                    'tipe_indikator' => 'Unit',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Jasa Pemeliharaan, Biaya Pemeliharaan, Pajak, dan Perizinan Kendaraan Dinas Operasional atau Lapangan',
                                    'nama_indikator' => 'Jumlah Kendaraan Dinas Operasional atau Lapangan yang Dipelihara dan dibayarkan Pajak dan Perizinannya',
                                    'jumlah_indikator' => 25,
                                    'tipe_indikator' => 'Unit',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Pemeliharaan Peralatan dan Mesin Lainnya',
                                    'nama_indikator' => 'Jumlah Peralatan dan Mesin Lainnya yang Dipelihara	',
                                    'jumlah_indikator' => 103,
                                    'tipe_indikator' => 'Unit',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Pemeliharaan/Rehabilitasi Gedung Kantor dan Bangunan Lainnya',
                                    'nama_indikator' => 'Jumlah Gedung Kantor dan Bangunan Lainnya yang Dipelihara/Direhabilitasi',
                                    'jumlah_indikator' => 3,
                                    'tipe_indikator' => 'Unit',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                    ],
                ],
                [
                    'nama_program' => 'PROGRAM PERENCANAAN TENAGA KERJA',
                    'nama_indikator' => 'Persentase prog./keg. yang dilaksanakan yang mengacu ke rencana tenaga kerja',
                    'jumlah_indikator' => 65,
                    'tipe_indikator' => 'Persen',
                    'anggaran_murni' => 0,
                    'kegiatans' => [
                        [
                            'nama_kegiatan' => 'Penyusunan Rencana Tenaga Kerja (RTK)',
                            'nama_indikator' => 'Persentase prog./keg. yang dilaksanakan yang mengacu ke rencana tenaga kerja',
                            'jumlah_indikator' => 65,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Penyusunan Rencana Tenaga Kerja Makro',
                                    'nama_indikator' => 'Jumlah Dokumen Rencana Tenaga Kerja Makro',
                                    'jumlah_indikator' => 1,
                                    'tipe_indikator' => 'Dokumen',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyusunan Rencana Tenaga Kerja Mikro',
                                    'nama_indikator' => 'Jumlah Perusahaan yang Menyusun RTK Mikro',
                                    'jumlah_indikator' => 5,
                                    'tipe_indikator' => 'Perusahaan',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                    ],
                ],
                [
                    'nama_program' => 'PROGRAM PELATIHAN KERJA DAN PRODUKTIVITAS TENAGA KERJA',
                    'nama_indikator' => 'Persentase Tenaga Kerja Bersertifikat Kompetensi',
                    'jumlah_indikator' => 77,
                    'tipe_indikator' => 'Persen',
                    'anggaran_murni' => 0,
                    'kegiatans' => [
                        [
                            'nama_kegiatan' => 'Pelaksanaan Pelatihan berdasarkan Unit Kompetensi',
                            'nama_indikator' => 'Persentase tenaga kerja yang mendapatkan pelatihan berbasis kompetensi',
                            'jumlah_indikator' => 50,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Proses Pelaksanaan Pendidikan dan Pelatihan Keterampilan bagi Pencari Kerja berdasarkan Klaster Kompetensi',
                                    'nama_indikator' => 'Jumlah Tenaga Kerja yang Mendapat Pelatihan Berbasis Kompetensi pada Tahun n',
                                    'jumlah_indikator' => 660,
                                    'tipe_indikator' => 'Orang',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Pengadaan Sarana Pelatihan Kerja Kabupaten/Kota',
                                    'nama_indikator' => 'Jumlah Pengadaan dan Pemeliharaan Sarana Pelatihan Kerja',
                                    'jumlah_indikator' => 4,
                                    'tipe_indikator' => 'Paket',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Pembinaan Lembaga Pelatihan Kerja Swasta',
                            'nama_indikator' => 'Persentase LPK swasta yang terakreditasi',
                            'jumlah_indikator' => 20,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Pembinaan Lembaga Pelatihan Kerja Swasta',
                                    'nama_indikator' => 'Jumlah Lembaga Pelatihan Kerja Swasta yang Dibina',
                                    'jumlah_indikator' => 65,
                                    'tipe_indikator' => 'Lembaga',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Perizinan dan Pendaftaran Lembaga Pelatihan Kerja',
                            'nama_indikator' => 'Persentase LPK swasta yang memiliki izin',
                            'jumlah_indikator' => 100,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Penyediaan Sumber Daya Perizinan Lembaga Pelatihan Kerja secara Terintegrasi',
                                    'nama_indikator' => 'Jumlah Sumber Daya Perizinan Lembaga Pelatihan Kerja Secara Terintegrasi',
                                    'jumlah_indikator' => 15,
                                    'tipe_indikator' => 'Perizinan',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Konsultansi Produktivitas pada Perusahaan Kecil',
                            'nama_indikator' => 'Jumlah perusahaan yang menerapkan program produktivitas',
                            'jumlah_indikator' => 10,
                            'tipe_indikator' => 'Perusahaan',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Pelaksanaan Konsultasi Produktivitas kepada Perusahaan Kecil',
                                    'nama_indikator' => 'Jumlah Perusahaan Kecil yang Mendapat Konsultansi Peningkatan Produktivitas',
                                    'jumlah_indikator' => 10,
                                    'tipe_indikator' => 'Perusahaan',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Pengukuran Produktivitas Tingkat Daerah Kabupaten/Kota',
                            'nama_indikator' => 'Tingkat produktivitas tenaga kerja',
                            'jumlah_indikator' => 151227000,
                            'tipe_indikator' => 'Rupiah',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Pengukuran Kompetensi dan Produktivitas Tenaga Kerja',
                                    'nama_indikator' => 'Jumlah Dokumen Hasil Pengukuran Produktivitas dan Daya Saing Tenaga Kerja di Tingkat',
                                    'jumlah_indikator' => 10,
                                    'tipe_indikator' => 'Dokumen',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                    ],
                ],
                [
                    'nama_program' => 'PROGRAM PENEMPATAN TENAGA KERJA',
                    'nama_indikator' => 'Persentase tenaga kerja yang ditempatkan',
                    'jumlah_indikator' => 66,
                    'tipe_indikator' => 'Persen',
                    'anggaran_murni' => 0,
                    'kegiatans' => [
                        [
                            'nama_kegiatan' => 'Pelayanan Antarkerja di Daerah Kabupaten/Kota',
                            'nama_indikator' => 'Persentase tenaga kerja yang mendapatkan pelatihan berbasis kompetensi',
                            'jumlah_indikator' => 2000,
                            'tipe_indikator' => 'Orang',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Pelayanan antar Kerja',
                                    'nama_indikator' => 'Jumlah Tenaga Kerja yang Ditempatkan Melalui Layanan AKAD dan AK',
                                    'jumlah_indikator' => 50,
                                    'tipe_indikator' => 'Orang',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyuluhan dan Bimbingan Jabatan bagi Pencari Kerja',
                                    'nama_indikator' => 'Jumlah Pencari Kerja yang Mendapatkan Penyuluhan dan Bimbingan Jabatan',
                                    'jumlah_indikator' => 50,
                                    'tipe_indikator' => 'Orang',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyelenggaraan Unit Layanan Disabilitas Ketenagakerjaan',
                                    'nama_indikator' => 'Jumlah Tenaga Kerja Disabilitas yang Mendapatkan Fasilitasi Layanan ULD',
                                    'jumlah_indikator' => 15,
                                    'tipe_indikator' => 'Orang',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Perluasan Kesempatan Kerja',
                                    'nama_indikator' => 'Jumlah Tenaga Kerja yang Diberdayakan Melalui program Perluasan Kesempatan Kerja',
                                    'jumlah_indikator' => 60,
                                    'tipe_indikator' => 'Orang',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Penerbitan Izin Lembaga Penempatan Tenaga Kerja Swasta (LPTKS) dalam 1 (satu) Daerah Kabupaten/Kota',
                            'nama_indikator' => 'Persentase izin LPTKS yang diterbitkan',
                            'jumlah_indikator' => 100,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Pengawasan dan Pengendalian LPTKS',
                                    'nama_indikator' => 'Jumlah LPTKS yang Dilakukan Pengawasan dan Pengendalian Sesuai dengan Aturan yang Berlaku',
                                    'jumlah_indikator' => 5,
                                    'tipe_indikator' => 'Lembaga',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Pengelolaan Informasi Pasar Kerja',
                            'nama_indikator' => 'Jumlah tenaga kerja yang ditempatkan melalui IPK dan bursa kerja',
                            'jumlah_indikator' => 2500,
                            'tipe_indikator' => 'Orang',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Pelayanan dan Penyediaan Informasi Pasar Kerja Online',
                                    'nama_indikator' => 'Jumlah Pencari dan Pemberi Kerja yang Terdaftar dalam Pasar Kerja Melalui Sistem Online (Karir Hub)',
                                    'jumlah_indikator' => 2500,
                                    'tipe_indikator' => 'Orang',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Job Fair/Bursa Kerja',
                                    'nama_indikator' => 'Jumlah Pencari Kerja yang Mendapatkan Pekerjaan Melalui Job Fair/Bursa Kerja',
                                    'jumlah_indikator' => 750,
                                    'tipe_indikator' => 'Orang',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Pelindungan PMI (Pra dan Purna Penempatan) di Daerah Kabupaten/Kota',
                            'nama_indikator' => 'Jumlah perlindungan Pekerja Migran Indonesia (pra dan purna penempatan)',
                            'jumlah_indikator' => 40,
                            'tipe_indikator' => 'Orang',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Peningkatan Pelindungan dan Kompetensi Calon Pekerja Migran Indonesia (PMI)/Pekerja Migran Indonesia (PMI)',
                                    'nama_indikator' => 'Jumlah CPMI/PMI yang Dilindungi dan Ditingkatkan Kompetensinya',
                                    'jumlah_indikator' => 30,
                                    'tipe_indikator' => 'Orang',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Pemberdayaan Pekerja Migran Indonesia Purna Penempatan',
                                    'nama_indikator' => 'Jumlah PMI Purna yang Diberdayakan',
                                    'jumlah_indikator' => 15,
                                    'tipe_indikator' => 'Orang',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Penerbitan Perpanjangan IMTA yang Lokasi Kerja dalam 1 (satu) Daerah Kabupaten/Kota',
                            'nama_indikator' => 'Persentase Penerbitan Perpanjangan IMTA',
                            'jumlah_indikator' => 100,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Koordinasi dan Sinkronisasi Perpanjangan IMTA yang Lokasi Kerja dalam 1 (satu) Daerah Kabupaten/Kota',
                                    'nama_indikator' => 'jumlah perpanjangan IMTA',
                                    'jumlah_indikator' => 200,
                                    'tipe_indikator' => 'Orang',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                    ],
                ],
                [
                    'nama_program' => 'PROGRAM HUBUNGAN INDUSTRIAL',
                    'nama_indikator' => 'Persentase perusahaan yang menerapkan tata kelola kerja yang layak',
                    'jumlah_indikator' => 5,3,
                    'tipe_indikator' => 'Persen',
                    'anggaran_murni' => 0,
                    'kegiatans' => [
                        [
                            'nama_kegiatan' => 'Pengesahan Peraturan Perusahaan dan Pendaftaran Perjanjian Kerja Bersama untuk Perusahaan yang hanya Beroperasi dalam 1 (satu) Daerah Kabupaten/Kota',
                            'nama_indikator' => 'Jumlah Perusahaan yang memiliki Peraturan Perusahaan (PP) dan perusahaan yang memiliki Perjanjian Kerja Bersama (PKB)',
                            'jumlah_indikator' => 758,
                            'tipe_indikator' => 'Perusahaan',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Pengesahan Peraturan Perusahaan bagi Perusahaan',
                                    'nama_indikator' => 'Jumlah Perusahaan yang Melaksanakan Pengesahan Peraturan Perusahaan yang Terkait dengan Hubungan Industrial dan Terdaftar di WLKP Online',
                                    'jumlah_indikator' => 45,
                                    'tipe_indikator' => 'Perusahaan',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Pendaftaran Perjanjian Kerjasama bagi Perusahaan',
                                    'nama_indikator' => 'Jumlah Perusahaan yang Menyusun Perjanjian Kerja Bersama',
                                    'jumlah_indikator' => 3,
                                    'tipe_indikator' => 'Perusahaan',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyelenggaraan Pendataan dan Informasi Sarana Hubungan Industrial dan Jaminan Sosial Tenaga Kerja serta Pengupahan',
                                    'nama_indikator' => 'Jumlah Data dan Informasi Sarana HI (PP/PKB, Struktur Skala Upah, dan LKS Bipartit) dan Pekerja yang Terdaftar sebagai Peserta Jamsostek serta Pengupahan',
                                    'jumlah_indikator' => 4,
                                    'tipe_indikator' => 'Laporan',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                        [
                            'nama_kegiatan' => 'Pencegahan dan Penyelesaian Perselisihan Hubungan Industrial, Mogok Kerja dan Penutupan Perusahaan di Daerah Kabupaten/Kota',
                            'nama_indikator' => 'Persentase perselisihan hubungan industrial yang diselesaikan melalui Perjanjian Bersama (PB)',
                            'jumlah_indikator' => 56,
                            'tipe_indikator' => 'Persen',
                            'anggaran_murni' => 0,
                            'sub_kegiatans' => [
                                [
                                    'nama_sub_kegiatan' => 'Pencegahan Perselisihan Hubungan Industrial, Mogok Kerja, dan Penutupan Perusahaan yang Berakibat/Berdampak pada Kepentingan di 1 (satu) Daerah Kabupaten/Kota',
                                    'nama_indikator' => 'Jumlah Perselisihan yang Dicegah',
                                    'jumlah_indikator' => 160,
                                    'tipe_indikator' => 'Perkara',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyelesaian Perselisihan Hubungan Industrial, Mogok Kerja, dan Penutupan Perusahaan yang Berakibat/Berdampak pada Kepentingan di 1 (satu) Daerah Kabupaten/Kota',
                                    'nama_indikator' => 'Jumlah Perkara Perselisihan yang Terselesaikan',
                                    'jumlah_indikator' => 100,
                                    'tipe_indikator' => 'Perkara',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Penyelenggaraan Verifikasi dan Rekapitulasi Keanggotaan pada Organisasi Pengusaha, Federasi dan Konfederasi Serikat Pekerja/Serikat Buruh serta Non Afiliasi',
                                    'nama_indikator' => 'Jumlah Asosiasi Pengusaha dan Serikat Pekerja yang Diverifikasi',
                                    'jumlah_indikator' => 10,
                                    'tipe_indikator' => 'AP & SP',
                                ],
                                [
                                    'nama_sub_kegiatan' => 'Pelaksanaan Operasional Lembaga Kerjasama Tripartit Daerah Kabupaten/Kota',
                                    'nama_indikator' => 'Jumlah LKS Tripartit yang Dibina',
                                    'jumlah_indikator' => 1,
                                    'tipe_indikator' => 'Lembaga',
                                ],
                                // Tambahkan sub-kegiatan lainnya
                            ],
                        ],
                    ],
                ],

            ];

            // Iterasi setiap program dan buat kegiatan serta sub-kegiatan
            foreach ($programs as $programData) {
                $program = Program::create([
                    'nama_program' => $programData['nama_program'],
                    'nama_indikator' => $programData['nama_indikator'],
                    'jumlah_indikator' => $programData['jumlah_indikator'],
                    'tipe_indikator' => $programData['tipe_indikator'],
                    'anggaran_murni' => $programData['anggaran_murni'],
                    'pergeseran' => 0,
                    'perubahan' => 0,
                    'penyerapan_anggaran' => 0,
                    'persen_penyerapan_anggaran' => 0,
                    'bulan_id' => $bulan->id,
                ]);

                foreach ($programData['kegiatans'] as $kegiatanData) {
                    $kegiatan = Kegiatan::create([
                        'nama_kegiatan' => $kegiatanData['nama_kegiatan'],
                        'nama_indikator' => $kegiatanData['nama_indikator'],
                        'jumlah_indikator' => $kegiatanData['jumlah_indikator'],
                        'tipe_indikator' => $kegiatanData['tipe_indikator'],
                        'anggaran_murni' => $kegiatanData['anggaran_murni'],
                        'pergeseran' => 0,
                        'perubahan' => 0,
                        'penyerapan_anggaran' => 0,
                        'persen_penyerapan_anggaran' => 0,
                        'program_id' => $program->id,
                    ]);

                    foreach ($kegiatanData['sub_kegiatans'] as $subKegiatanData) {
                        SubKegiatan::create([
                            'nama_sub_kegiatan' => $subKegiatanData['nama_sub_kegiatan'],
                            'nama_indikator' => $subKegiatanData['nama_indikator'],
                            'jumlah_indikator' => $subKegiatanData['jumlah_indikator'],
                            'tipe_indikator' => $subKegiatanData['tipe_indikator'],
                            'anggaran_murni' => 0,
                            'pergeseran' => 0,
                            'perubahan' => 0,
                            'penyerapan_anggaran' => 0,
                            'persen_penyerapan_anggaran' => 0,
                            'kegiatan_id' => $kegiatan->id,
                        ]);
                    }
                }
            }
        });

        return redirect()->route('admin.bulan.index')->with('success', 'Bulan beserta program, kegiatan, dan sub kegiatan berhasil dibuat.');
    }

    public function edit(Bulan $bulan)
    {
        return Inertia::render('Bulan/Edit', ['bulan' => $bulan]);
    }

    public function update(Request $request, Bulan $bulan)
    {
        $request->validate([
            'bulan' => 'required|string|max:255',
        ]);

        $bulan->update($request->only('bulan'));

        return redirect()->route('admin.bulan.index')->with('success', 'Bulan berhasil diperbarui.');
    }

    public function destroy(Bulan $bulan)
    {
        $bulan->delete();
        return redirect()->route('admin.bulan.index')->with('success', 'Bulan berhasil dihapus.');
    }
}
