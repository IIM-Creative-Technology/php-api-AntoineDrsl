<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        
        User::factory()->create([
            'name' => 'Karine',
            'email' => 'karine@devinci.fr',
        ]);
        User::factory()->create([
            'name' => 'Nicolas',
            'email' => 'nicolas@devinci.fr',
        ]);
        User::factory()->create([
            'name' => 'Alexis',
            'email' => 'alexis@devinci.fr',
        ]);
    }
}
