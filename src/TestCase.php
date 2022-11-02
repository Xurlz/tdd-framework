<?php

class TestCase {
  function __construct(string $name)
  {
    $this->name = $name;
  }
  function setUp() {}
  function run(TestResult $result)
  {
    $result->testStarted();
    try{
      $this->setUp();
    }catch(Error)
    {
      $result->setUpFailed();
    }
    try {
      $this->{$this->name}();
    } catch (Exception) {
      $result->testFailed();
    }
    $this->tearDown();
    return $result;
  }
  function tearDown() {}
}

