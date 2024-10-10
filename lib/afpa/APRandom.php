<?php

namespace afpa;

class APRandom{
  protected $seed = 0;
  protected int $multiplier;

  public function __construct(float $s=0, int $m=127){
    $this->setSeed($s);
    $this->multiplier = $m;
  }

  protected function setSeed(float $s=0) : void{
    if($s > 0 && $s < 1)
      $this->seed = $s;
    else{
      if($s > 1)
        $now = [0, $s];
      else
        $now = hrtime();

      $this->seed = $now[1] / pow(10, ceil(log10($now[1])));
    }
  }

  public function rand(){
    $result = $this->seed * $this->multiplier;
    // $result -= floor($result);
    $this->setSeed($result - floor($result));
    // echo $result, PHP_EOL;
    // echo $this->seed, PHP_EOL;

    return $this->seed;
  }
}
