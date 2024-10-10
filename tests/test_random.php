<?php

require_once '../libext/afpa/APUnit.php';
require_once '../lib/afpa/APRandom.php';

use afpa\APUnit;
use afpa\APRandom;

APUnit::test(
  'seed = 0',
  function(){
    $myrandom = new APRandom(0, 127);

    $result = $myrandom->rand();

    if($result != 0)
      return [1, []];
    else
      return [1, ['Result equals Zero']];
  }
);

APUnit::test(
  'seed >= 1 OR seed < 0',
  function(){
    $retour = [0, []];
    $myrandom = new APRandom(1, 127);

    $result = $myrandom->rand();

    // echo $result, PHP_EOL;
    $retour[0]++;
    if($result == 0)
      $retour[1][] = 'Result equals Zero';

    $myrandom = new APRandom(-12, 127);
    $result = $myrandom->rand();

    // echo $result, PHP_EOL;
    $retour[0]++;
    if($result == 0)
      $retour[1][] = 'Result equals Zero';

    $myrandom = new APRandom(12, 127);
    $result = $myrandom->rand();

    // echo $result, PHP_EOL;
    $retour[0]++;
    if($result == 0)
      $retour[1][] = 'Result equals Zero';

    $myrandom = new APRandom(1/127.0, 127);
    $result = $myrandom->rand();

    // echo $result, PHP_EOL;
    $retour[0]++;
    if($result == 0)
      $retour[1][] = 'Result equals Zero';

    return $retour;
  }
);

APUnit::test(
  'Reproduction',
  function(){
    $retour = [0, []];
    $result = [];
    $myrandom = new APRandom(0.1524222011250823, 127);

    for($i=0; $i < 10; $i++){
      $result[] = $myrandom->rand();
    }

    $myrandom = new APRandom(0.1524222011250823, 127);
    for($i=0; $i < 10; $i++){
      $retour[0]++;
      $r = $myrandom->rand();
      if($result[$i] != $r){
        $retour[1][] = sprintf('Differents results : %f %f', $result[$i], $r);
      }
    }

    return $retour;
  }
);

APUnit::test(
  'Random Integers',
  function(){
    $retour = [0, []];
    $myrandom = new APRandom(0.1524222011250824, 127);

    for($i=0; $i < 1000000; $i++){
      $result = $myrandom->randInt(1, 6);
      $retour[0]++;
      if(!in_array($result, [1, 2, 3, 4, 5, 6]))
        $retour[1][] = sprintf('Out of bounds : %d not between 1 and 6', $result);
    }

    $expected = range(10, 25);
    for($i=0; $i < 1000000; $i++){
      $result = $myrandom->randInt(10, 25);
      $retour[0]++;
      if(!in_array($result, $expected))
        $retour[1][] = sprintf('Out of bounds : %d not between 1 and 6', $result);
    }

    return $retour;
  }
);


/*
APUnit::test(
  '',
  function(){

  }
);
/**/
