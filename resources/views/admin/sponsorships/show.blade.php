@extends('layouts.app')

<style>

  .bronze {
    color: black;  
  }
  .bronze:hover {
    color: #ca7c2f;
    transition: color 1000ms linear;
  }

  .silver {
      color: #ca7c2f;  
  }
  .silver:hover {
      color: #bcbcbc;
      transition: color 1000ms linear;
  }

  .gold {
      color: #bcbcbc;  
  }
  .gold:hover {
      color: #d2ad35;
      transition: color 1000ms linear;
  }

</style>

@section('content')

  <div class="container mt-5">
    <h2 id="title-sponsor" class="text-center text-uppercase"><strong>{{ $sponsorship->name }}</strong></h2>
    <div class="d-flex justify-content-between">
      <div class="d-flex align-items-baseline">
        <i class="fas fa-money-bill-wave"></i>
        <p class="ml-2"><strong>{{ $sponsorship->price }} euro</strong></p>
      </div>
      <div class="d-flex align-items-baseline">
        <i class="fas fa-hourglass-half"></i>
        <p class="ml-2"><strong>{{ $sponsorship->duration }} ore</strong></p>
      </div>
    </div>

    {{-- CHECKOUT FORM --}}
    <form method="post" id="payment-form" action="http://127.0.0.1:8000/admin/checkout">
      @csrf
      <section>
        <label for="amount">
          <div class="input-wrapper amount-wrapper">
            <input type="number" id="amount" name="amount" min="1" placeholder="amount" value="{{ $sponsorship->price }}" readonly hidden>  
          </div>  
        </label> 
        
        {{-- doctor id --}}
        <input type="text" name="user_id" value="{{ $user->id }}" hidden>

        {{-- sponsorship id --}}
        <input type="text" name="sponsorship_id" value="{{ $sponsorship->id }}" hidden>

        {{-- sponsorship duration --}}
        <input type="number" name="duration" value="{{ $sponsorship->duration }}" hidden>

        <div class="bt-drop-in-wrapper">
          <div id="bt-dropin"></div>
        </div>
      
      </section>  
    
      <input type="hidden" name="payment_method_nonce" id="nonce">
      <div class="d-flex w-100 justify-content-between align-item-baseline">
        <button class="button btn btn-success" type="submit"><span>ACQUISTA</span></button>
        <a href="{{ route('admin.sponsorships') }}" id="back-btn" class="btn btn-secondary" style="transform: scale(1);">BACK</a>
      </div>
      
    </form> {{-- /end form --}}
            
    
    {{-- TRANSACTION ERRORS --}}
    <div class="errors-transactions mt-5">
      @if(session('success_message'))
        <div class="alert alert-success">
          {{ session('success_message') }}
        </div>
      @endif

      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div> 
      @endif
    </div> {{-- /end errors --}}

  </div> {{-- /end container --}}

<!-- includes the Braintree JS client SDK -->
<script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>
<script>
  var form = document.querySelector('#payment-form');
  var client_token = "{{ $token }}";
  
  braintree.dropin.create({
    authorization: client_token,
    selector: '#bt-dropin',
  }, function(createErr, instance){
    if(createErr){
      console.log('Create Error', createErr);
      return;
    }
    form.addEventListener('submit', function(event){
      event.preventDefault();

      instance.requestPaymentMethod(function(err, payload){
        if(err){
          console.log('Request Payment Method Error', err);
          return;
        }

        //Add the nonce to the form and submit
        document.querySelector('#nonce').value = payload.nonce;
        form.submit();
      });
    });
  });

  function changeColor(sponsorId){
    let title = document.getElementById('title-sponsor')
    if(sponsorId = 1){
      title.classList.add("bronze");
    } else if (sponsorId = 2){
      title.classList.add("silver");
    } else if(sponsorId = 3) {
      title.classList.add("gold");
    }
  }
</script>

@endsection