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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('tc', 11)->unique(); // TC No
            $table->date('birth_date'); // Doğum Tarihi
            $table->string('name', 100); // Adı Soyadı
            $table->string('plate', 10); // Plaka
            $table->string('document_serial', 20); // Belge Seri
            $table->date('issue_date'); // Tanzim Tarihi
            $table->date('start_date'); // Başlangıç Tarihi
            $table->date('expiry_date'); // Bitiş Tarihi
            $table->string('policy_type', 50); // Poliçe Türü
            $table->string('policy_no', 50)->unique(); // Poliçe No
            $table->string('company', 100); // Şirket
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
