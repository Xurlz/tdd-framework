<?php

class FileLoader extends FileList {
  function __construct()
  {
    parent::__construct();
    $this->loadedFiles = '';
  }
  function load()
  {
    foreach($this->files as $file)
    {
      if(file_exists($file)) require $file;
      $this->loadedFiles .= "$file ";
    }
  }
}
