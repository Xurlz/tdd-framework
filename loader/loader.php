<?php

require 'loader/FileList.php';
require 'loader/FileLoader.php';

$loader = new FileLoader;
foreach(json_decode(file_get_contents('loader.json'))->files as $file) $loader->add("$file.php");
$loader->load();

