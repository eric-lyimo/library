<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_an_action_that_requires_authentication()
    {
 
        $response = $this->actingAs([
            'name'=>'admin@library.ac.tz',
            'password'=>'test1234'
        ])
        ->get('/home');
    }
}
