<?php

class Command {
  function __construct()
  {
    $this->output = [];
  }
  function run() {}
}

class Main extends Command {
  function run()
  {
    $result = new TestResult;
    $suite = new TestSuite;

    foreach ((json_decode(file_get_contents('./testCases.json')))->cases as $case) {
      $class = "$case[0]Test";
      $suite->add(new $class("test$case[1]"));
    }

    $suite->run($result);
    $this->output[] = $result->summary().PHP_EOL;
  }
}

