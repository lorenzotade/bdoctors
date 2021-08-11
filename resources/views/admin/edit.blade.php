@extends('layouts.app')

@section('content')

<section class="container">
  <a class="btn btn-secondary mb-5" href="{{route('admin.dashboard')}}">Torna alla dashboard</a>

  <div class="top-name">
    <h1>@if ($user->gender === 0) Dott. @else Dott.ssa @endif {{ $user->last_name }}</h1>
  </div>
  <h2>Modifica profilo</h2>

  <form action="{{ route('admin.user.update', $profile->user_id) }}" method="POST" enctype="multipart/form-data">

    @method('patch')
    @csrf

    {{-- EDUCATION --}}
    <div class="education mb-3">
      <label for="education" class="label-control">Educazione: </label>
      <textarea name="education" id="education" class="form-control @error('education') is-invalid @enderror" rows="6">{{ old('education', $profile->education) }}</textarea>
      @error('education')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    {{-- EXPERIENCE --}}
    <div class="experience mb-3">
      <label for="experience" class="label-control">Esperienza: </label>
      <textarea name="experience" id="experience" class="form-control @error('experience') is-invalid @enderror" rows="6">{{ old('education', $profile->experience) }}</textarea>
      @error('experience')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    {{-- SPECS --}}
    <div class="specs mb-3">
      <label for="" class="label-control d-block">Specializzazioni*:&nbsp;&nbsp;&nbsp;&nbsp;</label>
      @foreach($specs as $spec)
      <span class="mr-3" style="display: flex; flex-wrap:wrap;">
        <input type="checkbox" style="margin-top: 5px;" id="spec{{ $loop->iteration }}" name="specs[]" value="{{ $spec->id }}" @if($errors->any() && in_array($spec->id, old('specs', []))) checked @endif
        @if(!$errors->any() && $user->specs->contains($spec->id)) checked @endif
        >
        <label for="spec{{ $loop->iteration }}">&nbsp;{{ $spec->name }}</label>
        &nbsp;&nbsp;&nbsp;
      </span>
      @endforeach
      @error('specs')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>


    {{-- TELEPHONE --}}
    <div class="telephone mb-3">
      <label for="telephone" class="label-control">Telefono: </label>
      <input type="text" name="telephone" id="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone', $profile->telephone) }}">
      @error('telephone')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    {{-- CELLPHONE --}}
    <div class="cellphone mb-3">
      <label for="cellphone" class="label-control">Cellulare: </label>
      <input type="text" name="cellphone" id="cellphone" class="form-control @error('cellphone') is-invalid @enderror" value="{{ old('cellphone', $profile->cellphone) }}">
      @error('cellphone')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    
    {{-- SERVICES --}}
    <div class="services mb-3" id="services-container">
      <label for="services" class="label-control">Prestazioni: </label>
      <button type="button" class="custom-button gray-bg" onclick="addInputField()">Aggiungi</button>
      @foreach ($services as $service)
      <div class="services-input mb-2">

        <div>
          <label for="name">Nome Prestazione: </label>
          <button type="button" class="custom-button gray-bg float-right" onclick="removeInputField(this)">Rimuovi</button>
          <input type="text" name="name[]" id="name" value="{{$service->name}}" class="form-control">
          <label for="price">Prezzo: </label>
          <input type="number" name="price[]" id="price" value="{{$service->price}}" class="form-control">
        </div>

      </div>
      @endforeach
    </div>

    {{-- PICTURE --}}
    <div class="form-group">
      <label for="picture">Foto: </label>
      @if($profile->picture)
      <div class="mb-3">
        <img width="150" class="img-fluid" src="{{ asset('storage/' . $profile->picture) }}" alt="{{ $user->last_name }}">
      </div>
      @endif
      <input id="picture" type="file" name="picture" class="form-control-file @error('picture') is-invalid @enderror">
      @error('picture')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <p style="float:right">(* campo obbligatorio)</p>

    {{-- SUBMIT BUTTON --}}
    <div class="mb-5">
      <button type="submit" class="btn">Salva</button>
    </div>
  </form> {{-- /end form edit --}}

</section>
<script>
  function addInputField() {

    const div = document.createElement('div');
    div.innerHTML =
      `<div class="services-input mb-2">
              <label for="name">Nome Prestazione: </label>
              <button type="button" class="custom-button gray-bg float-right" onclick="removeInputField(this)">Rimuovi</button> 
              <input type="text" name="name[]" id="name" value="" class="form-control">
              <label for="price">Prezzo: </label>
              <input type="number" name="price[]" id="price" value="" class="form-control">    
            </div>`;
    document.getElementById('services-container').appendChild(div);
  }

  function removeInputField(e) {
    console.log(e);
    e.parentElement.parentElement.remove();
  }
</script>

@endsection