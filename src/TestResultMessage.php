<?php

class TestResultMessage {
  function __construct(int $runCount, int $errorCount, array $errorMessages = [])
  {
    $this->runCount = $runCount;
    $this->errorCount = $errorCount;
    $this->errorMessages = $errorMessages;
  }
  function __toString()
  {
    $summaryStats = "$this->runCount run, $this->errorCount failed";
    if($this->errorCount == 0) return $summaryStats;
    $separator = ($this->errorCount > 1)?"\n\t":' ';
    $errorDetails = '';
    foreach($this->errorMessages as $errorMessage) $errorDetails .= "$errorMessage$separator";
    return "$summaryStats -$separator$errorDetails";
  }
} 

