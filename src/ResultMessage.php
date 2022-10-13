<?php

class ResultMessage {
  function __construct(int $runCount, int $failCount)
  {
    $this->runCount = $runCount;
    $this->failCount = $failCount;
  }
  function __toString()
  {
    return "$this->runCount run, $this->failCount failed"; 
  }
} 

