<?php

class WasRun extends TestCase {
  function __construct(string $name)
  {
    parent::__construct($name);
    $this->log = '';
  }
  function setUp()
  {
    $this->log .= 'setUp ';
  }
  function testMethod()
  {
    $this->log .= 'testMethod ';
  }
  function brokenMethod()
  {
    throw new Exception;
  }
  function tearDown()
  {
    $this->log .= 'tearDown ';
  }
}

