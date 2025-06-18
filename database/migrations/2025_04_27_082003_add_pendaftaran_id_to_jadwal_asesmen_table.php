<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('jadwal_asesmen', function (Blueprint $table) {
            $table->unsignedBigInteger('pendaftaran_id')->nullable()->after('id');
    
            $table->foreign('pendaftaran_id')
                  ->references('id')
                  ->on('pendaftaran')
                  ->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('jadwal_asesmen', function (Blueprint $table) {
            $table->dropForeign(['pendaftaran_id']);
            $table->dropColumn('pendaftaran_id');
        });
    }    
};
