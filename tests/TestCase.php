<?php

namespace Narwanimonish\SESEvents\Tests;

use Illuminate\Support\Facades\Schema;
use Narwanimonish\SESEvents\SESEventsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__ . '/database/factories');
    }

    protected function getPackageProviders($app)
    {
        return [
            SESEventsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        /* $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]); */

        Schema::dropAllTables();


        include_once __DIR__ . '/../database/migrations/create_ses_events.php.stub';
        (new \CreateSkeletonTable())->up();
    }
}
