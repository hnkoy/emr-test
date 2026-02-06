<?php

namespace Database\Seeders;

use App\Models\AgregateDhs2;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgregateDhs2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         AgregateDhs2::factory()->count(10)->create();
    }
}
