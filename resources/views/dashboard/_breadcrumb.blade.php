<ul class="breadcrumb">
    @foreach ($nodes as $item)
        @if ($loop->last)
        <li class="breadcrumb-item active">{{ $item['title'] }}</li>
        @else
        <li class="breadcrumb-item"><a href=" {{ route($item['action'])}} ">{{ $item['title'] }}</a></li>
        @endif
    @endforeach
        
        
        
      </ul>