<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Fuel;

class FuelControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_user_can_view_fuel_index()
    {

        //create a few maker records in the database
        Fuel::factory()->count(3)->create();

        //send get request to the index route
        $response = $this->get(route('fuels')); //makers.indexnek megfelelő kell

        $response->assertStatus(200);

        //assert that the response view contains makers data?
        $response->assertViewHas('entities');
    }

    public function test_user_can_create_fuel()
    {

        $fuelData = ['name' => 'New Fuel'];

        $response = $this->post(route('storeFuel'), $fuelData); //makers.store-nek megfelelő

        $response->assertRedirect(route('makers'));

        //Assert that the response redirects to the makers indx route with a success
        $this->assertDatabaseHas('entities', $fuelData);
        $response->assertSessionHas('success', 'New Fuel sikeresen létrehozva'); //ugyanaz kell mint a makercontrollerbe

    }

    public function test_user_can_update_fuel()
    {

        $fuel = Fuel::factory()->create();

        //Simulate an authenticated user
        // $this->actingAs(User::factory()->create());

        $updatedData = ['name' => 'Updated Fuel'];

        $response = $this->patch(route('updateFuels', $fuel->id), $updatedData);

        $response->assertRedirect(route('fuels'));

        //Assert that the maker was updated in the database
        $this->assertDatabaseHas('entities', $updatedData);
        $response->assertRedirect(route('fuels')); //lehet ez véletlenül van itt
        $response->assertSessionHas('success', 'Updated Fuel sikeresen módosítva'); //ugyanaz kell mint a makercontrollerbe

    }
}
