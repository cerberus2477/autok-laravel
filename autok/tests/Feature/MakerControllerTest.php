<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Maker;

class MakerControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_user_can_view_makers_index()
    {

        //create a few maker records in the database
        Maker::factory()->count(3)->create();

        //send get request to the index route
        $response = $this->get(route('makers')); //makers.indexnek megfelelő kell

        $response->assertStatus(200);

        //assert that the response view contains makers data?
        $response->assertViewHas('entities');
    }
}
