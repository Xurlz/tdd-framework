<?php

class NonExistentClassTestCase extends TestCase {
  function testMethod()
  {
    new Foo;
  }
}
