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

  function testBrokenTemplateMethod()
  {
    $test = new WasRun('testBrokenMethod');
    $test->run($this->result);
    assert('setUp testBrokenMethod tearDown ' == $test->log);
  }

  function testResult()
  {
    $test = new WasRun('testMethod');
    $test->run($this->result);
    assert('1 run, 0 failed' == $this->result->summary());
  }

  function testResultMessage()
  {
    assert('1 run, 0 failed' === (new ResultMessage(1,0))->__toString());
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
    $this->result->testFailed('testMethod');
    $this->result->testStarted();
    $this->result->testFailed('testAnotherMethod');
    assert('2 run, 2 failed' == $this->result->summary());
  }

  function testSuite()
  {
    $cases = [
      'WasRun' => ['testMethod','testBrokenMethod'],
      'WasRunII' => ['testMethod','testBrokenMethod'],
    ];
    $suite = new TestSuite();
    foreach($cases as $class => $methods) foreach($methods as $method) $suite->add(new $class($method));
    $suite->run($this->result);
    assert('4 run, 2 failed' == $this->result->summary());
  }

}

