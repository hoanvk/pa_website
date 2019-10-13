<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function Index()
    {
        # code...
        
        return view('ajax.index');
    }
    public function Action(Request $request)
    {
        # code...
        if($request->ajax()){
            $query=$request->get('query');
            if($query != '')
            {
                $data = Item::where('item_tabl','like','%'.$query.'%')->get();
            }
            else{
                $data = Item::all();
            }
            
            $total_row = $data->count();
            $output='';
            if($total_row > 0){
                foreach ($data as $row) {
                    # code...
                    $output .='<tr><td>'.$row->item_tabl.'</td>
                        <td>'.$row->item_item.'</td>
                        <td>'.$row->short_desc.'</td></tr>';
                       
                }
            }
            else
            {
                $output='<tr><td align="center" colspan="3">No data found</td></tr>';
            }
            $data = array('table_data' => $output, 'total_row'=>$total_row);
            echo json_encode($data);
        }
        
    }
}
