<?php

namespace Tests;

use App\Models\User;

use Illuminate\Testing\TestResponse;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
  use CreatesApplication;

  protected function setUp(): void
  {
  	parent::setUp();

    $this->withoutExceptionHandling();

    TestResponse::macro('data', function ($key) {
      return $this->original->getData()[$key];
    });
  }

  protected function signIn($user = null)
  {
    $user = $user ?: create(User::class);

    $this->actingAs($user);

    return $this;
  }
}
