<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjouterChampsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('prenom')->nullable();
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('CP')->nullable();
            $table->string('telephone')->nullable();
            $table->string('genre')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('premierContact_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColum('prenom')->nullable();
            $table->dropColum('adresse')->nullable();
            $table->dropColum('ville')->nullable();
            $table->dropColum('CP')->nullable();
            $table->dropColum('telephone')->nullable();
            $table->dropColum('genre')->nullable();
            $table->dropColum('province_id')->nullable();
            $table->dropColum('premierContact_id')->nullable();
        });
    }
}
