<?php

class WasRun extends TestCase {
  function __construct(string $name)
  {
    parent::__construct($name);
    $this->wasRun = 0;
  }
  function run()
  {
    $this->{$this->name}();
  }
  function testMethod()
  {
    $this->wasRun = 1;
  }
}

