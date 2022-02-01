@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <main>
        <form action="{{route('todo.store')}}" method="post">
            @csrf
            <div class="form-group">
                <input name="title" required spellcheck="false" type="text" class="title" id="title">
                <label for="title">Title</label>
            </div>
            <div class="form-group">
                <textarea name="description" required id="description" spellcheck="false" placeholder="Description" class="description-add"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="add" id="add" ><span>+</span>Add</button>
            </div>
        </form>
    </main>
    <div class="tasks">
        <div class="top">
            <p>Tasks</p>
        </div>
        <div class="after-top">
            @if (!count($todos))
                <div class="middleText">
                    <p class="mt">You have nothing to do.<br>Go get some sleep.</p>
                </div>
            @else
                <div class="tasks-card">
                @foreach($todos as $todo)

                        <div class="card">
                            <div class="card-header">
                                <h3>{{$todo->title}}</h3>
                            </div>
                            <div class="card-body">
                                <p>{{$todo->description}}</p>
                            </div>
                            <div class="card-footer">
                                <button>{{$todo->status}}</button>
                                <a href="{{route('todo.edit', $todo->id)}}">
                                    <img class="svg" src="{{asset('template/images/beditor.svg')}}">
                                </a>
                            </div>
                        </div>
                @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
