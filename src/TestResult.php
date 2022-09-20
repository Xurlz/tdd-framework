<?php 

class TestResult {
  function __construct()
  {
    $this->runCount = 0;
    $this->errorCount = 0;
  }

  function testStarted()
  {
    $this->runCount++;
  }

  function testFailed()
  {
    $this->errorCount++;
  }

  function summary()
  {
    return "$this->runCount run, $this->errorCount failed";
  }
}

