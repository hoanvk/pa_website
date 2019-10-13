<table class="table" style="margin-top:5px">
        <thead>
            <tr>
                <th>Full name</th>
                <th>Date of birth</th>
                <th>ID/Passport</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row">{{ $item->insured_name }}</td>
                <td>{{ date('d/m/Y', strtotime($item->dob)) }}</td>
                <td>{{ $item->insured_id }}</td>
                <td><a href="{{  route('members.show', ['policy_id'=>$policy_id, 'id'=>$item->id]) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
   
