@extends('layouts.app')

@section('content')
  
  <div class="review-main py-4">
    <div class="container">

      <a class="btn btn-secondary mb-5" href="{{route('admin.messages')}}">Torna ai messaggi</a>

      <h2>Messaggio</h2>

      <div class="container">

        <p><strong>Messagio ricevuto da:</strong> {{$message->name}}</p>
        <p><strong>Email:</strong> {{$message->email}}</p>
        <p><strong>Oggetto:</strong> {{$message->object}}</p>
        <p><strong>Contenuto:</strong> {{$message->content}}</p>

      </div>

    </div>
  </div>
  
@endsection