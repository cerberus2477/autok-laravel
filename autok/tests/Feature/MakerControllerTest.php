<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Maker;

class MakerControllerTest extends TestCase
{
    //     use RefreshDatabase;
//     /**
//      * A basic unit test example.
//      */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    //     public function test_user_can_view_makers_index()
//     {

    //         //create a few maker records in the database
//         Maker::factory()->count(3)->create();

    //         //send get request to the index route
//         $response = $this->get(route('makers')); //makers.indexnek megfelelő kell

    //         $response->assertStatus(200);

    //         //assert that the response view contains makers data?
//         $response->assertViewHas('entities');
//     }

    //     public function test_authenticated_user_can_create_maker()
//     {

    //         $makerData = ['name' => 'New Maker'];

    //         $response = $this->post(route('storeMaker'), $makerData); //makers.store-nek megfelelő

    //         $response->assertRedirect(route('makers'));

    //         //Assert that the response redirects to the makers indx route with a success
//         $this->assertDatabaseHas('entities', $makerData);
//         $response->assertSessionHas('success', 'New Maker sikeresen létrehozva'); //ugyanaz kell mint a makercontrollerbe

    //     }

    //     public function test_user_can_update_maker()
//     {

    //         $maker = Maker::factory()->create();

    //         //Simulate an authenticated user
//         // $this->actingAs(User::factory()->create());

    //         $updatedData = ['name' => 'Updated Maker'];

    //         $response = $this->patch(route('updateMakers', $maker->id), $updatedData);

    //         $response->assertRedirect(route('makers'));

    //         //Assert that the maker was updated in the database
//         $this->assertDatabaseHas('entities', $updatedData);
//         $response->assertRedirect(route('makers')); //lehet ez véletlenül van itt
//         $response->assertSessionHas('success', 'Updated Maker sikeresen módosítva'); //ugyanaz kell mint a makercontrollerbe

    //     }
}
