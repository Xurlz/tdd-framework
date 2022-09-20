<?php

class TestSuite {
  function __construct()
  {
    $this->tests = [];
  }
  function add(WasRun $test)
  {
    $this->tests[] = $test;
  }
  function run(TestResult $result)
  {
    foreach( $this->tests as $test)
    {
      $test->run($result);
    }
  }
}

