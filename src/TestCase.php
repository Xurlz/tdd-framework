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
    } catch(Error|Exception|AssertionError $e) {
      $result->testFailed('WasRun.'.$this->name.'.'.$e::class.': "'.$e->getMessage().'" ');
    }
    $this->tearDown();
  }

}

