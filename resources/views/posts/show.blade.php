@extends('layouts.app')

@section('title')Show Page @endsection


@section('content')



<div class="container">

  <div class="card">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <h5 class="card-title">Title:</h5>
      <p class="card-text">{{ $post->title }}</p>
      <h5 class="card-title">Description:</h5>
      <p class="card-text">{{ $post->description }}</p>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      Post Creator Info
    </div>

    <div class="card-body">
      <h5 class="card-title">Name</h5>
      <p class="card-text" name="user_id" >{{ $user->name }}</p>
      <h5 class="card-title">Email</h5>
      <p class="card-text" name="user_id">{{ $user->email }}</p>
      <h5 class="card-title">Created At</h5>
      
      <p  class="card-text">{{ $post->created_at}}</p>
    </div>
  </div>


</div>


@endsection