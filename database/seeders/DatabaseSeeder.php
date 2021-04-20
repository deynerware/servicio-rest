<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::factory()
            ->count(50)
            ->create();
    }
}
