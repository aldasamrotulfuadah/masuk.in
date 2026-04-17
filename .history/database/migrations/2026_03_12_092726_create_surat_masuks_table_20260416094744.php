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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->date('tanggal_surat');
            $table->string('nomor_surat');
            $table->string('diterima_dari');
            $table->string('perihal');
            $table->enum('sifat', ['Sangat Segera', 'Segera', 'Biasa', 'Rahasia']);
            $table->string('tanggal_dan_tempat_pelaksanaan');
            $table->date('tanggal_diteruskan');
            $table->enum('diteruskan_kepada',['Sekretaris','Kabid Ideologi Wawasan Kebangsaan, Ketahanan Eksosbud & Agama','Kabid Kewaspadaan Nasional & Penanganan Konflik', 'Kabid Politik Dalam Negeri & Ormas', 'Subid Ideologi Wasbang', 'Subid Ketahanan Eksosbud dan Agama', 'Subid Politik Dalam Negeri','Subid Organisasi Masyarakat','Subid Kewaspadaan Nasional & Penanganan Konflik','Subid Penanganan Konflik','Subag Umum dan Kepegawaian', 'Subag Program Anggaran dan Keuangan']);
            $table->enum('dengan_hormat_harap',['Tanggapan dan Saran','Proses Lebih Lanjut', 'Koordinasi/Konsultasi', 'Bahan Pertimbangan', 'Dibahas/Dikaji', 'Dibantu', 'Disiapkan Bahan', 'Mendampingi', 'Menghadiri', 'Mewakili', 'UMM', 'UM']);
            $table->string('lampiran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
