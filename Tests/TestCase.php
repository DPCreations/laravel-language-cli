<?php

namespace DPCreations\LaravelLanguageCli\Tests;

use DPCreations\LaravelLanguageCli\laravelLanguageCliServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
      laravelLanguageCliServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }
}
