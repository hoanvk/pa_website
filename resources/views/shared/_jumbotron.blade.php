<div class="jumbotron">
    <div class="container">
            @if ($jumbotron!==null)
            <h1 class="text-danger">{{ $jumbotron->short_desc}}</h1>
            <p class="text-primary">{{ $jumbotron->long_desc}}</p>
             
            @else
            <h1 class="text-danger">Travel Insurance</h1>
            <p class="text-primary">Flight delays, loss of baggage, loss of personal money, accidents and sickness are common predicaments that travellers' experience. That’s why we provide you with convenient travel protection plans to let you enjoy your business trip or holiday more.</p>
            @endif
    </div>
        
      </div>