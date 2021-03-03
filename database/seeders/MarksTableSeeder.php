<?php

namespace Database\Seeders;

use App\Models\Mark;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marks')->truncate();
        Mark::factory(100)->create();
    }
}
