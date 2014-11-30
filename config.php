<?php

class Config{
  public $path;
  private $configArray;
  private $keys;
  public function __construct(){
    $this->path = __DIR__.DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR;
  }

  public function get($accessor){
    $this->keys = explode(".", $accessor);
    $this->configArray = require $this->path.$this->keys[0].".php";
    $this->resolveKeys();
    return $this->configArray;
  }

  private function resolveKeys(){
    for ($i = 1; $i < count($this->keys); $i++) {
      $this->configArray = $this->configArray[$this->keys[$i]];
    }
  }
}