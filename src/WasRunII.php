<?php

class WasRunII extends TestCase {
  function testMethod() {}
  function testBrokenMethod()
  {
    throw new Error;
  }
}

