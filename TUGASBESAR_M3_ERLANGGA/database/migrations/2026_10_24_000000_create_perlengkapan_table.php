<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('perlengkapan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('kategori', 50);
            $table->string('kondisi', 30);
            $table->integer('tarif');
        });
    }

    public function down()
    {
        Schema::dropIfExists('perlengkapan');
    }
};
