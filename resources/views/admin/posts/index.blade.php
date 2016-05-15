@extends('app')
@section('content')
    <h1>Admin</h1>

    <a href="{{route("admin.posts.create")}}" class="btn btn-success">Create new Post</a>
    <br>
    <br>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Ação</th>
        </tr>

        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>
                <a href="{{route('admin.posts.edit', ['id' => $post->id])}}" class="btn btn-default">Edit</a>
                <a href="{{route('admin.posts.delete', ['id' => $post->id])}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $posts->render() !!}

@endsection