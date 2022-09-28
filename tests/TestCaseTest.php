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

  function testFailedResult()
  {
    $test = new WasRun('testBrokenMethod');
    $test->run($this->result);
    assert('1 run, 1 failed - testBrokenMethod' == $this->result->summary());
  }

  function testFailedResultFormatting()
  {
    $this->result->testStarted('testMethod');
    $this->result->testFailed();
    assert('1 run, 1 failed - testMethod' == $this->result->summary());
  }

  function testSuite()
  {
    $suite = new TestSuite();
    $suite->add(new WasRun('testMethod'));
    $suite->add(new WasRun('testBrokenMethod'));
    $suite->add(new WasRunII('testMethod'));
    $suite->run($this->result);
    assert('3 run, 1 failed - testBrokenMethod' == $this->result->summary());
  }

}

