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
    throw new Exception;
  }

  function tearDown()
  {
    $this->log .= 'tearDown ';
  }
}

