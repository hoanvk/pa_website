<?php

namespace App\Imports;

use App\Price;
use App\Agent;
use Maatwebsite\Excel\Concerns\ToModel;

class PriceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Price([
            //
            
            'agent_id'     => Agent::where('name','=',$row[0])->first()->id,
            'plan_id'    => $row[1], 
            'destination_id' => $row[2],
            'day_range_id'    => $row[3], 
            'amount' => $row[4],
        ]);
    }
}
