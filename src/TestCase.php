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
      // template: className.classMethod.ExceptionClassName:"ExceptionMessage"
      $result->testFailed($this::class.'.'.$this->name.'.'.$e::class.':"'.$e->getMessage().'"');
    }
    $this->tearDown();
  }

  function assertEquals($expected,$actual) : bool
  {
    return assert(
      $expected ===
      $actual,
      "\n\t\t'$expected' expected,\n\t\t'$actual' found\n\t"
    );
  }

}

