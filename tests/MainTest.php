<?php

class MainTest extends TestCase {
  function testRunning()
  {
    $test = new Main;
    $test->run();
    assert($test->wasRun);
  }
}

