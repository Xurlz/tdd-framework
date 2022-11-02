#!/usr/bin/env php
<?php

$files = [
  'src/TestCase.php',
  'src/WasRun.php',     
  'src/TestResult.php',
  'src/BrokenSetUp.php',
  'src/TestSuite.php',
  'tests/TestCaseTest.php',
  'tests/ResultFormattingTest.php',
  'tests/SuiteTest.php'
];

foreach($files as $file) require $file;

$cases = [
  ['class' => 'SuiteTest', 'method' => 'testSuite'],
  ['class' => 'SuiteTest', 'method' => 'testFailedSetUp'],
  ['class' => 'TestCaseTest', 'method' => 'testTemplateMethod'],
  ['class' => 'TestCaseTest', 'method' => 'testResult'],
  ['class' => 'TestCaseTest', 'method' => 'testFailedResult'],
  ['class' => 'TestCaseTest', 'method' => 'testFailedSetUp'],
  ['class' => 'ResultFormattingTest', 'method' => 'testFailedResultFormatting'],
  ['class' => 'ResultFormattingTest', 'method' => 'testSetUpFailedResultFormatting'],
];
$suite = new TestSuite;
foreach($cases as $case) {
  $class = $case['class'];
  $suite->add(new $class($case['method']));
}
echo $suite->run(new TestResult)->summary()."\n";

