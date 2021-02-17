@extends('layouts.app')

@section('content')

<div class="container adverts">
   <h1><span>Все пользователи</span></h1>

<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
<div class="toast alert alert-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000"  style="position: absolute; top: 0; left: 45%;">
  <div class="toast-body">
   Данные изменены
  </div>
</div>
</div>


   <table class="table">
       <thead>
            <tr>
               <th>#</th>
               <th>Аватар</th>
               <th>Имя</th>
               <th>Почта</th>
               <th>Телефон</th>
               <th>Роль</th>
               <th>Бан</th>
           </tr>
       </thead>
   <tbody>
   @foreach($users as $user)
   <tr data-user="{{$user->id}}">
       <td>{{$loop->iteration}}</td>
       <td>
             <img src="avatars\avatars{{$user->avatar}}" alt="">
       </td>
       <td>{{$user->firstName}}</td>
       <td>{{$user->email}}</td>
       <td>{{$user->phone}}</td>
       <td>
       <select name="role" class="role">
        <option value="admin" @if($user->role=='admin') selected @endif>Admin</option>
        <option value="guest"@if($user->role=='guest') selected @endif>Guest</option>
       </select>
       </td>
       <td> <a class="btn btn-{{$user->ban? 'danger':'success'}} ban"
        href="/">{{$user->ban ? 'Отменить бан' : 'Отправить в бан'}}</a>

       </td>
   </tr>
   @endforeach
   </tbody>
   </table>
@endsection