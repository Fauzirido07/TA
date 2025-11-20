<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangSekolahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jenjang_sekolah')->insert([
            ['jenjang' => 'TK'],
            ['jenjang' => 'SD'],
            ['jenjang' => 'SMP'],
            ['jenjang' => 'SMA'],
        ]);
    }
}
