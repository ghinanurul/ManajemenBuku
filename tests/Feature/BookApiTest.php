<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_book() {
        $response = $this->postJson('/api/books', [
            'title' => 'Tes Buku',
            'author' => 'Penulis A',
            'year' => 2024
        ]);
        $response->assertStatus(201)->assertJsonFragment(['title' => 'Tes Buku']);
    }
}
