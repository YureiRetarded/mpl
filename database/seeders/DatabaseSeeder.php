<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ContactInformation;
use App\Models\Language;
use App\Models\News;
use App\Models\Project;
use App\Models\PublicAccessLevel;
use App\Models\Role;
use App\Models\Status;
use App\Models\Tag;
use App\Models\Technology;
use App\Models\User;
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
                'name' => 'guest',
                'access_level' => '0'
            ],
            [
                'name' => 'admin',
                'access_level' => '9'
            ],
        ];
        $users = [
            [
                "name" => "admin",
                "email" => "admin@mail.ru",
                "password" => bcrypt("12345678"),
                "role_id" => 2,
            ],
            [
                "name" => "user",
                "email" => "user@mail.ru",
                "password" => bcrypt("12345678"),
                "role_id" => 1,
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

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
