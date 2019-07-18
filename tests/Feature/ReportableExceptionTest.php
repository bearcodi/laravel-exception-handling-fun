<?php

namespace Tests\Feature;

use App\Error;
use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ReportableExceptionTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function when_i_hit_an_endpoint_that_throws_an_exception_it_should_be_recorded_in_the_database()
    {
        $this->get('/thrown')
            ->assertStatus(Response::HTTP_I_AM_A_TEAPOT);
            
        $this->assertCount(1, Error::all());
    }
    
    /** @test */
    public function it_displays_a_custom_exception_message()
    {
        $this->get('/wrapped')
            ->assertStatus(Response::HTTP_I_AM_A_TEAPOT)
            ->assertViewIs('errors.show');
    }
}
