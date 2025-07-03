<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('tahun_ajaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tahun_ajaran');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->boolean('aktif')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru');
            $table->string('nip')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->string('email')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('npwp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('telepon')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('jurusan_pendidikan')->nullable();
            $table->string('status_kepegawaian')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('biodata_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('npsn')->nullable();
            $table->string('alamat_sekolah')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('telepon_sekolah')->nullable();
            $table->string('email_sekolah')->nullable();
            $table->string('website_sekolah')->nullable();
            $table->foreignId('id_guru')->constrained('guru');
            $table->string('akreditasi')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('tahun_berdiri')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mata_pelajaran');
            $table->string('kode_mata_pelajaran')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('jenjang_kelas')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas');
            $table->string('tingkat')->nullable();
            $table->string('kapasitas')->nullable();
            $table->foreignId('id_tahun_ajaran')->constrained('tahun_ajaran');
            $table->foreignId('id_guru')->constrained('guru');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('nisn')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->string('alamat')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('agama')->nullable();
            $table->string('status_siswa')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->foreignId('id_kelas')->constrained('kelas');
            $table->foreignId('id_tahun_ajaran_masuk')->constrained('tahun_ajaran');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('jadwal_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kelas')->constrained('kelas');
            $table->foreignId('id_mata_pelajaran')->constrained('mata_pelajaran');
            $table->foreignId('id_guru')->constrained('guru');
            $table->foreignId('id_tahun_ajaran')->constrained('tahun_ajaran');
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('ruang')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->constrained('siswa');
            $table->foreignId('id_jadwal_pelajaran')->constrained('jadwal_pelajaran');
            $table->decimal('nilai_angka', 5, 2)->nullable();
            $table->string('nilai_huruf')->nullable();
            $table->text('catatan')->nullable();
            $table->date('tanggal_penilaian')->nullable();
            $table->foreignId('id_tahun_ajaran')->constrained('tahun_ajaran');
            $table->string('semester')->nullable();
            $table->string('jenis_nilai')->nullable(); // UTS, UAS, Tugas, Harian, dll.
            $table->string('status')->default('belum dinilai'); // belum dinilai, sudah dinilai
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->constrained('siswa');
            $table->foreignId('id_kelas')->constrained('kelas');
            $table->date('tanggal_absen');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->string('status_absen'); // hadir, sakit, izin, alpa
            $table->text('keterangan')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->foreignId('id_tahun_ajaran')->constrained('tahun_ajaran');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('orang_tua', function (Blueprint $table) {
            $table->id();
            $table->string('nama_orang_tua');
            $table->string('hubungan')->nullable(); // Ayah, Ibu, Wali
            $table->string('telepon')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->foreignId('id_siswa')->constrained('siswa');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pegawai');
            $table->string('nip')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->string('email')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('npwp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('telepon')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('jurusan_pendidikan')->nullable();
            $table->string('status_kepegawaian')->nullable();
            $table->date('tanggal_masuk_kerja')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('konten');
            $table->foreignId('id_guru')->constrained('guru')->nullable();
            $table->foreignId('id_pegawai')->constrained('pegawai')->nullable();
            $table->dateTime('tanggal_dibuat');
            $table->dateTime('tanggal_diperbarui')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pegawai')->constrained('pegawai')->nullable();
            $table->foreignId('id_guru')->constrained('guru')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('jenis_cuti'); // Cuti Tahunan, Cuti Sakit, Cuti Melahirkan, dll.
            $table->string('alasan')->nullable();
            $table->string('status')->default('pending'); // pending, disetujui, ditolak
            $table->dateTime('tanggal_permohonan')->nullable();
            $table->dateTime('tanggal_persetujuan')->nullable();
            $table->dateTime('tanggal_penolakan')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_sekolah');
        Schema::dropIfExists('tahun_ajaran');
        Schema::dropIfExists('guru');
        Schema::dropIfExists('mata_pelajaran');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('siswa');
        Schema::dropIfExists('jadwal_pelajaran');
        Schema::dropIfExists('nilai');
        Schema::dropIfExists('absensi');
        Schema::dropIfExists('orang_tua');
        Schema::dropIfExists('berita');
        Schema::dropIfExists('cuti');
    }
};