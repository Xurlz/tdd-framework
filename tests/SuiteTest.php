<?php

class SuiteTest extends TestCase {
  function setUp()
  {
    $this->suite = new TestSuite;
  }
  function testSuite()
  {
    foreach($this->getCases() as $case) {
      foreach($case['parameters'] as $parameter){
        $class = $parameter['class'];
        $this->suite->add(new $class($parameter['method']));
      }
      assert(
        $case['result'] ===
        $this->suite->run(new TestResult)->summary()
      );
    }
  }
  function getCases()
  {
    return [
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
  }
}

