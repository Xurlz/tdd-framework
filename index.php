#!/usr/bin/env php
<?php

require 'loader/loader.php';

$result = new TestResult;
$suite = new TestSuite;

foreach ((json_decode(file_get_contents('./testCases.json')))->cases as $case) {
  $class = "$case[0]Test";
  $suite->add(new $class("test$case[1]"));
}

$suite->run($result);
echo $result->summary().PHP_EOL;

