@extends('layouts.app')

@section('content')

<main class="container d-flex w-100 py-4">

  <div class="container-left w-75">

    <a class="btn btn-secondary mb-3" href="{{route('admin.dashboard')}}">Torna alla dashboard</a>

    <div class="container-header d-flex mb-4">

      <div class="image">
        <div class="custom-image">
          @if($user->profile && $user->profile->picture)
          <img class="img-fluid" src="{{ asset('storage/' . $user->profile->picture) }}" alt="{{ $user->last_name }}">
          @else
          @if ($user->gender == 0)
          <img class="img-fluid" src="{{ asset('img/default_male.jpeg') }}" alt="{{ $user->last_name }}">
          @else
          <img class="img-fluid" src="{{ asset('img/default_female.jpeg') }}" alt="{{ $user->last_name }}">
          @endif
          @endif
        </div>
      </div> {{-- /end image --}}

      <div class="info ml-5">
        <h1 class="mb-3">@if ($user->gender === 0) Dott. @else Dott.ssa @endif {{ $user->first_name }} {{ $user->last_name }} </h1>
        <div class="specs">
          @foreach ($user->specs as $spec)
          <span class="badge">{{$spec->name}}</span>
          @endforeach
        </div>
      </div> {{-- /end info --}}

    </div> {{-- /end container-header --}}

    <div @if (!$profile->education && !$profile->experience && !$profile->experience) style="display:none" @endif
      class="curriculum mr-5 p-4 box">
      <div class="cv">
        @if ($profile->education)
        <div class="cv-item mb-3">
          <h2>Educazione</h2>
          <p class="pb-3" style="white-space: pre-wrap;">{{ $profile->education }}</p>
        </div>
        @endif

        @if ($profile->experience)
        <div class="cv-item mb-3">
          <h2>Esperienza</h2>
          <p class="pb-3" style="white-space: pre-wrap;">{{ $profile->experience }}</p>
        </div>
        @endif

        @if ($user->services)
        <div class="cv-item mb-3">
          <h2>Prestazioni</h2>
          <ul>
            @foreach ($user->services as $service)
            @if ($service->name && $service->price)
            <li>{{ $service->name }} - {{ $service->price }} &euro;</li>
            @endif
            @endforeach
          </ul>
        </div>
        @endif
      </div>
    </div> {{-- /end curriculum + content --}}

  </div> {{-- /end container-left --}}

  <div class="container-right w-25">

    <div class="ml-auto affix-top box" data-spy="affix">
      <div class="custom-contacts">
        <h3>Contatti</h3>

        <ul>
          <li>
            <i class="fas fa-city"></i>
            {{ $user->city }} (CAP {{ $user->postal_code }})
          </li>
          <li>
            <i class="fas fa-map-marker-alt"></i>
            {{ $user->street }}
          </li>

          @if ($profile->telephone)
          <li>
            <i class="fas fa-phone-alt"></i>
            {{$profile->telephone}}
          </li>
          @endif

          @if ($profile->cellphone)
          <li v-if="doctor.profile.cellphone">
            <i class="fas fa-mobile-alt"></i>
            {{$profile->cellphone}}
          </li>
          @endif
        </ul>
      </div>
    </div> {{-- /end contacts --}}

  </div> {{-- /end container-right --}}

</main> {{-- /end main container --}}

<style scoped>
  .custom-image img {
    border-radius: 50%;
    margin-left: 20px;
    margin-right: 20px;
    width: 250px;
    height: 250px;
    border: 5px solid #2ea497;
  }

  h3 {
    position: relative;
    margin-bottom: 10px;
    padding-bottom: 10px;
  }

  h3::after {
    position: absolute;
    content: "";
    height: 3px;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #2ea497;
    border-radius: 5px;
  }
</style>
@endsection