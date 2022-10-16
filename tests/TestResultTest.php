<?php

class TestResultTest extends TestCase {
  function testMessage()
  {
    $this->assertEquals(
      '1 run, 0 failed',
      (new TestResultMessage(1,0))->__toString()
    );
  }
  function testFailMessage()
  {
    $this->assertEquals(
      '2 run, 1 failed - errorMessage ',
      (new TestResultMessage(2,1,['errorMessage']))
      ->__toString()
    );
  }
}

