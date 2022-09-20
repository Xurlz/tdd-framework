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
    assert('setUp testMethod tearDown ' == $test->log);
  }

  function testResult()
  {
    $test = new WasRun('testMethod');
    $test->run($this->result);
    assert('1 run, 0 failed' == $this->result->summary());
  }

  function testFailedResult()
  {
    $test = new WasRun('testBrokenMethod');
    $test->run($this->result);
    assert('1 run, 1 failed' == $this->result->summary());
  }

  function testFailedResultFormatting()
  {
    $this->result->testStarted();
    $this->result->testFailed();
    assert('1 run, 1 failed' == $this->result->summary());
  }

  function testSuite()
  {
    $suite = new TestSuite();
    $suite->add(new WasRun('testMethod'));
    $suite->add(new WasRun('testBrokenMethod'));
    $suite->run($this->result);
    assert('2 run, 1 failed' == $this->result->summary());
  }

}
