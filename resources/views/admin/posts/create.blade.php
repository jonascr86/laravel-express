@extends('app')

    @section('content')
        <h1>Create new post</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['method' => 'post', 'route' => 'admin.posts.store']) !!}

            @include('admin.posts._form')

            <div class="form-group">
                {!! Form::label('tags', 'Tags') !!}
                {!! Form::textarea('tags', null, ['class' => "form-control"]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create post', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    @endsection