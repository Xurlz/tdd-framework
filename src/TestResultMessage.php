<?php

class TestResultMessage {
  function __construct(int $runCount, int $failCount, array $failMessages = [])
  {
    $this->runCount = $runCount;
    $this->failCount = $failCount;
    $this->failMessages = $failMessages;
  }
  function __toString()
  {
    $prefix = "$this->runCount run, $this->failCount failed ";
    if($this->failMessages == 0) return $prefix; 
    return "$prefix - testMethod ";
  }
} 

