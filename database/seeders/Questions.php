<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuestionsRecords;

class Questions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuestionsRecords::factory()->count(20)->create();
    }
}
