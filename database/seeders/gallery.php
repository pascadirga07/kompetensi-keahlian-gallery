<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class gallery extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {

            DB::table('galleries')->insert([
                'title' => "Gallery $i",
                'content' => "Content for Gallery $i",
                'created_by' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}