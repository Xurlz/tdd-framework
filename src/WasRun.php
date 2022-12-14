<?php

class WasRun extends TestCase {
  public string $log;

  function __construct(string $name)
  {
    parent::__construct($name);
  }

  function setUp()
  {
    $this->log = 'setUp ';
  }

  function testMethod()
  {
    $this->log .= 'testMethod ';
  }

  function testBrokenMethod()
  {
    $this->log .= 'testBrokenMethod ';
    throw new Exception('An Exception was thrown');
  }

  function tearDown()
  {
    $this->log .= 'tearDown ';
  }
}

