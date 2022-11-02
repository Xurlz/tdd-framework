<?php

class SuiteTest extends TestCase {
  function setUp()
  {
    $this->suite = new TestSuite;
  }
  function testSuite()
  {
    $this->suite->add(new WasRun('testMethod'));
    $this->suite->add(new WasRun('brokenMethod'));
    $this->suite->add(new WasRun('testMethod'));
    assert(
      '3 run, 1 failed' ===
      $this->suite->run(new TestResult)->summary()
    );
  }
  function testFailedSetUp()
  {
    $this->suite->add(new BrokenSetUp('testMethod'));
    $this->suite->add(new WasRun('testMethod'));
    assert(
      'A setUp error has found' ===
      $this->suite->run(new TestResult)->summary()
    );
  }
}
