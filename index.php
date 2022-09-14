#!/usr/bin/env php
<?php

$files = [
  'TestCase',
  'TestCaseTest'
];

$cases = [
  'TemplateMethod',
  'Result',
  'FailedResult',
  'FailedResultFormatting'
];

foreach ($files as $file) {
  require "$file.php";
}

foreach ($cases as $case) {
  (new TestCaseTest("test$case"))->run();
}

