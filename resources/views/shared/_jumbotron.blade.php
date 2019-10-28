<div class="jumbotron">
    <div class="container">
            
            @if (isset($jumbotron))
            <h1 class="text-danger">{{ $jumbotron->title}}</h1>
            <p class="text-primary">{{ $jumbotron->description}}</p>
             
            @else
            <h1 class="text-danger">Travel Insurance</h1>
            <p class="text-primary">Flight delays, loss of baggage, loss of personal money, accidents and sickness are common predicaments that travellers' experience. That’s why we provide you with convenient travel protection plans to let you enjoy your business trip or holiday more.</p>
            @endif
            
            
    </div>
        
      </div>