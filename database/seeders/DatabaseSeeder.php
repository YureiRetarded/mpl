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
        $contactInformations = [
            [
                'name' => 'vk1',
                'value' => 'vk1.com',
            ],
            [
                'name' => 'vk2',
                'value' => 'vk2.com',
            ],
            [
                'name' => 'vk3',
                'value' => 'vk3.com',
            ],
            [
                'name' => 'vk4',
                'value' => 'vk4.com',
            ],
            [
                'name' => 'vk5',
                'value' => 'vk5.com',
            ]
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
        $technologies = [
            ['name' => 'laravel'],
            ['name' => 'skynet'],
            ['name' => 'legion'],
        ];
        $languages = [
            ['name' => 'php'],
            ['name' => 'blade'],
            ['name' => 'c++'],
            ['name' => 'c--'],
            ['name' => 'assEmbler'],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }

        foreach ($contactInformations as $contactInformation) {
            ContactInformation::create($contactInformation);
        }
        foreach ($statuses as $status) {
            Status::create($status);
        }
        foreach ($puplicAccessLeveles as $puplicAccessLevel) {
            PublicAccessLevel::create($puplicAccessLevel);
        }
        foreach ($technologies as $technology) {
            Technology::create($technology);
        }
        foreach ($languages as $language) {
            Language::create($language);
        }
        for ($i = 0; $i < 50; $i++) {
            Tag::create(['name' => fake()->word]);
        }
        $technologies = Technology::all();
        $languages = Language::all();
        $tags = Tag::all();
        foreach ($users as $user) {
            User::create($user);
        }
        $projects = Project::factory(100)->create();
        foreach ($projects as $project) {
            $technologyIds = $technologies->random(2)->pluck('id');
            $languageIds = $languages->random(2)->pluck('id');
            $tagsIds = $tags->random(5)->pluck('id');
            $project->languages()->attach($languageIds);
            $project->technologies()->attach($technologyIds);
            $project->tags()->attach($tagsIds);
        }
        $news = News::factory(500)->create();
        foreach ($news as $newsOne) {
            $tagsIds = $tags->random(5)->pluck('id');
            $newsOne->tags()->attach($tagsIds);
        }
        $users = User::all();
        $contatsInfromations = ContactInformation::factory(1000)->create();
        foreach ($users as $user) {
            $ciIds = $contatsInfromations->random(500)->pluck('id');
            $user->contactInformation()->attach($ciIds);
        }

    }
}
