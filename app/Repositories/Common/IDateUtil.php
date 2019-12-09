<?php

/**
 * Date Util
 * (c) 2019 MSIG Vietnam <https://msig.com.vn>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repositories\Common;

interface UserInterface {
  public function parseDate($date);
  public function compareNow($date);
  public function compareDate($date1, $date2);
  public function dateDmyDiff($date1, $date2);
  public function age($dob);
  public function dateDiff($date1, $date2);
}