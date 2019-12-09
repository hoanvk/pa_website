<?php

namespace App\Repositories\Travel;
interface IPremium{
  public function calculate(Policy $policy);
  public function withdrawl($agent_id, $premium);
}