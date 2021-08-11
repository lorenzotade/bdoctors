@extends('layouts.app')

<style>

    section.dash-section {
        display: flex;
    }

    aside {
        background: #2B7871;
        height: calc(100vh - 80px);
        width: 20%;
    }

    aside nav {
        display: flex;
        height: 100%;
        flex-direction: column;
        justify-content: space-between
    }

    aside ul {
        list-style: none;
        display: flex;
        flex-direction: column;
    }

    aside ul li {
        border-right: 1px solid #2ea497;
        border-bottom: 1px solid #2ea497;
    }

    aside ul li a {
        text-align: center;
        height: 50px;
        width: 100%;
        text-transform: uppercase;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.1s;
    }

    aside ul li:hover {
        background-color: #2ea497
    }

    aside ul li,
    aside ul li a,
    h6 {
        color: #FFF;
        font-size: 13px
    }

    aside form {
        height: 50px;
        width: 100%;
        text-transform: uppercase;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-bottom: 20px;
    }

    .custom-main {
        height: calc(100vh - 80px);
        width: 80%;
        overflow: scroll;
    }

    .custom-main .welcome {
        height: 150px;
        width: 100%;
        display: flex;
        align-items: center;
    }

    .custom-main .welcome .welcome-text h1,
    .custom-main .welcome .welcome-text h5 {
        color: #2B7871;
    }

    .custom-main .welcome .welcome-image img {
        height: 120px;
        width: 120px;
        border-radius: 50%;
        margin-left: 20px;
        margin-right: 20px;
        border: 3px solid #2B7871;
    }

    .custom-main .stat-container-top {
        display: flex;
    }

    .custom-main .stat-container-bottom {
        display: flex;
    }
    .custom-main .stat {
        text-align: center;
        width: 50%;
        height: 20rem;
        margin: 20px;
        border-radius: 20px;
        transition: 0.1s;
    }

    .custom-main .stat a {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: 0.1s;
    }

    .custom-main .stat:hover {
        box-shadow: 0 0 5px 5px lightgray;
    }

    .custom-main .stat h3 {
        color: #FFF;
        text-transform: uppercase;
        font-size: 20px;
        margin-top: 10px;
    }

    .custom-main .stat i {
        color: #FFF;
        font-size: 30px;
        margin-bottom: 10px;
    }

    .custom-main .stat:hover h3 {
        font-size: 21px;
    }

    .custom-main .stat:hover i {
        font-size: 33px;
    }

    .custom-main .s-red {
        background-color: #D11141;
    }

    .custom-main .s-green {
        background-color: #29B158;
    }

    .custom-main .s-blue {
        background-color: #26AEDB;
    }

    .custom-main .s-orange {
        background-color: #F37735;
    }

    .custom-main .s-yellow {
        background-color: #FCC425;
    }
</style>

@section('content')

<section class="dash-section">
    <aside>
        <nav>
            <ul>
                <li @if (!$user->profile) style="display:none;" @endif><a href="{{ route('admin.user.show', $user->slug)}}">Vedi profilo</a></li>
                <li @if (!$user->profile) style="display:none;" @endif><a href="{{route('admin.user.edit', $user->slug)}}">Modifica profilo</a></li>
                <li @if ($user->profile) style="display:none;" @endif><a href="{{route('admin.user.create')}}">Completa registrazione</a></li>
                <li @if (!$user->profile) style="display:none;" @endif><a href="{{route('admin.messages')}}">Messaggi</a></li>
                <li @if (!$user->profile) style="display:none;" @endif><a href="{{ route('admin.reviews') }}">Recensioni</a></li>
                <li @if (!$user->profile) style="display:none;" @endif><a href="{{ route('admin.sponsorships') }}">Sblocca funzioni premium</a></li>
                <li @if (!$user->profile) style="display:none;" @endif><a href="{{ route('admin.sponsorships.purchasings') }}">Storico Acquisti</a></li>
            </ul>
            {{-- FORM DELETE PROFILE BUTTON --}}
            <form class="mt-5" action="{{ route('admin.user.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="custom-button danger">CANCELLA ACCOUNT</button>
            </form>
        </nav> {{-- /end aside-nav --}}
    </aside> {{-- /end aside --}}

    <div class="custom-main">
        <div class="welcome">
            <div class="welcome-image">
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
            <div class="welcome-text">
                <h1>@if ($user->gender === 0) Dott. @else Dott.ssa @endif {{$user->last_name}}</h1>
                <h5>{{$user->email}}</h5>
            </div>
        </div> {{-- /end welcome --}}

        {{-- TILES --}}
        <div class="stat-container">
            
            {{-- ACTIVATE PROFILE --}}
            <div @if ($user->profile) style="display:none;" @endif class="warning-message mb-5">
                <i class="fas fa-exclamation-triangle"></i>
                <h2>Attenzione!</h2>
                <p>Per abilitare il tuo profilo alla fase di ricerca devi ancora inserire alcune informazioni essenziali!</p>
                <p>Puoi completare la registrazione del tuo profilo in qualsiasi momento.</p>
                <a class="btn" href="{{ route('admin.user.create')}}">
                    Clicca qui per completare la tua registrazione
                </a>
            </div> {{-- /end activate --}}

            <div class="stat-container-top">
                <div @if (!$user->profile) style="display:none;" @endif class="stat s-red">
                    <a href="{{ route('admin.user.show', $user->slug)}}">
                        <i class="fas fa-user-alt"></i>
                        <h3>Visualizza tuo profilo</h3>
                    </a>
                </div>
                <div @if (!$user->profile) style="display:none;" @endif class="stat s-green">
                    <a href="{{route('admin.user.edit', $user->slug)}}">
                        <i class="fas fa-user-edit"></i>
                        <h3>Modifica il tuo profilo</h3>
                    </a>
                </div>
            </div> {{-- /end tiles-top --}}
            <div class="stat-container-bottom">
                <div @if (!$user->profile) style="display:none;" @endif class="stat s-blue">
                    <a href="{{route('admin.messages')}}">
                        <i class="fas fa-inbox"></i>
                        <h3>Hai {{count($user->messages)}} messaggi</h3>
                    </a>
                </div>
                <div @if (!$user->profile) style="display:none;" @endif class="stat s-orange">
                    <a href="{{ route('admin.reviews') }}">
                        <i class="fas fa-star"></i>
                        <h3>hai {{count($user->reviews)}} recensioni</h3>
                    </a>
                </div>
            </div> {{-- /end tiles-bottom --}}
        </div> {{-- /end tiles --}}

        <!-- SPONSORSHIP -->
        <div class="sponsorship" @if (!$user->profile) style="display:none;" @endif>
            <a href="{{ route('admin.sponsorships') }}">
                <div class="sponsorship-left">
                    <i class="fas fa-lock"></i>
                    <i class="fas fa-lock-open"></i>
                </div>
                <div class="sponsorship-right">
                    <h3>Sblocca le funzioni premium</h3>
                    <p>e vieni evidenziato nella fase di ricerca</p>
                </div>
            </a>
        </div>

    </div> {{-- /end custom-main --}}

</section>

@endsection