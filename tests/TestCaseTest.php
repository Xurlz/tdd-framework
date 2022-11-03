<?php

class TestCaseTest extends TestCase {
  function testTemplateMethod()
  {
    $test = new WasRun('testMethod');
    $result = new TestResult;
    $test->run($result);
    assert('setUp testMethod tearDown ' === $test->log);
  }
  function testResultData()
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
  function testResult()
  {
    foreach ($this->testResultData() as $parameter) {
      $test = new $parameter['class']($parameter['method']);
      $result = new TestResult;
      assert(
        $parameter['result'] ===
        $test->run($result)->summary()
      );
    }
  }

}

