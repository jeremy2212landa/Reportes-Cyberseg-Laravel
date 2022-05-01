<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('cves', function (Blueprint $table) {
            $table->id();
            $table->string('cve_code');
            $table->integer('cvss');
            $table->string('nessus_cod');
            $table->string('nmap_cod');
            $table->longText('en_description');
            $table->longText('es_description');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cves');
    }
}
