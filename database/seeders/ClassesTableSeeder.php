<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->truncate();

        Classe::factory()->create([
            'name' => 'A2',
            'graduation_year' => '2022'
        ]);
        Classe::factory()->create([
            'name' => 'A3',
            'graduation_year' => '2023'
        ]);
        Classe::factory()->create([
            'name' => 'A4',
            'graduation_year' => '2024'
        ]);
        Classe::factory()->create([
            'name' => 'A5',
            'graduation_year' => '2025'
        ]);
    }
}
