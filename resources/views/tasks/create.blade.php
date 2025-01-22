@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Task</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="description">Date of Completion</label>
            <textarea name="date" id="date" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Task</button>
    </form>
</div>
@endsection
