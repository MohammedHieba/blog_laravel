@extends('layouts.app')

@section('title')Index Page @endsection

@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success" style="margin-bottom: 20px;"  >Create Post</a>

<table class="table"> 
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>

    @foreach($posts as $post)
    
      <tr>
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        <td>{{ $post->slug }}</td>
        <td>{{ $post->user ? $post->user->name : 'user not found' }}</td>
        <td>{{ $post->created_at  }}</td>
        <td>
        
          <a href="{{ route('posts.show',['post' => $post->slug]) }}" class="btn btn-info" style="margin-bottom: 20px;">View</a>
          <a href="{{ route('posts.edit',['post' => $post->slug]) }}" class="btn btn-secondary" style="margin-bottom: 20px;">Edit</a>
          <form style="display: inline;" action="{{ route('posts.destroy',['post' => $post->id]) }}" method="post">
                   @method('delete')
                   @csrf
                    <button onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" style="margin-bottom: 20px;" type="submit">Delete</button>
                    
          </form>
          
        </td>
      </tr>
    @endforeach
    </tbody>
</table>

{{$posts->links("pagination::bootstrap-4")}}
@endsection



