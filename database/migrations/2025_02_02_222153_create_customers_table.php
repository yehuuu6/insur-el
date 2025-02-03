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
            $table->string('tc')->nullable(); // TC No
            $table->timestamp('birth_date')->nullable(); // Doğum Tarihi
            $table->string('name', 100)->nullable(); // Adı Soyadı
            $table->string('plate', 10)->nullable(); // Plaka
            $table->string('document_serial', 20)->nullable(); // Belge Seri
            $table->timestamp('issue_date')->nullable(); // Tanzim Tarihi
            $table->timestamp('start_date')->nullable(); // Başlangıç Tarihi
            $table->timestamp('expiry_date')->nullable(); // Bitiş Tarihi
            $table->string('policy_type', 50)->nullable(); // Poliçe Türü
            $table->string('policy_no', 50)->nullable(); // Poliçe No
            $table->string('company', 100)->nullable(); // Şirket
            $table->string('phone')->nullable();
            $table->longText('notes')->nullable();
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
