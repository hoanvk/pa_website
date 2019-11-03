@isset($policy)
<ul class="nav nav-tabs nav-justified">
    <li class="nav-item">
      <a class="nav-link {{$tabs=='quotation'?'active':''}} " href="{{route('pa.show',['product_id'=>$product->id,'id'=>$policy->id]) }}">Quotation</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{$tabs=='customers'?'active':''}}" href="{{route('customers.show',['policy_id'=>$policy->id, 'id'=>$policy->customer_id]) }}">Policy Holder</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{$tabs=='members'?'active':''}}" href="{{route('members.index',$policy->id) }}">Insured Person</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{$tabs=='confirm'?'active':''}} " href="{{route('pa.confirm',$policy->id) }}">Confirm</a>
    </li>
  </ul> 
  <br>
  {{-- ['policy_id'=>$policy->id, 'id'=>$policy->customer_id] --}}
@endisset
