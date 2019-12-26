@isset($policy)
<div class="mx-auto" style="width:450px">
    <ul class="list-group list-group-horizontal">
      <li class="list-group-item list-group-status {{ $policy->status>1?'active':'' }} {{$tabs=='quotation'?'current':''}}">@lang('pa.quotation')</li>
      <li class="list-group-item list-group-status {{ $policy->status>2?'active':'' }} {{$tabs=='customers'?'current':''}}">@lang('pa.policy_holder')</li>
      <li class="list-group-item list-group-status {{ $policy->status>3?'active':'' }} {{$tabs=='members'?'current':''}}">@lang('pa.insured_person')</li>
      <li class="list-group-item list-group-status {{ $policy->status>4?'active':'' }} {{$tabs=='confirm' || $tabs=='checkout'?'current':''}}">@lang('pa.checkout')</li>
    </ul>
</div>
  
  <br>
@endisset
