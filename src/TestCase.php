<?php

class TestCase {
  function __construct(string $name)
  {
    $this->name = $name;
  }

  function setUp() {}
  function tearDown() {}

  function run(TestResult $result)
  {
    $result->testStarted();
    $this->setUp();
    try {
      $this->{$this->name}();
    } catch(Exception|AssertionError) {
      $result->testFailed();
    }
    $this->tearDown();
  }
}

