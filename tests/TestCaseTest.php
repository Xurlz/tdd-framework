<?php

class TestCaseTest extends TestCase {
  function testTemplateMethod()
  {
    $test = new WasRun('testMethod');
    $result = new TestResult;
    $test->run($result);
    assert('setUp testMethod tearDown ' === $test->log);
  }
  function testResult()
  {
    foreach ($this->getTestResultCases() as $case) {
      $test = new $case['class']($case['method']);
      $result = new TestResult;
      assert(
        $case['result'] ===
        $test->run($result)->summary()
      );
    }
  }
  function getTestResultCases()
  {
    return [
      [
        'class' => 'WasRun',
        'method' => 'testMethod',
        'result' => '1 run, 0 failed'
      ],
      [
        'class' => 'WasRun',
        'method' => 'brokenMethod',
        'result' => '1 run, 1 failed'
      ],
      [
        'class' => 'BrokenSetUp',
        'method' => 'testMethod',
        'result' => 'A setUp error has found'
      ]
    ];
  }

}

