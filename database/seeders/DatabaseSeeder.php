<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marca;
use App\Models\Productos;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([ 'name' => 'Victor Riveros', 'email' => 'vr@admin.com', 'password' => bcrypt('123') ]);
        Marca::factory(25)->create();
        Productos::factory(25)->create();
        // \App\Models\User::factory(10)->create();
    }
}
