<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\PublicAccessLevel;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Project::class;

    public function definition()
    {
        return [
            'title' => $this->faker->linuxProcessor,
            'text' => $this->faker->text,
            'status_id' => Status::get()->random()->id,
            'description' => $this->faker->text,
            'public_access_level_id' => PublicAccessLevel::get()->random()->id,
            'github_link' => $this->faker->url,
            'url' => $this->faker->url,
            'user_id' => User::get()->random()->id,
        ];
    }
}
