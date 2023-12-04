<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    public function test_example(): void
    {
         $user = User::factory()->create();
        $this->actingAs($user);
        Storage::fake('public');

        $data = [
            'name' => $this->faker->name,
            'icon' => UploadedFile::fake()->image('category_image.jpg'),
            'description' => $this->faker->paragraph,
        ];
        $response = $this->post(route('store.category'), $data);
    }
}
