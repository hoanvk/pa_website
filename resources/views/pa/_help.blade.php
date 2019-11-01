@isset($product)
        <div class="card">
                <div class="card-header bg-primary">BENEFITS</div>
        
                <div class="card-body">
                        <div class="list-group list-group-flush">
                                @foreach ($product->benefits as $benefit)
                                        <li class="list-group-item">{{ $benefit->title}} </li>
                                @endforeach 
                        </div>
                                        
                </div> 
        
        </div>
@endisset

               