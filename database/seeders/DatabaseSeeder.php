<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PublicAccessLevel;
use App\Models\Role;
use App\Models\Status;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $roles = [
            [
                'name' => 'admin',
                'access_level' => '9'
            ],
            [
                'name' => 'guest',
                'access_level' => '0'
            ],

        ];

        $statuses = [
            ['name' => 'В разработке'],
            ['name' => 'Заморожен'],
            ['name' => 'Заброшен'],
            ['name' => 'В планах'],
            ['name' => 'Работает'],
            ['name' => 'Удалён'],
        ];
        $puplicAccessLeveles = [
            ['name' => 'Открыт'],
            ['name' => 'Закрыт'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        foreach ($statuses as $status) {
            Status::create($status);
        }
        foreach ($puplicAccessLeveles as $puplicAccessLevel) {
            PublicAccessLevel::create($puplicAccessLevel);
        }
    }
}
