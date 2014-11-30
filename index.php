<?php

require 'config.php';

$config = new Config;
$result = $config->get("app.host");
var_dump($result);