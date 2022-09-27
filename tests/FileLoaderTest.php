<?php

class FileLoaderTest extends TestCase {
  function testLoadingFile()
  {
    $loader = new FileLoader;
    $loader->add('file1.php');
    $loader->add('file2.php');
    $loader->add('file3.php');
    $loader->load();
    assert($loader->loadedFiles == 'file1.php file2.php file3.php ');
  }
}

