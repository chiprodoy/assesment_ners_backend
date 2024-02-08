<?php

namespace Database\Seeders;

use App\Models\Asesmen;
use App\Models\MataKuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mk=MataKuliah::factory()->create([
            'kode_mata_kuliah'=>'001',
            'nama_mata_kuliah'=>'Keterampilan Dasar Profesi'
        ]);
            $mk->asesmens()->createMany([
                ['uuid'=>'-','nama_asesmen' => 'Laporan pendahuluan'],
                ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien kelolaan'],
                ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien resume'],
                ['uuid'=>'-','nama_asesmen' => 'Seminar'],
                ['uuid'=>'-','nama_asesmen' => 'Pendidikan kesehatan / Penyuluhan'],
                ['uuid'=>'-','nama_asesmen' => 'Log Book dan Absensi'],
                ['uuid'=>'-','nama_asesmen' => 'Kompetensi Keterampilan Klinik '],
                ['uuid'=>'-','nama_asesmen' => 'Portofolio'],
            ]);
            $asesmen=Asesmen::find(1);

                $kognitif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'kognitif (pengetahuan)',
                    'persentase'=>'0.3'
                ]);

                    $kognitif->subkompetensis()->createMany([
                        [
                            'uuid'=>'-',
                            'nama_sub_kompetensi'=>'Penguasaan terhadap materi yang disampaikan',
                        ],
                        [
                            'uuid'=>'-',
                            'nama_sub_kompetensi'=>'Penguasaan terhadap maksud dan tujuan pendidikan kesehatan/penyuluhan',
                            'skor_penilaian'=>'0,1,2,3,4'
                        ],
                        [
                            'uuid'=>'-',
                            'nama_sub_kompetensi'=>'Pemahaman terhadap sistematika materi pendidikan kesehatan/penyuluhan',
                            'skor_penilaian'=>'0,1,2,3,4'
                        ],
                        [
                            'uuid'=>'-',
                            'nama_sub_kompetensi'=>'Sintesis pemahaman materi yang disampaikan dengan jawaban yang diberikan pada pertanyaan peserta pendidikan kesehatan/penyuluhan',
                            'skor_penilaian'=>'0,1,2,3,4'
                        ],
                        [
                            'uuid'=>'-',
                            'nama_sub_kompetensi'=>'Keterbaruan materi dan referensi',
                            'skor_penilaian'=>'0,1,2,3,4'
                        ],
                    ]);

                $psikomotorik=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'psikomotorik (kemampuan)',
                    'persentase'=>'0.25'
                ]);
                    $psikomotorik->subkompetensis()->createMany([
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Pemanfaatan media dan/atau alat peraga'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Manajemen waktu'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Manajemen tahap persiapan kegiatan pendidikan kesehatan/penyuluhan'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Manajemen tahap pelaksanaan kegiatan pendidikan kesehatan/penyuluhan'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Manajemen tahap evaluasi kegiatan pendidikan kesehatan/penyuluhan'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Ketepatan pemilihan metode yang digunakan dalam kegiatan pendidikan kesehatan/penyuluhan'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Sistematika dan kelengkapan dokumen satuan acara pendidikan kesehatan/penyuluhan'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Kemampuan dalam membangun motivasi dan antusiasme peserta pendidikan kesehatan/penyuluhan'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Ketepatan dalam menjawab pertanyaan peserta pendidikan kesehatan/penyuluhan'],

                    ]);


                $afektif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'afektif (sikap)',
                    'persentase'=>'0.25'
                ]);

                    $afektif->subkompetensis()->createMany([
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Kerapian dalam berpakaian'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Ketelitian dalam menjawab dan menanggapi pertanyaan'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Ketenangan dalam menjawab pertanyaan'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Sikap/etika selama melaksanakan kegiatan pendidikan kesehatan/penyuluhan'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Penghargaan terhadap peserta kegiatan pendidikan kesehatan/penyuluhan'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Kontrol emosi selama melaksanakan kegiatan pendidikan kesehatan/penyuluhan'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Antusiasme selama melaksanakan kegiatan pendidikan kesehatan/penyuluhan'],
                        ['uuid'=>'-','nama_sub_kompetensi'=>'Profesionalitas selama melaksanakan kegiatan pendidikan kesehatan/penyuluhan'],
                    ]);
                $social=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'social interaction (interaksi sosial)',
                    'persentase'=>'0.20'
                ]);

                $social->subkompetensis()->createMany([
                    ['uuid'=>'-','nama_sub_kompetensi'=>'Kerjasama tim'],
                    ['uuid'=>'-','nama_sub_kompetensi'=>'Penggunaan kata yang mudah dipahami'],
                    ['uuid'=>'-','nama_sub_kompetensi'=>'Ketenangan dalam berinteraksi'],
                    ['uuid'=>'-','nama_sub_kompetensi'=>'Penggunaan bahasa tubuh/non verbal'],
                    ['uuid'=>'-','nama_sub_kompetensi'=>'Etika dalam berkomunikasi'],
                    ['uuid'=>'-','nama_sub_kompetensi'=>'Intonasi dalam bertutur kata'],
                    ['uuid'=>'-','nama_sub_kompetensi'=>'Kontrol suasana selama kegiatan pendidikan kesehatan/penyuluhan'],

                ]);

            $asesmen=Asesmen::find(2);

                $kognitif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'kognitif (pengetahuan)',
                    'persentase'=>'0.3'
                ]);

                $psikomotorik=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'psikomotorik (kemampuan)',
                    'persentase'=>'0.25'
                ]);

                $afektif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'afektif (sikap)',
                    'persentase'=>'0.25'
                ]);

                $social=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'social interaction (interaksi sosial)',
                    'persentase'=>'0.20'
                ]);

            $asesmen=Asesmen::find(3);

                $kognitif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'kognitif (pengetahuan)',
                    'persentase'=>'0.3'
                ]);

                $psikomotorik=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'psikomotorik (kemampuan)',
                    'persentase'=>'0.25'
                ]);

                $afektif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'afektif (sikap)',
                    'persentase'=>'0.25'
                ]);

                $social=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'social interaction (interaksi sosial)',
                    'persentase'=>'0.20'
                ]);

            $asesmen=Asesmen::find(4);

                $kognitif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'kognitif (pengetahuan)',
                    'persentase'=>'0.3'
                ]);

                $psikomotorik=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'psikomotorik (kemampuan)',
                    'persentase'=>'0.25'
                ]);

                $afektif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'afektif (sikap)',
                    'persentase'=>'0.25'
                ]);

                $social=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'social interaction (interaksi sosial)',
                    'persentase'=>'0.20'
                ]);

            $asesmen=Asesmen::find(5);

                $kognitif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'kognitif (pengetahuan)',
                    'persentase'=>'0.3'
                ]);

                $psikomotorik=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'psikomotorik (kemampuan)',
                    'persentase'=>'0.25'
                ]);

                $afektif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'afektif (sikap)',
                    'persentase'=>'0.25'
                ]);

                $social=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'social interaction (interaksi sosial)',
                    'persentase'=>'0.20'
                ]);

            $asesmen=Asesmen::find(6);

                $kognitif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'kognitif (pengetahuan)',
                    'persentase'=>'0.3'
                ]);

                $psikomotorik=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'psikomotorik (kemampuan)',
                    'persentase'=>'0.25'
                ]);

                $afektif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'afektif (sikap)',
                    'persentase'=>'0.25'
                ]);

                $social=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'social interaction (interaksi sosial)',
                    'persentase'=>'0.20'
                ]);

            $asesmen=Asesmen::find(7);

                $kognitif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'kognitif (pengetahuan)',
                    'persentase'=>'0.3'
                ]);

                $psikomotorik=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'psikomotorik (kemampuan)',
                    'persentase'=>'0.25'
                ]);

                $afektif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'afektif (sikap)',
                    'persentase'=>'0.25'
                ]);

                $social=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'social interaction (interaksi sosial)',
                    'persentase'=>'0.20'
                ]);

            $asesmen=Asesmen::find(8);

                $kognitif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'kognitif (pengetahuan)',
                    'persentase'=>'0.3'
                ]);

                $psikomotorik=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'psikomotorik (kemampuan)',
                    'persentase'=>'0.25'
                ]);

                $afektif=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'afektif (sikap)',
                    'persentase'=>'0.25'
                ]);

                $social=$asesmen->kompetensis()->create([
                    'uuid'=>'-',
                    'nama_kompetensi'=>'social interaction (interaksi sosial)',
                    'persentase'=>'0.20'
                ]);

        $mk=MataKuliah::factory()->create([
            'kode_mata_kuliah'=>'002',
            'nama_mata_kuliah'=>'Keperawatan Medikal Bedah'
        ]);

        $mk->asesmens()->createMany([
            ['uuid'=>'-','nama_asesmen' => 'Laporan pendahuluan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien kelolaan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien resume'],
            ['uuid'=>'-','nama_asesmen' => 'Seminar'],
            ['uuid'=>'-','nama_asesmen' => 'Pendidikan kesehatan / Penyuluhan'],
            ['uuid'=>'-','nama_asesmen' => 'Log Book dan Absensi'],
            ['uuid'=>'-','nama_asesmen' => 'Kompetensi Keterampilan Klinik '],
            ['uuid'=>'-','nama_asesmen' => 'Portofolio'],
        ]);

        $mk=MataKuliah::factory()->create([
            'uuid'=>'-',
            'kode_mata_kuliah'=>'003',
            'nama_mata_kuliah'=>'Keperawatan Anak'
        ]);

        $mk->asesmens()->createMany([
            ['uuid'=>'-','nama_asesmen' => 'Laporan pendahuluan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien kelolaan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien resume'],
            ['uuid'=>'-','nama_asesmen' => 'Seminar'],
            ['uuid'=>'-','nama_asesmen' => 'Pendidikan kesehatan / Penyuluhan'],
            ['uuid'=>'-','nama_asesmen' => 'Log Book dan Absensi'],
            ['uuid'=>'-','nama_asesmen' => 'Kompetensi Keterampilan Klinik '],
            ['uuid'=>'-','nama_asesmen' => 'Portofolio'],
        ]);

        $mk=MataKuliah::factory()->create([
            'uuid'=>'-',
            'kode_mata_kuliah'=>'004',
            'nama_mata_kuliah'=>'Keperawatan Maternitas'
        ]);

        $mk->asesmens()->createMany([
            ['uuid'=>'-','nama_asesmen' => 'Laporan pendahuluan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien kelolaan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien resume'],
            ['uuid'=>'-','nama_asesmen' => 'Seminar'],
            ['uuid'=>'-','nama_asesmen' => 'Pendidikan kesehatan / Penyuluhan'],
            ['uuid'=>'-','nama_asesmen' => 'Log Book dan Absensi'],
            ['uuid'=>'-','nama_asesmen' => 'Kompetensi Keterampilan Klinik '],
            ['uuid'=>'-','nama_asesmen' => 'Portofolio'],
        ]);

        $mk=MataKuliah::factory()->create([
            'uuid'=>'-',
            'kode_mata_kuliah'=>'005',
            'nama_mata_kuliah'=>'Keperawatan Maternitas'
        ]);

        $mk->asesmens()->createMany([
            ['uuid'=>'-','nama_asesmen' => 'Laporan pendahuluan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien kelolaan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien resume'],
            ['uuid'=>'-','nama_asesmen' => 'Seminar'],
            ['uuid'=>'-','nama_asesmen' => 'Pendidikan kesehatan / Penyuluhan'],
            ['uuid'=>'-','nama_asesmen' => 'Log Book dan Absensi'],
            ['uuid'=>'-','nama_asesmen' => 'Kompetensi Keterampilan Klinik '],
            ['uuid'=>'-','nama_asesmen' => 'Portofolio'],
        ]);

        $mk=MataKuliah::factory()->create([
            'uuid'=>'-',
            'kode_mata_kuliah'=>'006',
            'nama_mata_kuliah'=>'Keperawatan Jiwa'
        ]);

        $mk->asesmens()->createMany([
            ['uuid'=>'-','nama_asesmen' => 'Laporan pendahuluan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien kelolaan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien resume'],
            ['uuid'=>'-','nama_asesmen' => 'Seminar'],
            ['uuid'=>'-','nama_asesmen' => 'Pendidikan kesehatan / Penyuluhan'],
            ['uuid'=>'-','nama_asesmen' => 'Log Book dan Absensi'],
            ['uuid'=>'-','nama_asesmen' => 'Kompetensi Keterampilan Klinik '],
            ['uuid'=>'-','nama_asesmen' => 'Portofolio'],
        ]);

        $mk=MataKuliah::factory()->create([
            'uuid'=>'-',
            'kode_mata_kuliah'=>'007',
            'nama_mata_kuliah'=>'Manajemen Keperawatan'
        ]);

        $mk->asesmens()->createMany([
            ['uuid'=>'-','nama_asesmen' => 'Log Book dan Absensi'],
            ['uuid'=>'-','nama_asesmen' => 'Kompetensi Keterampilan Klinik '],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien resume'],
            ['uuid'=>'-','nama_asesmen' => 'Portofolio'],
            ['uuid'=>'-','nama_asesmen' => 'Seminar Mankep 1'],
            ['uuid'=>'-','nama_asesmen' => 'Seminar Mankep 2'],
        ]);

        $mk=MataKuliah::factory()->create([
            'uuid'=>'-',
            'kode_mata_kuliah'=>'008',
            'nama_mata_kuliah'=>'Keperawatan Gawat Darurat & Kritis'
        ]);

        $mk->asesmens()->createMany([
            ['uuid'=>'-','nama_asesmen' => 'Laporan pendahuluan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien resume'],
            ['uuid'=>'-','nama_asesmen' => 'Seminar'],
            ['uuid'=>'-','nama_asesmen' => 'Log Book dan Absensi'],
            ['uuid'=>'-','nama_asesmen' => 'Kompetensi Keterampilan Klinik '],
            ['uuid'=>'-','nama_asesmen' => 'Portofolio'],
        ]);

        $mk=MataKuliah::factory()->create([
            'uuid'=>'-',
            'kode_mata_kuliah'=>'009',
            'nama_mata_kuliah'=>'Keperawatan Gerontik'
        ]);

        $mk->asesmens()->createMany([
            ['uuid'=>'-','nama_asesmen' => 'Laporan pendahuluan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien kelolaan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien resume'],
            ['uuid'=>'-','nama_asesmen' => 'Seminar'],
            ['uuid'=>'-','nama_asesmen' => 'Pendidikan kesehatan / Penyuluhan'],
            ['uuid'=>'-','nama_asesmen' => 'Log Book dan Absensi'],
            ['uuid'=>'-','nama_asesmen' => 'Kompetensi Keterampilan Klinik '],
            ['uuid'=>'-','nama_asesmen' => 'Portofolio'],
        ]);


        $mk=MataKuliah::factory()->create([
            'uuid'=>'-',
            'kode_mata_kuliah'=>'010',
            'nama_mata_kuliah'=>'Keperawatan Komunitas'
        ]);

        $mk->asesmens()->createMany([
            ['uuid'=>'-','nama_asesmen' => 'Pendidikan kesehatan / Penyuluhan'],
            ['uuid'=>'-','nama_asesmen' => 'Log Book dan Absensi'],
            ['uuid'=>'-','nama_asesmen' => 'Kompetensi Keterampilan Klinik Keperawatan'],
            ['uuid'=>'-','nama_asesmen' => 'Portofolio'],
            ['uuid'=>'-','nama_asesmen' => 'Seminar Kepkom  1'],
            ['uuid'=>'-','nama_asesmen' => 'Seminar Kepkom  2'],
        ]);

        $mk=MataKuliah::factory()->create([
            'uuid'=>'-',
            'kode_mata_kuliah'=>'011',
            'nama_mata_kuliah'=>'Keperawatan Keluarga'
        ]);

        $mk->asesmens()->createMany([
            ['uuid'=>'-','nama_asesmen' => 'Laporan pendahuluan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien kelolaan'],
            ['uuid'=>'-','nama_asesmen' => 'Asuhan keperawatan pasien resume'],
        ]);

        $mk=MataKuliah::factory()->create([
            'uuid'=>'-',
            'kode_mata_kuliah'=>'012',
            'nama_mata_kuliah'=>'Karya Ilmiah Akhir'
        ]);

        $mk->asesmens()->createMany([
            ['uuid'=>'-','nama_asesmen' => 'KIA proposal'],
            ['uuid'=>'-','nama_asesmen' => 'KIA Laporan'],
            ['uuid'=>'-','nama_asesmen' => 'Kumulatif KIA'],
        ]);

        //
    }
}
