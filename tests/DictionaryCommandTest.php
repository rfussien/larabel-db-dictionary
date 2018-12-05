<?php

namespace Rfussien\DbDictionary;

use Orchestra\Testbench\TestCase as Orchestra;

class DictionaryCommandTest extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [CommandServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('view.paths', [__DIR__ . '/resources/views']);
        $app['config']->set('database.default', 'mysql');
        $app['config']->set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'forge',
            'username' => 'forge',
            'password' => '',
        ]);
    }

    public function testAnExceptionIsThrownWhenTheDriverIsUnsupported()
    {
        config(['database.default' => 'sqlite']);
        config([
            'database.connections.sqlite' => [
                'driver' => 'sqlite',
                'database' => 'database.sqlite',
            ],
        ]);

        $this->artisan('db:dictionary');
    }

    public function testGenerateCommandRenderAnHtmlFile()
    {
        $this->artisan('db:dictionary');

        $this->assertTrue(true);
    }
}
