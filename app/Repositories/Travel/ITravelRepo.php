<?php

namespace App\Repositories\Travel;
interface ITravelRepo{
  public function calculate(Policy $policy);
  public function withdrawl($agent_id, $premium);
}