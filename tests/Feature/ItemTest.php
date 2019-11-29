<?php

namespace Tests\Feature;

use App\Item;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;

    public function testCreateItem()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('image.jpg');
        $text = $this->faker->text(100);

        $response = $this->post('/item', [
            'image' => $file,
            'text' => $text,
        ]);

        // assert redirect to the form again.
        $response->assertStatus(302);
        $response->assertRedirect(url()->previous());

        $this->assertDatabaseHas('items', [
            'text' => $text,
        ]);

        $item = Item::where('text', $text)->first();

        // Assert the file was stored...
        Storage::disk('public')->assertExists($item->name);

    }


    public function testCreateItemFailNoImage()
    {
        Storage::fake('public');

        $text = $this->faker->text(100);

        $response = $this->post('/item', [
            'text' => $text,
        ]);

        // assert redirect to the form again.
        $response->assertStatus(302);
        $response->assertRedirect(url()->previous());

        $this->assertDatabaseMissing('items', [
            'text' => $text,
        ]);

    }


}
