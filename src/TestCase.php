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
    $result->testStarted($this->name);
    $this->setUp();
    try {
      $this->{$this->name}();
    } catch(Error|Exception|AssertionError) {
      $result->testFailed();
    }
    $this->tearDown();
  }
}

