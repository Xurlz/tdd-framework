#!/usr/bin/env php
<?php

$files = [
  'TestCase',
  'TestCaseTest',
  'WasRun'
];

$cases = [
  'TemplateMethod',
  'Result',
  'FailedResult',
  'FailedResultFormatting',
  'Suite'
];

foreach ($files as $file) {
  require "$file.php";
}

foreach ($cases as $case) {
  echo (new TestCaseTest("test$case"))->run(new TestResult)->summary().PHP_EOL;
}

