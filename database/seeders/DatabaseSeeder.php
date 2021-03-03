<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MarksTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Database\Seeders\ClassesTableSeeder;
use Database\Seeders\StudentsTableSeeder;
use Database\Seeders\SubjectsTableSeeder;
use Database\Seeders\TeachersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();

        // Lance les seeder des tables
        $this->call(UsersTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(TeachersTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(MarksTableSeeder::class);

        Schema::disableForeignKeyConstraints();
        Model::reguard();
    }
}
