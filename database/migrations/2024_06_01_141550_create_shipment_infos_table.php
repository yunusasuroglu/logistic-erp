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
        Schema::create('shipment_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->unsignedBigInteger('company_id'); // Company ID alanı
            $table->json('info'); // 'info' sütununu JSON veri tipi olarak ekliyoruz
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_infos');
    }
};
