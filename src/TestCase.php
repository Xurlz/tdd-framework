<?php

class FailMessage {
  function __construct(
    string $className,
    string $testName,
    Error|Exception|AssertionError $exception
  )
  {
    $this->className = $className;
    $this->testName = $testName;
    $this->exception = $exception;
  }

  function __toString()
  {
    return $this->className.'.'.  $this->testName.'.'.  $this->exception::class.': "'. $this->exception->getMessage().'"';
  }

}

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
      $result->testFailed(new FailMessage($this::class,$this->name,$e));
    }
    $this->tearDown();
  }

}

