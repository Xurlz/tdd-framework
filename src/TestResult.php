<?php 

class TestResult {
  function __construct()
  {
    $this->runCount = 0;
    $this->errorCount = 0;
    $this->errorMessage = [];
  }

  function testStarted()
  {
    $this->runCount++;
  }

  function testFailed($message)
  {
    $this->errorCount++;
    $this->errorMessage[] = $message;
  }

  function summary()
  {
    $summaryStats = "$this->runCount run, $this->errorCount failed";
    if($this->errorCount == 0) return $summaryStats;
    $separator = ($this->errorCount > 1)?"\n\t":' ';
    $errorDetails = '';
    foreach($this->errorMessage as $errorMessage) $errorDetails .= "$errorMessage$separator";
    return "$summaryStats -$separator$errorDetails";
  }
}

