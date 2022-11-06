<?php

class SuiteTest extends TestCase {
  function testSuite()
  {
    $suite = new TestSuite;
    $cases = [
      [
        'parameters' => [
          ['class' => 'WasRun', 'method' => 'testMethod'],
          ['class' => 'WasRun', 'method' => 'brokenMethod'],
          ['class' => 'WasRun', 'method' =>'testMethod']
        ],
        'result' => '3 run, 1 failed'
      ],
      [
        'parameters' => [
          ['class' => 'BrokenSetUp', 'method' => 'testMethod'],
          ['class' => 'WasRun', 'method' => 'brokenMethod'],
        ],
        'result' => 'A setUp error has found'
      ]
    ];
    foreach($cases as $case) {
      foreach($case['parameters'] as $parameter){
        $class = $parameter['class'];
        $suite->add(new $class($parameter['method']));
      }
      assert(
        $case['result'] ===
        $suite->run(new TestResult)->summary()
      );
    }
  }
}

