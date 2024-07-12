@extends('adminlte::page')

@section('title', 'Edit Account')

@section('content_header')
    <h1>Edit Account</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('accounts.update', $account->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           name="name"
                           placeholder="Enter name"
                           value="{{$account->name}}"
                            required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="balance_start">Balance start</label>
                    <input type="number"
                           step="0.01"
                           placeholder="0.00"
                           class="form-control"
                           id="balance_start"
                           name="balance_start"
                           value="{{$account->balance_start}}" >
                    @error('balance_start')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Comment</label>
                    <textarea class="form-control"
                              id="comment"
                              name="description"
                              rows="3"
                              placeholder="Enter comment">{{$account->comment}}</textarea>
                    @error('comment')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@stop
