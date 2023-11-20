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
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('konfimasiadmin', ['valid', 'invalid'])
                ->after('bukti')->nullable();
            $table->string('pesan')
                ->after('konfimasiadmin')->nullable();
            $table->string('etd')
                ->after('pesan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
