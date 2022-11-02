<?php

class BrokenSetUp extends TestCase {
  function setUp()
  {
    throw new Error;
  }
  function testMethod() {}
}
