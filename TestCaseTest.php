<?php

class TestCaseTest extends TestCase {
  function setUp()
  {
    $this->test = new WasRun('testMethod');
  }

  function testTemplateMethod()
  {
    $this->test->run();
    assert('setUp testMethod tearDown ' == $this->test->log);
  }

  function testResult()
  {
    $test = new WasRun('testMethod');
    $result = $test->run();
    assert('1 run, 0 failed' == $result->summary());
  }

  function testFailedResult()
  {
    $test = new WasRun('testBrokenMethod');
    $result = $test->run();
    assert('1 run, 1 failed' == $result->summary());
  }

  function testFailedResultFormatting()
  {
    $result = new TestResult;
    $result->testStarted();
    $result->testFailed();
    assert('1 run, 1 failed' == $result->summary());
  }

}

