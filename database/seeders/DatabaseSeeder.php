<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create([
            'name' => 'Surat',
        ]);
        \App\Models\Category::create([
            'name' => 'Rencana Anggaran Biaya',
        ]);
        \App\Models\Category::create([
            'name' => 'Bill Of Material',
        ]);
        \App\Models\Category::create([
            'name' => 'Surat Perintah Kerja',
        ]);
        \App\Models\Category::create([
            'name' => 'Documentations',
        ]);

        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@danatama.co.id',
            'username' => 'admin',
            'is_admin' => 1,
            'password' => bcrypt('zaq12wsx'),
        ]);
    }
}
