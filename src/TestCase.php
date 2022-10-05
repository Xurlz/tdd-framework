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
      $result->testFailed($this->getFailMessage($e));
    }
    $this->tearDown();
  }

  function getFailMessage(Error|Exception|AssertionError $e)
  {
    return $this::class.'.'.  $this->name.'.'.  $e::class.': "'.  $e->getMessage().'"';
  }
}

