<?php

namespace Tests\Feature;

use App\Error;
use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ShowErrorsTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function it_shows_the_error_on_screen()
    {
        factory(Error::class)->create([
            'message' => "Jen, dont break the internet!"
        ]);
        
        $this->get('/errors')
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs('errors.index')
            ->assertSee("Jen, dont break the internet!");
    }
}
