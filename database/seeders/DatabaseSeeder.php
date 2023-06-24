<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Client;
use App\Models\Professional;
use App\Models\Scheduling;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin',
            'password' => 'adminadmin',
        ]);

        Category::query()->create([
            'name' => 'Cabelo'
        ]);
        Category::query()->create([
            'name' => 'Massagem'
        ]);
        Category::query()->create([
            'name' => 'Unha'
        ]);

        Service::query()->create([
            'name' => 'Corte de cabelo',
            'time' => '10',
            'value' => '100',
            'category_id'=> 1,
            'description' => 'Corte de cabelo',
        ]);
        Service::query()->create([
            'name' => 'Massagem relaxante',
            'time' => '20',
            'value' => '200',
            'category_id'=> 2,
            'description' => 'Massagem relaxante',
        ]);
        Service::query()->create([
            'name' => 'Massagem brutal',
            'time' => '30',
            'value' => '300',
            'category_id'=> 2,
            'description' => 'Massagem brutal',
        ]);
        Service::query()->create([
            'name' => 'Unha do pe',
            'time' => '40',
            'value' => '400',
            'category_id'=> 3,
            'description' => 'Unha do pe',
        ]);
        
        // Professional::query()->create([
        //     'name' => 'Profissional 1',
        //     'email' => 'prof1@email.com',
        //     'phone' => '111111111',
        //     'whatsapp'=> '111111111',
        // ]);
        // Professional::query()->create([
        //     'name' => 'Profissional 2',
        //     'email' => 'prof2@email.com',
        //     'phone' => '2222222222',
        //     'whatsapp'=> '2222222222',
        // ]);
        // Professional::query()->create([
        //     'name' => 'Profissional 3',
        //     'email' => 'prof3@email.com',
        //     'phone' => '33333333333',
        //     'whatsapp'=> '33333333333',
        // ]);
        // User::factory()->create([
        //     'name' => 'Cliente 1',
        //     'email' => 'cliente1@cliente',
        // ]);
        // User::factory()->create([
        //     'name' => 'Cliente 2',
        //     'email' => 'cliente2@cliente',
        // ]);
        // Client::query()->create([
        //     'user_id' => 2,
        //     'phone' => '11111111',
        //     'whatsapp'=> '11111111',
        // ]);
        // Client::query()->create([
        //     'user_id' => 3,
        //     'phone' => '222222',
        //     'whatsapp'=> '222222',
        // ]);
        // Scheduling::query()->create([
        //     'user_id' => 2,
        //     'service_id' => 1,
        //     'professional_id' => 1,
        //     'date' => '07/06/2023',
        //     'time'=> '10:10',
        // ]);
        // Scheduling::query()->create([
        //     'user_id' => 3,
        //     'service_id' => 2,
        //     'professional_id' => 2,
        //     'date' => '08/06/2023',
        //     'time'=> '11:11',
        // ]);
        // Scheduling::query()->create([
        //     'user_id' => 3,
        //     'service_id' => 3,
        //     'professional_id' => 2,
        //     'date' => '08/06/2023',
        //     'time'=> '11:11',
        // ]);
    }
}