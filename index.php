#!/usr/bin/env php
<?php

// Funcionamento afetado pela ordem
$classDirs = [ 'src/','./'];
$files = [
  'TestCase',
  'TestCaseTest',
  'WasRun',
  'WasRunII',
  'TestResult',
  'TestSuite',
  'FileLoaderTest',
];

$cases = [
  'TemplateMethod',
  'BrokenTemplateMethod',
  'Result',
  'FailedResult',
  'FailedResultFormatting',
  'Suite',
];

require 'src/FileList.php';
require 'src/FileLoader.php';
$loader = new FileLoader;
foreach ($classDirs as $classDir) {
  foreach($files as $file) $loader->add("$classDir$file.php");
}
$loader->load();

$result = new TestResult;
$suite = new TestSuite;
foreach ($cases as $case) {
  $suite->add(new TestCaseTest("test$case"));
}
$suite->add(new FileLoaderTest('testLoadingFile'));
$suite->run($result);
echo $result->summary().PHP_EOL;

