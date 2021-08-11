@extends('layouts.app')

@section('content')

<div class="box my-5 mx-5 text-center">

  <h1 class="my-2">Grazie dell'acquisto!</h1>

  <h2>Il tuo account sarà sponsorizzato per {{ $duration }} ore.</h2>

  <div class="my-4 text-center sold">
    <p><strong>Info</strong></p>
    <p>Prezzo: {{ $amount }} €</p>
    <p>ID transazione: {{ $transaction->id }}</p>
  </div>

  <a class="btn mb-2" href="{{ route('admin.dashboard') }}">Torna alla dashboard</a>

</div> {{-- /end content --}}

<style>

  h1 {
    position: relative;
    margin-bottom: 10px;
    padding-bottom: 10px;
  }

  h1::after {
    position: absolute;
    content: "";
    height: 3px;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #2ea497;
    border-radius: 5px;
  }

  .sold {
    width: 30%;
    margin: auto;
    border-radius: 20px;
    border: 5px solid #2ea497;
    padding: 15px 25px;
  }
  
</style>

@endsection