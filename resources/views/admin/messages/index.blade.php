@extends('layouts.app')

@section('content')
  
  <div class="review-main py-4">
    <div class="container">

      <a class="btn btn-secondary mb-5" href="{{route('admin.dashboard')}}">Torna alla dashboard</a>

      <h2 class="mb-4">I TUOI MESSAGGI</h2>

      <table class="table table-messages">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Oggetto</th>
            <th scope="col">Contenuto</th>
            <th colspan="2" class="pl-4">Visualizza&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancella</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($messages as $message)
            <tr>
              <td>{{$message->name}}</td>
              <td>{{$message->email}}</td>
              <td>{{$message->object}}</td>
              @if(strlen($message->content) <= 50)
                <td>{{$message->content}}</td>
              @else
                <td>{{substr($message->content, 0, 47).'...'}}</td>
              @endif
              <td><a href="{{route('admin.messages.show',$message->id)}}" class="custom-button"><i class="fas fa-eye"></i></a></td>
              <td>
                <form action="{{ route('admin.messages.destroy',$message->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="custom-button btn-danger">DELETE</button>
                </form>
            </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
  
@endsection