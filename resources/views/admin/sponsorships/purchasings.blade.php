@extends('layouts.app')

@section('content')
<div class="container mt-3">
  <a class="btn btn-secondary mb-3" href="{{route('admin.dashboard')}}">Torna alla dashboard</a>
  <h2 class="text-center">Storico acquisti {{ $user->first_name }} {{ $user->last_name }}</h2>

  {{-- PURCHASING TABLE --}}
  <table class="table mt-4">
    <thead>
      <tr class="text-center">
        <th scope="col">Tipo</th>
        <th scope="col">Scadenza</th>
        <th scope="col">Stato</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sponsorships as $sponsorship)
      <tr class="text-center">
        <th scope="row" class="text-uppercase">{{$sponsorship->name}}</th>
        <td>{{$sponsorship->pivot->due_date}}</td>
        @if ($sponsorship->pivot->due_date >= $date_now)
        <td><span class="badge badge-success p-3">ATTIVO</span></td>
        @else
        <td><span class="badge danger w-25 p-3">SCADUTO</span></td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table> {{-- /end table --}}
  
</div> {{-- /end container --}}

@endsection