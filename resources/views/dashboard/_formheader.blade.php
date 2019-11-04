<div class="pull-left"><h2>{{ $title}} </h2></div>
@isset($parameter)
<div class="pull-right"><a class="btn btn-primary" href="{{route($action,$parameter)}} ">{{$button}} </a></div>
@else
<div class="pull-right"><a class="btn btn-primary" href="{{route($action)}} ">{{$button}} </a></div>    
@endisset
