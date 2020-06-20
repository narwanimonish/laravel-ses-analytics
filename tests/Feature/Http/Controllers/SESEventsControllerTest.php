<?php

namespace Narwanimonish\SESEvents\Tests\Feature\Http\Controllers;

use Narwanimonish\SESEvents\Tests\TestCase;

class SESEventsControllerTests extends TestCase
{
    /** @test */
    public function testing_index_route()
    {
        $this->get('/')->assertOk()->assertSee('OK');
    }
}
