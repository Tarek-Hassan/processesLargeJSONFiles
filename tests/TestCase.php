<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public function setUp() : void{
        parent::setUp();
        $this->test_importing_file();

    }

    public function test_importing_file()
    {
        $this->artisan('queue:work');
        $this->expectException(Symfony\Component\Console\Exception\RuntimeException::class);
        $this->artisan('import:json');
    }
    
}
