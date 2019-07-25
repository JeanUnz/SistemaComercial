<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateStatusTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /**@test
          */
    public function a_user_can_create_Statuses()
    {
       // $response = $this->get('/');
       // $response->assertStatus(200);
       //1.Given =>terminara un usuario autetificado7

        $User = factory(User:: class)->create();
        $this->actingAs($user);

        //2.when =>cuanto hace un post requeste a status

        $this->post(route('status.store'),['body' =>'mi primer estatus']);
        //3.then =>entonces veo un nuevo estado en la base de datos
        $this->assertDatabaseHas('statuses', [
            'body'=> 'mi primer status'
            ]);
    }
}
