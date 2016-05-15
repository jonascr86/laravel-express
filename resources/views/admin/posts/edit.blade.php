@extends('app')

    @section('content')
        <h1>Edit post: {{$post->title}}</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($post, ['method' => 'put', 'route' => ['admin.posts.update', $post->id ]]) !!}

            @include('admin.posts._form')

            <div class="form-group">
                {!! Form::label('tags', 'Tags') !!}
                {!! Form::textarea('tags', $post->tagList, ['class' => "form-control"]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    @endsection