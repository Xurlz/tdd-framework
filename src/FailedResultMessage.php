<?php

class FailedResultMessage {
  function __construct(string $className,string $methodName,Error|Exception|AssertionError $exception)
  {
    $this->className = $className;
    $this->methodName = $methodName;
    $this->exception = $exception;
  }

  function __toString()
  {
    return "{$this->className}.{$this->methodName}.{$this->getClassName($this->exception)}: \"{$this->exception->getMessage()}\"";
  }

  function getClassName(object $object)
  {
    return get_class($object);
  }
}
