<?php

class TestCaseTest extends TestCase {
  function testTemplateMethod()
  {
    $test = new WasRun('testMethod');
    $test->run(new TestResult);
    assert('setUp testMethod tearDown ' === $test->log);
  }
  function testResult()
  {
    $test = new WasRun('testMethod');
    assert(
      '1 run, 0 failed' ===
      $test->run(new TestResult)->summary()
    );
  }
  function testFailedResult()
  {
    $test = new WasRun('brokenMethod');
    assert(
      '1 run, 1 failed' ===
      $test->run(new TestResult)->summary()
    );
  }
  function testFailedSetUp()
  {
    $test = new BrokenSetUp('testMethod');
    assert(
      'A setUp error has found' ===
      $test->run(new TestResult)->summary()
    );
  }
}

