<?php

class CommandTest extends TestCase {
  function testRunning()
  {
    $test = new Command;
    $test->run();
    assert(is_array($test->output));
  }
}

