<?php 

class TestResult {
  function __construct()
  {
    $this->runCount = 0;
    $this->errorCount = 0;
    $this->testName = '';
  }

  function testStarted($testName)
  {
    $this->runCount++;
    $this->testName = "$testName";
  }

  function testFailed()
  {
    $this->errorCount++;
  }

  function summary()
  {
    if($this->errorCount == 0) return "$this->runCount run, $this->errorCount failed";
    return "$this->runCount run, $this->errorCount failed - $this->testName";
  }
}

