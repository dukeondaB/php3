<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\Position_User;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // trong model user có trait HasFactory, và có UserFactory đã định nghĩa dữ liệu mẫu
        // Model::factory(số lượng dữ liệu mẫu)->create();
        // Position::factory(4)->create();
        Position_User::factory(3)->create();
        // User::factory(5)->create();
        // Room::factory(3)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
