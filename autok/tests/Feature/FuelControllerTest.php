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
        $response = $this->get(route('fuels.index')); //makers.indexnek megfelelő kell

        $response->assertStatus(200);

        //assert that the response view contains makers data?
        $response->assertViewHas('entities');
    }

    public function test_user_can_create_fuel()
    {

        $fuelData = ['name' => 'New Fuel'];

        $response = $this->post(route('fuels.store'), $fuelData); //makers.store-nek megfelelő

        $response->assertRedirect(route('fuels.index'));

        //Assert that the response redirects to the makers indx route with a success
        $this->assertDatabaseHas('fuels', $fuelData);
        // $response->assertStatus(200);
        $response->assertSessionHas('success', 'Fuel created successfully'); //ugyanaz kell mint a makercontrollerbe

    }

    public function test_user_can_update_fuel()
    {

        $fuel = Fuel::factory()->create();

        //Simulate an authenticated user
        // $this->actingAs(User::factory()->create());

        $updatedData = ['name' => 'Updated Fuel'];

        $response = $this->patch(route('fuels.update', $fuel->id), $updatedData);

        //Assert that the maker was updated in the database
        $this->assertDatabaseHas('fuels', $updatedData);
        $response->assertRedirect(route('fuels.index')); //lehet ez véletlenül van itt
        $response->assertSessionHas('success', 'Fuel updated successfully'); //ugyanaz kell mint a makercontrollerbe

    }

    public function test_user_can_delete_fuel()
    {

        $fuel = Fuel::factory()->create();

        //Simulate an authenticated user
        // $this->actingAs(User::factory()->create());

        $response = $this->delete(route('fuels.destroy', $fuel->id));

        $response->assertRedirect(route('fuels.index'));

        //Assert that the maker was updated in the database
        $this->assertDatabaseMissing('fuels', [$fuel]);
        $response->assertRedirect(route('fuels.index')); //lehet ez véletlenül van itt
        $response->assertSessionHas('success', 'Fuel deleted successfully'); //ugyanaz kell mint a makercontrollerbe
    }
}
