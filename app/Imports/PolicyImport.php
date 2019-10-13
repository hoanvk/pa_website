<?php

namespace App\Imports;

use App\PolicyUpload;
use Maatwebsite\Excel\Concerns\ToModel;

class PolicyImport implements ToModel
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new PolicyUpload([
            //
    //         'product_id', 
    //         'agent_id'     => $this->agent_id,
    //         'quotation_no', 'policy_no', 'client_name','client_address','client_id',
    // 'client_dob','start_date','end_date','agent_id','premium','period','status','ref_number', 'remarks'
    //         'agent_id'     => Agent::where('name','=',$row[0])->first()->id,
    //         'plan_id'    => $row[1], 
    //         'destination_id' => $row[2],
    //         'day_range_id'    => $row[3], 
    //         'amount' => $row[4],
        ]);
    }
}
