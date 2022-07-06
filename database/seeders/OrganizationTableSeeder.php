<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      \App\Models\Organization::factory()->count(3)->create();

        
    }
}
