<?php

require_once 'lib/afpa/APRandom.php';

use afpa\APRandom;

$myrandom = new APRandom(0, 127);


for($i=0; $i < 100000; $i++){
  /*
  if($myrandom->randInt(1, 4) < 2 || $myrandom->randInt(1, 100) < 75){
    echo "super", PHP_EOL;
  }
  */
  if($myrandom->randInt(1, 100) < 75 || $myrandom->randInt(1, 4) < 2){
    echo "super", PHP_EOL;
  }
}

