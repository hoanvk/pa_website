<table class="table" style="margin-top:5px">
        <thead>
            <tr>
                <th>@lang('members.name')</th>
                <th>@lang('members.dob')</th>
                <th>@lang('members.identity')</th>
                <th>@lang('members.gender')</th>
                <th>@lang('members.age')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($model as $item)
            <tr>
                <td scope="row">{{ $item->insured_name }}</td>
                <td>{{ date('d/m/Y', strtotime($item->dob)) }}</td>
                <td>{{ $item->insured_id }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ $item->age }}</td>
                <td><a href="{{  route('members.show', ['policy_id'=>$policy->id, 'id'=>$item->id]) }} "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>   
   
