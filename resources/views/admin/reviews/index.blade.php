@extends('layouts.app')

@section('content')
  
  <div class="review-main py-4">
    <div class="container">

      <a class="btn btn-secondary mb-5" href="{{route('admin.dashboard')}}">Torna alla dashboard</a>

      <h2 class="mb-4">LE TUE RECENSIONI</h2>

      <table class="table">
        <thead>
          <tr class="text-center">
            <th scope="col">Nome</th>
            <th scope="col">Titolo</th>
            <th scope="col">Contenuto</th>
            <th scope="col">Voto</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reviews as $review)
            <tr class="text-center">
              <td>{{$review->name}}</td>
              <td>{{$review->title}}</td>
              <td>{{$review->content}}</td>
              <td>{{$review->vote}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
  
@endsection