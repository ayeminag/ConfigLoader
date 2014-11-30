<?php

class Config{
  public $path;
  private $configValue;
  private $keys;
  public function __construct(){
    $this->path = __DIR__.DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR;
  }

  public function get($accessor){
    $this->keys = explode(".", $accessor);
    $this->configValue = require $this->path.$this->keys[0].".php";
    $this->resolveKeys();
    return $this->configValue;
  }

  private function resolveKeys(){
    for ($i = 1; $i < count($this->keys); $i++) {
      $this->configValue = $this->configValue[$this->keys[$i]];
    }
  }
}