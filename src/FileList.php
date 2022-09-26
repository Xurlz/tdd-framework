<?php

class FileList {
  function __construct()
  {
    $this->files = [];
  }
  function add(string $fileName)
  {
    $this->files[] = $fileName;
  }
}

