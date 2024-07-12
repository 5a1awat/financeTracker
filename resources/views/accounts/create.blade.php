@extends('adminlte::page')

@section('title', 'Create Account')

@section('content_header')
    <h1>Create Account</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('accounts.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           name="name"
                           placeholder="Enter name"
                            required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" id="type" name="type">
                        @foreach($types as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Currency</label>
                    <select class="form-control" id="currency_id" name="currency_id">
                        @foreach($currencies as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="balance_start">Balance start</label>
                    <input type="number"
                           step="0.01"
                           value="0.00"
                           placeholder="0.00"
                           class="form-control"
                           id="balance_start"
                           name="balance_start">
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
                              placeholder="Enter comment"></textarea>
                    @error('comment')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@stop
