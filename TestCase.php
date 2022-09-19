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

class TestSuite {
  function __construct()
  {
    $this->tests = [];
  }
  function add(WasRun $test)
  {
    $this->tests[] = $test;
  }
  function run(TestResult $result)
  {
    foreach( $this->tests as $test)
    {
      $test->run($result);
    }
    return $result;
  }
}

