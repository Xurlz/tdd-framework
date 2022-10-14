<?php 

class TestResult {
  function __construct()
  {
    $this->runCount = 0;
    $this->errorCount = 0;
    $this->errorMessage = '';
  }

  function testStarted()
  {
    $this->runCount++;
  }

  function testFailed($message)
  {
    $this->errorCount++;
    $this->errorMessage .= "$message ";
  }

  function summary()
  {
    $prefix = "$this->runCount run, $this->errorCount failed";
    if($this->errorCount > 0) return "$prefix - $this->errorMessage";
    return $prefix;
  }
}

