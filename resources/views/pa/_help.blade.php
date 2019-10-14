<div class="card">
        <div class="card-header bg-primary">AGENT BALANCE</div>
        <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">
                            Agent: {{ $agent->title}}</div>
                    <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">Limit: {{ $agent->cash->limit_bal}}</div>
                    <div class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center">Outstanding: {{ $agent->cash->os_bal}}</div>    
                </div>
        </div> 
        
        
</div>
<br>
{{-- <div class="card">
        
    
        
        <div class="card-header bg-primary">MSIG ASSIST</div>
        <div class="card-body">Need assistance? Talk to us!</div> 
        
        </div>
        <br> --}}
        <div class="card">
                <div class="card-header bg-primary">DOCUMENTS</div>
                
                <div class="card-body"><div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center" href="https://tructuyen.msig.com.vn/assets/documents/Policy Wording_TravelEasy_VTVL0619.pdf" target="_blank">
                            Policy Wording (comprehensive)                        <i class="far fa-file-alt"></i>
                        </a>
                        <a class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center" href="https://tructuyen.msig.com.vn/assets/documents/Policy Wording_TravelEasy_LTVL0519_VTVL0519.pdf" target="_blank">
                            Policy Wording (single benefit)                        <i class="far fa-file-alt"></i>
                        </a>
                        <a class="list-group-item list-group-item-action py-2 d-flex justify-content-between align-items-center" href="https://tructuyen.msig.com.vn/assets/documents/MSIGV Claims Guidelines - Travel Insurance (E)-2019.pdf" target="_blank">
                            Claim Guidelines                        <i class="fas fa-link"></i>
                        </a>
                                                            </div></div> 
                
                </div>
                {{-- <br>
                <div class="card">
                        <div class="card-header bg-primary">FREQUENTLY ASKED QUESTIONS</div>
                        <div class="card-body">Need assistance? Talk to us!</div> 
                        
                        </div>    --}}