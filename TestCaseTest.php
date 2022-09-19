<?php

class TestCaseTest extends TestCase {
  function setUp()
  {
    $this->test = new WasRun('testMethod');
  }

  function testTemplateMethod()
  {
    $this->test->run(new TestResult);
    assert('setUp testMethod tearDown ' == $this->test->log);
  }

  function testResult()
  {
    $test = new WasRun('testMethod');
    $result = $test->run(new TestResult);
    assert('1 run, 0 failed' == $result->summary());
  }

  function testFailedResult()
  {
    $test = new WasRun('testBrokenMethod');
    $result = $test->run(new TestResult);
    assert('1 run, 1 failed' == $result->summary());
  }

  function testFailedResultFormatting()
  {
    $result = new TestResult;
    $result->testStarted();
    $result->testFailed();
    assert('1 run, 1 failed' == $result->summary());
  }

  function testSuite()
  {
    $suite = new TestSuite();
    $suite->add(new WasRun('testMethod'));
    $suite->add(new WasRun('testBrokenMethod'));
    $result = new TestResult;
    $suite->run($result);
    assert('2 run, 1 failed' == $result->summary());
  }

}

