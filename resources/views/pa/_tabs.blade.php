@isset($policy)
<ul class="nav nav-tabs nav-justified">
    <li class="nav-item">
      <a class="nav-link active" href="{{route('pa.edit',['product_id'=>$product->id,'id'=>$policy->id]) }}">Quotation</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('customers.show',['policy_id'=>$policy->id, 'id'=>0]) }}">Policy Holder</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('members.index',$policy->id) }}">Insured Person</a>
    </li>
    
  </ul> 
  {{-- ['policy_id'=>$policy->id, 'id'=>$policy->customer_id] --}}
@endisset
