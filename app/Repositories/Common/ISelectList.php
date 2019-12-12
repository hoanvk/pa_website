<?php

/**
 * Dropdown List
 * (c) 2019 MSIG Vietnam <https://msig.com.vn>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repositories\Common;

interface ISelectList {
    public function policyStatus();

    //Quan he voi nguoi yeu cau BH
    public function relationship();
    //Gioi tinh
    public function gender();
    //Loai hinh don

    public function policyType();
    //Country
    public function country();

    public function province();

    //Product Type
    public function productType();
    //Period unit
    public function periodUnit();
    public function languages();

    public function productLine($line);
    public function productPlan($product_id);
    public function productPeriod($product_id);
}