<?php

class TestCaseTest extends TestCase {
  function setUp()
  {
    $this->result = new TestResult;
  }

  function testTemplateMethod()
  {
    $test = new WasRun('testMethod');
    $test->run($this->result);
    $this->assertEquals(
      'setUp testMethod tearDown ',
      $test->log
    );
  }

  function testBrokenTemplateMethod()
  {
    $test = new WasRun('testBrokenMethod');
    $test->run($this->result);
    $this->assertEquals(
      'setUp testBrokenMethod tearDown ',
      $test->log
    );
  }

  function testResult()
  {
    $test = new WasRun('testMethod');
    $test->run($this->result);
    $this->assertEquals(
      '1 run, 0 failed',
      $this->result->summary()
    );
  }

  function testFailedResult()
  {
    $test = new WasRun('testBrokenMethod');
    $test->run($this->result);
    $this->assertEquals(
      '1 run, 1 failed - WasRun.testBrokenMethod.Exception:"An Exception was thrown" ',
      $this->result->summary()
    );
  }

  function testFailedResultFormatting()
  {
    $this->result->testStarted();
    $this->result->testFailed('testMethod');
    $this->result->testStarted();
    $this->result->testFailed('testAnotherMethod');
    $this->result->testStarted();
    $this->result->testFailed('testYetAnotherMethod');

    $this->assertEquals(
      "3 run, 3 failed -\n\ttestMethod\n\ttestAnotherMethod\n\ttestYetAnotherMethod\n\t",
      $this->result->summary()
    );
  }

  function testSuite()
  {
    $cases = [
      'WasRun' => ['testMethod','testBrokenMethod'],
      'WasRunII' => ['testMethod','testBrokenMethod'],
    ];
    $suite = new TestSuite();
    foreach($cases as $class => $methods) {
      foreach($methods as $method) $suite->add(new $class($method));
    }
    $suite->run($this->result);
    $this->assertEquals(
      "4 run, 2 failed -".
      "\n\tWasRun.testBrokenMethod.Exception:\"An Exception was thrown\"".
      "\n\tWasRunII.testBrokenMethod.Error:\"\"\n\t",
      $this->result->summary()
    );
  }
}

