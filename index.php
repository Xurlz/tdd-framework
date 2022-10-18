#!/usr/bin/env php
<?php

require 'loader/loader.php';

$main = new Main;
$main->run();
echo $main->output[0];

