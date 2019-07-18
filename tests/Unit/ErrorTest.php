<?php

namespace Tests\Unit;

use App\Error;
use TypeError;
use Tests\TestCase;
use App\Exceptions\RecordableException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ErrorTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function it_creates_a_new_model_from_an_exception()
    {
        $exception = new RecordableException('test error message');
        
        $model = Error::fromException($exception);
        
        $this->assertEquals('test error message', $model->message);
        
        $this->assertDatabaseHas('errors', [
            'message' => 'test error message'
        ]);
    }
    
    /** @test */
    public function it_throws_an_exception_when_an_exception_isnt_passed()
    {
        $this->expectException(TypeError::class);
        
        Error::fromException('whoops');
    }
}
