@extends('layouts.app')

@section('content')

<div class="container adverts">
   <h1><span>Добро пожаловать, {{Auth::user()->firstName}}!</span></h1>
         <div class="text-center">
            @if( session('success') )
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
              <form method="POST" action="/profile" enctype="multipart/form-data" >
                    @csrf

                    <div class="form-group row">
                        <label for="firstName" class="col-md-4 col-form-label text-md-right">Имя</label>

                        <div class="col">
                            <input id="firstName" type="text" value="{{$user->firstName}}" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required>
                            @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>

                        <div class="col">
                            <input id="phone" type="text" value="{{$user->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Почта</label>
                        <div class="col">
                            <input id="email" type="email"  value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="avatar" class="col-md-4 col-form-label text-md-right">Аватар</label>
                        <div class="col">
                            <input id="avatar" type="file"  value="{{$user->avatar}}" class="form-control @error('avatar') is-invalid @enderror" name="avatar" required>
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                              Применить
                            </button>
                        </div>
                    </div>
              </form>
         </div>
</div>
@endsection