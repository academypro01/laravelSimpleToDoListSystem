@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('content')
    <main>
        <h2>Edit Task</h2>
        <form action="{{route('todo.update', $todo->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <input type="text" name="title" value="{{$todo->title}}" id="title" class="title" spellcheck="false" required>
                <label for="title">Title</label>
            </div>
            <div class="form-group">
                <textarea name="description" required spellcheck="false" id="description" class="description" placeholder="Description">{{$todo->description}}</textarea>
            </div>
            <div class="form-group">
                <select name="status" id="status" class="status">
                    @foreach($todo->status as $status)
                        <option value="{{$status}}">{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group buttons">
                <button class="edit" id="edit"><img class="svg" id="svg" src="{{asset('template/images/editor.svg')}}" alt="svg editor"> Edit</button>
                <a href="{{route('todo.index')}}"><button type="button" id="cancle" class="cancle">Cancle</button></a>
            </div>
        </form>
    </main>
@endsection
