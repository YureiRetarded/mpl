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
            ['name_ru' => 'В разработке','name_en' => 'In developing'],
            ['name_ru' => 'Заморожен','name_en' => 'Frozen'],
            ['name_ru' => 'Заброшен','name_en' => 'Abandoned'],
            ['name_ru' => 'В планах','name_en' => 'In the plans'],
            ['name_ru' => 'Работает','name_en' => 'Works'],
            ['name_ru' => 'Удалён','name_en' => 'Removed'],
        ];
        $puplicAccessLeveles = [
            ['name_en' => 'Public','name_ru' => 'Открыт'],
            ['name_en' => 'Private','name_ru' => 'Закрыт'],
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
