#!/usr/bin/env php
<?php

$files = [
];
require 'TestCase.php';
require 'WasRun.php';
require 'TestCaseTest.php';

(new TestCaseTest('testRunning'))->run();

