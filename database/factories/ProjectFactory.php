<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        Storage::makeDirectory('project_images');
        $title = fake()->text(20);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraphs(15, true),
            'technologies' => fake()->text(20),
            'url' => fake()->url(),
            // 'image' => fake()->imageUrl(250, 250, true),
            'image' => Storage::putFile(fake()->image(storage_path('app/public/project_images'), 250, 250, true)),
            'start_date' => fake()->dateTime(),
            'end_date' => fake()->dateTime(),
            'status' => fake()->text(20),
        ];
    }
}
