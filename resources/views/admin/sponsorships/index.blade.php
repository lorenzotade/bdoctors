<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/admin.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <style>
    main {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      flex-wrap: wrap;
    }

    nav {
      height: 80px;
    }

    .box {
      background-color: white;
      border-radius: 20px;
      padding: 15px 20px;
      border: 1px solid lightgray;
      box-shadow: 0 0 5px 3px lightgray;
    }

    .box-sponsor-custom {
      width: calc(30%);
      height: 600px;
      margin-bottom: 40px;
      border-radius: 20px;
      display: flex;
      flex-direction: column;
    }

    .box-sponsor-custom .box-sponsor-top {
      height: 40%;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 20px;
    }

    .box-sponsor-custom .box-sponsor-bottom {
      height: 60%;
      display: flex;
      flex-direction: column;
      justify-content: space-around;
      align-items: center;
    }

    .btn {
      border-radius: 100px;
      border: 3px solid radial-gradient(circle, rgba(255, 201, 147, 1) 0%, rgba(202, 124, 47, 1) 100%);
      color: white;
      width: 300px;
      padding: 15px 25px;
      margin-top: 10px;
      cursor: pointer;
      text-transform: uppercase;
      font-weight: bold;
      letter-spacing: 1px;
      transition: 0.1s;
    }

    .box-bronze .btn:hover {
      background: radial-gradient(circle, rgba(255, 201, 147, 1) 0%, rgba(202, 124, 47, 1) 100%);
    }

    .box-silver .btn:hover {
      background: radial-gradient(circle, rgba(247, 247, 247, 1) 0%, rgba(192, 192, 192, 1) 100%);
    }

    .box-gold .btn:hover {
      background: radial-gradient(circle, rgba(255, 234, 165, 1) 0%, rgba(212, 175, 55, 1) 100%);
    }

    /* box bronze */
    .box-bronze .box-sponsor-top {
      background: rgb(255, 201, 147);
      background: radial-gradient(circle, rgba(255, 201, 147, 1) 0%, rgba(202, 124, 47, 1) 100%);
    }

    .box-silver .box-sponsor-top {
      background: rgb(247, 247, 247);
      background: radial-gradient(circle, rgba(247, 247, 247, 1) 0%, rgba(192, 192, 192, 1) 100%);
    }

    .box-gold .box-sponsor-top {
      background: rgb(255, 234, 165);
      background: radial-gradient(circle, rgba(255, 234, 165, 1) 0%, rgba(212, 175, 55, 1) 100%);
    }

    .box-sponsor-custom p {
      font-size: 1.3rem;
      font-weight: 900;
    }

    .choose-sponsor {
      max-width: 600px;
    }
    .choose-sponsor h2 {
      position: relative;
      margin-bottom: 10px;
      padding-bottom: 10px;
    }

    .choose-sponsor h2::after {
      position: absolute;
      content: "";
      height: 3px;
      bottom: 0;
      left: 0;
      width: 100%;
      background: #2ea497;
      border-radius: 5px;
    }

    @media all and (max-width: 1140px) {
      main {
        justify-content: flex-start;
      }
    }
  </style>
</head>

<body>
  <div id="app">
      <nav class="navbar navbar-expand-md navbar-light custom-bg-nav shadow-sm">
        <div class="container">
          <a class="navbar-brand" style="color: white; transition:0.1s" href="{{ url('/') }}">
            Home
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- NAV RIGHT -->
            <ul class="navbar-nav ml-auto">
              <!-- AUTHENTICATION LINKS -->
              @guest
              <li class="nav-item">
                <a class="nav-link" style="color: white; transition:0.1s" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" style="color: white; transition:0.1s" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" style="color: white; transition:0.1s" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                </a>



                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard</a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li> {{-- /end dropdown --}}
              @endguest
            </ul> {{-- /end navbar --}}
          </div> {{-- /end navbar-collapse --}}
        </div> {{-- /end container --}}
      </nav> {{-- /end nav --}}

    {{-- MAIN --}}
    <main>

      <div class="w-100">
      <a class="btn btn-secondary mb-3 ml-5 mt-3" href="{{route('admin.dashboard')}}">Torna alla dashboard</a>
      </div>
      <div class="container-fluid title-sponsors choose-sponsor">
        <h2 class="text-center text-uppercase mt-4">Scegli la sponsorizzazione</h2>
      </div>

      <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-around">

          {{-- BRONZE --}}
          <div class="box-sponsor-custom box-bronze box">
            <div class="box-sponsor-top text-center">
              <h1 class="text-uppercase">{{ $sponsorships[0]->name }}</>
            </div>
            <div class="box-sponsor-bottom text-center">
              <div>
                <h3>Evidenzia il tuo profilo per</h3>
                <h1>{{ $sponsorships[0]->duration }} h</h1>
                <h3>a soli</h3>
                <h1>{{ $sponsorships[0]->price }} €</h1>
              </div>
              <a class="btn" href="{{ route('admin.sponsorships.show', $sponsorships[0]->id) }}">Acquista</a>
            </div>
          </div> {{-- /end bronze --}}

          {{-- SILVER --}}
          <div class="box-sponsor-custom box-silver box">
            <div class="box-sponsor-top text-center">
              <h1 class="text-uppercase">{{ $sponsorships[1]->name }}</>
            </div>
            <div class="box-sponsor-bottom text-center">
              <div>
                <h3>Evidenzia il tuo profilo per</h3>
                <h1>{{ $sponsorships[1]->duration }} h</h1>
                <h3>a soli</h3>
                <h1>{{ $sponsorships[1]->price }} €</h1>
              </div>
              <a class="btn" href="{{ route('admin.sponsorships.show', $sponsorships[1]->id) }}">Acquista</a>
            </div>
          </div> {{-- /end silver --}}

          {{-- GOLD --}}
          <div class="box-sponsor-custom box-gold box">
            <div class="box-sponsor-top text-center">
              <h1 class="text-uppercase">{{ $sponsorships[2]->name }}</>
            </div>
            <div class="box-sponsor-bottom text-center">
              <div>
                <h3>Evidenzia il tuo profilo per</h3>
                <h1>{{ $sponsorships[2]->duration }} h</h1>
                <h3>a soli</h3>
                <h1>{{ $sponsorships[2]->price }} €</h1>
              </div>
              <a class="btn" href="{{ route('admin.sponsorships.show', $sponsorships[2]->id) }}">Acquista</a>
            </div>
          </div> {{-- /end gold --}}
        </div> {{-- /end row --}}
      </div> {{-- /end container-fluid --}}

    </main> {{-- /end main --}}

  </div> {{-- /end app --}}

  
</body>

</html>