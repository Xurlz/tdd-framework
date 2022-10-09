<?php 

class TestResult {
  function __construct()
  {
    $this->runCount = 0;
    $this->errorCount = 0;
    $this->failedTestNames = "";
  }

  function testStarted()
  {
    $this->runCount++;
  }

  function testFailed($testName)
  {
    $this->errorCount++;
    return $this->failedTestNames .= "$testName ";
  }

  function summary()
  {
    $templatePrefix = "$this->runCount run, $this->errorCount failed";
    if($this->errorCount == 0) return $templatePrefix;
    return "$templatePrefix - $this->failedTestNames";
  }
}

