@extends('layouts.app')
@section('content')
<div class="container adverts">
    <h1><span>Добро пожаловать!</span></h1>
    @if(session('message_ban')=='1')
        <div class="alert alert-danger" role="alert">
          Вы забанены!
        </div>
    @endif

</div>
@endsection
