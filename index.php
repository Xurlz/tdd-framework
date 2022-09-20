#!/usr/bin/env php
<?php

$classDirs = [ 'src/','./'];
$files = [
  "TestCase",
  "TestCaseTest",
  "WasRun",
  "TestResult",
  "TestSuite"
];

$cases = [
  'TemplateMethod',
  'Result',
  'FailedResult',
  'FailedResultFormatting',
  'Suite'
];

foreach ($classDirs as $classDir) {
  if(file_exists($classDir)) {
    foreach ($files as $file) {
      if(file_exists("$classDir$file.php")) require "$classDir$file.php";
    }
  }
}

$result = new TestResult;
foreach ($cases as $case) {
  (new TestCaseTest("test$case"))->run($result);
}
echo $result->summary().PHP_EOL;

