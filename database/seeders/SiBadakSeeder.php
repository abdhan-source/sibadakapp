<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SiBadakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tahun_ajaran')->insert([
            [
                'id' => 1,
                'nama_tahun_ajaran' => '2025/2026',
                'tanggal_mulai' => Carbon::create(2025, 7, 1),
                'tanggal_selesai' => Carbon::create(2026, 6, 30),
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);


        DB::table('guru')->insert([
            [
                'id' => 1,
                'nama_guru' => 'Joko',
                'nip' => '123456789',
                'tempat_lahir' => 'Surakarta',
                'tanggal_lahir' => Carbon::create(1980, 10, 21),
                'jenis_kelamin' => 'L',
                'email' => 'joko@gmail.com',
                'nuptk' => '987654321',
                'npwp' => '1234567890',
                'alamat' => 'Jl. Pahlawan No. 10,',
                'kabupaten' => 'Surakarta',
                'provinsi' => 'Jawa Tengah',
                'kode_pos' => '57111',
                'telepon' => '081234567890',
                'pendidikan_terakhir' => 'S1',
                'jurusan_pendidikan' => 'Teknik Informatika',
                'status_kepegawaian' => 'PNS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'nama_guru' => 'Badriyah',
                'nip' => '987654321',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => Carbon::create(1985, 8, 15),
                'jenis_kelamin' => 'P',
                'email' => 'badriyah@gmail.com',
                'nuptk' => '1234567890',
                'npwp' => '0987654321',
                'alamat' => 'Jl. Kebudayaan No. 5,',
                'kabupaten' => 'Yogyakarta',
                'provinsi' => 'DI Yogyakarta',
                'kode_pos' => '55222',
                'telepon' => '082345678901',
                'pendidikan_terakhir' => 'S2',
                'jurusan_pendidikan' => 'Pendidikan Bahasa Inggris',
                'status_kepegawaian' => 'Honorer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('kelas')->insert([
            [
                'id' => 1,
                'nama_kelas' => 'TKJT 1',
                'tingkat' => 'X',
                'kapasitas' => 30,
                'id_tahun_ajaran' => 1,
                'id_guru' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'nama_kelas' => 'TKJT 2',
                'tingkat' => 'X',
                'kapasitas' => 30,
                'id_tahun_ajaran' => 1,
                'id_guru' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('siswa')->insert([
            [
                'id' => 1,
                'nama_siswa' => 'Budi Santoso',
                'nisn' => '1234567890',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => Carbon::create(2005, 5, 15),
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Merdeka No. 1,',
                'kabupaten' => 'Indramayu',
                'provinsi' => 'Jawa Barat',
                'kode_pos' => '10110',
                'telepon' => '081234567890',
                'email' => 'budi@gmail.com',
                'agama' => 'Islam',
                'status_siswa' => 'aktif',
                'tanggal_masuk' => Carbon::create(2025, 7, 1),
                'id_kelas' => 1,
                'id_tahun_ajaran_masuk' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'nama_siswa' => 'Siti Aminah',
                'nisn' => '0987654321',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => Carbon::create(2005, 6, 20),
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Kebangsaan No. 2,',
                'kabupaten' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'kode_pos' => '40111',
                'telepon' => '082345678901',
                'email' => 'siti@gmail.com',
                'agama' => 'Islam',
                'status_siswa' => 'aktif',
                'tanggal_masuk' => Carbon::create(2025, 7, 1),
                'id_kelas' => 1,
                'id_tahun_ajaran_masuk' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('absensi')->insert([
            [
                'id' => 1,
                'id_siswa' => 1,
                'id_kelas' => 1,
                'tanggal_absen' => Carbon::now()->format('Y-m-d'),
                'jam_masuk' => Carbon::now()->format('H:i:s'),
                'jam_pulang' => Carbon::now()->addHours(8)->format('H:i:s'),
                'status_absen' => 'hadir',
                'keterangan' => 'Siswa hadir tepat waktu',
                'longitude' => '106.8456',
                'latitude' => '-6.2088',
                'id_tahun_ajaran' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'id_siswa' => 2,
                'id_kelas' => 1,
                'tanggal_absen' => Carbon::now()->format('Y-m-d'),
                'jam_masuk' => Carbon::now()->format('H:i:s'),
                'jam_pulang' => Carbon::now()->addHours(8)->format('H:i:s'),
                'status_absen' => 'hadir',
                'keterangan' => 'Siswa hadir tepat waktu',
                'longitude' => '106.8456',
                'latitude' => '-6.2088',
                'id_tahun_ajaran' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}