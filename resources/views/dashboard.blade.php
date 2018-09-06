@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="/posts/create">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts) > 0)

                    <table class="table">
                            <thead class="thead-dark">
                                    
                                <tr>
                                    <th scope="col">Title</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <th scope="row">{{$post->title}}</td>
                                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a><td>
                                            <td>
                                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                                            {{Form::hidden('_method', 'Delete')}}
                                            {{Form::submit('Delete', ['class'=>"btn btn-danger"])}}
                                            {!!Form::close()!!}
                                            </td>
                                    </tr>
                            </tbody>                                    
                            @endforeach
                        </table>
                    @else
                        <p>You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
