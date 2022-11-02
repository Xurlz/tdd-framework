<?php

class TestResult {
  function __construct()
  {
    $this->runCount = 0;
    $this->errorCount = 0;
    $this->failedSetUp = 0;
  }
  function testStarted()
  {
    $this->runCount++;
  }
  function testFailed()
  {
    $this->errorCount++;
  }
  function setUpFailed()
  {
    $this->failedSetUp = 1;
  }
  function summary()
  {
    if($this->failedSetUp) return 'A setUp error has found';
    return "$this->runCount run, $this->errorCount failed";
  }
}

