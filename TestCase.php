<?php

class TestCase {
  function __construct(string $name)
  {
    $this->name = $name;
  }

  function setUp() {}
  function tearDown() {}

  function run()
  {
    $result = new TestResult;
    $result->testStarted();
    $this->setUp();
    try {
      $this->{$this->name}();
    } catch(Exception) {
      $result->testFailed();
    }
    $this->tearDown();
    return $result;
  }
}

class TestResult {
  function __construct()
  {
    $this->runCount = 0;
    $this->errorCount = 0;
  }

  function testStarted()
  {
    $this->runCount++;
  }

  function testFailed()
  {
    $this->errorCount++;
  }

  function summary()
  {
    return "$this->runCount run, $this->errorCount failed";
  }
}

class WasRun extends TestCase {
  public string $log;

  function __construct(string $name)
  {
    parent::__construct($name);
  }

  function setUp()
  {
    $this->log = 'setUp ';
  }

  function testMethod()
  {
    $this->log .= 'testMethod ';
  }

  function testBrokenMethod()
  {
    throw new Exception;
  }

  function tearDown()
  {
    $this->log .= 'tearDown ';
  }
}

