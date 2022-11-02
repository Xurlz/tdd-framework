<?php

class TestSuite {
  function __construct()
  {
    $this->tests = [];
  }
  function run(TestResult $result)
  {
    foreach($this->tests as $test) $test->run($result);
    return $result;
  }
  function add(TestCase $test)
  {
    $this->tests[] = $test;
  }
}
