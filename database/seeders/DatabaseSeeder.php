<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\RefRole::factory()->createMany([
            ['nama_role' => 'Admin'],
            ['nama_role' => 'Pendaftar'],
            ['nama_role' => 'Superadmin'],
        ]);


        \App\Models\User::factory()->createMany([
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'id_role' => 1,
            ],
            [
                'nama' => 'Pendaftar',
                'email' => 'pendaftar@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'id_role' => 2,
            ],
            [
                'nama' => 'Superadmin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'id_role' => 3,
            ],

        ]);

        \App\Models\RefMetodePembayaran::factory()->createMany([
            ['nama_metode_pembayaran' => 'Transfer Bank'],
            ['nama_metode_pembayaran' => 'OVO'],
            ['nama_metode_pembayaran' => 'Dana'],
            ['nama_metode_pembayaran' => 'LinkAja'],
            ['nama_metode_pembayaran' => 'GoPay'],
        ]);

        \App\Models\RefJenisKelamin::factory()->createMany([
            ['nama_jenis_kelamin' => 'Laki-laki'],
            ['nama_jenis_kelamin' => 'Perempuan'],
            ['nama_jenis_kelamin' => 'Lainnya'],
        ]);

        \App\Models\RefPenghasilanOrangTua::factory()->createMany([
            ['jumlah_penghasilan_orang_tua' => 'Kurang dari Rp. 1.000.000'],
            ['jumlah_penghasilan_orang_tua' => 'Rp. 1.000.000 - Rp. 2.000.000'],
            ['jumlah_penghasilan_orang_tua' => 'Rp. 2.000.000 - Rp. 3.000.000'],
            ['jumlah_penghasilan_orang_tua' => 'Rp. 3.000.000 - Rp. 4.000.000'],
            ['jumlah_penghasilan_orang_tua' => 'Rp. 4.000.000 - Rp. 5.000.000'],
            ['jumlah_penghasilan_orang_tua' => 'Lebih dari Rp. 5.000.000'],
        ]);

        \App\Models\RefProgramStudi::factory()->createMany([
            ['nama_program_studi' => 'Teknik Informatika'],
            ['nama_program_studi' => 'Sistem Informasi'],
            ['nama_program_studi' => 'Teknik Elektro'],
            ['nama_program_studi' => 'Teknik Mesin'],
            ['nama_program_studi' => 'Teknik Sipil'],
        ]);

        \App\Models\RefAgama::factory()->createMany([
            ['nama_agama' => 'Islam'],
            ['nama_agama' => 'Kristen'],
            ['nama_agama' => 'Katolik'],
            ['nama_agama' => 'Hindu'],
            ['nama_agama' => 'Buddha'],
            ['nama_agama' => 'Konghucu'],
        ]);



        \App\Models\RefRencanaTempatTinggal::factory()->createMany([
            ['nama_rencana_tempat_tinggal' => 'Kos'],
            ['nama_rencana_tempat_tinggal' => 'Asrama'],
            ['nama_rencana_tempat_tinggal' => 'Kontrakan'],
            ['nama_rencana_tempat_tinggal' => 'Rumah Sendiri'],
            ['nama_rencana_tempat_tinggal' => 'Apartemen'],
        ]);

        \App\Models\RefJalurPendaftaran::factory()->createMany([
            ['nama_jalur_pendaftaran' => 'SNMPTN'],
            ['nama_jalur_pendaftaran' => 'SBMPTN'],
            ['nama_jalur_pendaftaran' => 'Mandiri'],
            ['nama_jalur_pendaftaran' => 'Beasiswa Santri'],
        ]);

        \App\Models\RefSumberInformasi::factory()->createMany([
            ['nama_sumber_informasi' => 'Sosial Media'],
            ['nama_sumber_informasi' => 'Teman'],
            ['nama_sumber_informasi' => 'Guru'],
            ['nama_sumber_informasi' => 'Orang Tua'],
            ['nama_sumber_informasi' => 'Pameran'],
        ]);

        \App\Models\RefBerkas::factory()->createMany([
            ['nama_berkas' => 'KTP'],
            ['nama_berkas' => 'KK'],
            ['nama_berkas' => 'Ijazah'],
            ['nama_berkas' => 'SKHUN'],
            ['nama_berkas' => 'Pas Foto'],
            ['nama_berkas' => 'Surat Keterangan Sehat'],
            ['nama_berkas' => 'Surat Keterangan Bebas Narkoba'],
            ['nama_berkas' => 'Surat Keterangan Bebas Covid'],
        ]);
    }
}
