<?php

class TestCaseTest extends TestCase {
  function testRunning()
  {
    $test = new WasRun('testMethod');
    assert(!$test->wasRun);
    $test->run();
    assert($test->wasRun);
  }
}

