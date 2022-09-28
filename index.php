#!/usr/bin/env php
<?php

require 'loader/loader.php';

$result = new TestResult;
$suite = new TestSuite;

$cases = [
  ['TestCaseTest', 'TemplateMethod'],
  ['TestCaseTest', 'BrokenTemplateMethod'],
  ['TestCaseTest', 'Result'],
  ['TestCaseTest', 'FailedResult'],
  ['TestCaseTest', 'FailedResultFormatting'],
  ['TestCaseTest', 'Suite'],
  ['FileLoaderTest', 'LoadingFile'],
];

foreach ($cases as $case) {
  $suite->add(new $case[0]("test$case[1]")); 
}

$suite->run($result);
echo $result->summary().PHP_EOL;

