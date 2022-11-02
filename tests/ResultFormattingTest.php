<?php

class ResultFormattingTest extends TestCase {
  function setUp()
  {
    $this->result = new TestResult;
  }
  function testFailedResultFormatting()
  {
    $this->result->testStarted();
    $this->result->testFailed();
    assert('1 run, 1 failed' === $this->result->summary());
  }
  function testSetUpFailedResultFormatting()
  {
    $this->result->setUpFailed();
    assert(
      'A setUp error has found' ===
      $this->result->summary()
    );
  }
}
