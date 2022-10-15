<?php 

class TestResult {
  function __construct()
  {
    $this->runCount = 0;
    $this->errorCount = 0;
    $this->errorMessages = [];
  }

  function testStarted()
  {
    $this->runCount++;
  }

  function testFailed($message)
  {
    $this->errorCount++;
    $this->errorMessages[] = $message;
  }

  function summary()
  {
    return (new TestResultMessage($this->runCount,$this->errorCount,$this->errorMessages))->__toString();
  }
}

