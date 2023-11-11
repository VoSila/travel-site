<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Tour;
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

        Tour::factory(10)->create();

        AdminUser::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345')
        ]);
    }
}
