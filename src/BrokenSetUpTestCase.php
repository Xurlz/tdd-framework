<?php

class BrokenSetUpTestCase extends TestCase {
  function setUp()
  {
    throw new Error;
  }
}

