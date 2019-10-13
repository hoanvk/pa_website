<?php

namespace App\Exports;

use App\Price;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class PriceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $model =Price::select('id', 'agent_id','plan_id', 'destination_id', 'day_range_id', 'amount')->get(); 
        foreach ($model as $price) {
            # code...
            $price->day_range_title = $price->day_range->title;
            $price->agent_title = $price->agent->title;
            $price->destination_title = $price->destination->title;
            $price->plan_title = $price->plan->title;
        }
        return $model;
    }
    public function headings(): array
    {
        return [
            'id', 'agent_id','plan_id', 'destination_id', 'day_range_id', 'amount',
            'day_range_title',
            'agent_title',
            'destination_title',
            'plan_title',
        ];
    }
}
