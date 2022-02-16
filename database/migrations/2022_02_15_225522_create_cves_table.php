<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cves', function (Blueprint $table) {
            $table->id();

            $table->string('cve_cod');
            $table->string('name')->nullable();
            $table->float('cvss', 2, 1)->nullable();
            $table->text('es_description')->nullable();
            $table->text('en_description')->nullable();
            $table->text('solution')->nullable();
            $table->string('nessus_cod')->nullable();

            $table->timestamps();
        });
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
};
