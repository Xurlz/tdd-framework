<?php

class TestCaseTest extends TestCase {
  function testSuite()
  {
    $suite = new TestSuite;
    $suite->add(new WasRun('testMethod'));
    $suite->add(new WasRun('brokenMethod'));
    $suite->add(new WasRun('testMethod'));
    assert(
      '3 run, 1 failed' ===
      $suite->run(new TestResult)->summary()
    );
  }
  function testFailedSetUpSuite()
  {
    $suite = new TestSuite;
    $suite->add(new BrokenSetUp('testMethod'));
    $suite->add(new WasRun('testMethod'));
    assert(
      'A setUp error has found' ===
      $suite->run(new TestResult)->summary()
    );
  }
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

