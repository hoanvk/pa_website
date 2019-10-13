<?php

namespace App\Exports;

use App\Policy;
use Maatwebsite\Excel\Concerns\FromCollection;

class PolicyExport implements FromCollection
{
    private $query;

    public function __construct(string $query)
    {
         $this->query = $query;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Policy::where('agent_id','=',$this->query)->get();
    }
}
