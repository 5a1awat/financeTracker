@extends('adminlte::page')

@section('title', 'Create Transaction')

@section('content_header')
    <h1>Create Transaction</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('transactions.store') }}" method="POST">
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


                <label>Date and time:</label>
                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime">
                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>


{{--                <div class="form-group">--}}
{{--                    <label for="datetime">Datetime</label>--}}
{{--                    <input type="text"--}}
{{--                           class="form-control @error('datetime') is-invalid @enderror"--}}
{{--                           id="datetime"--}}
{{--                           name="datetime"--}}
{{--                           placeholder="Enter datetime"--}}
{{--                           required>--}}
{{--                    @error('datetime')--}}
{{--                    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}

                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" id="type" name="type">
                        @foreach($types as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" id="currency_id" name="currency_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Country</label>
                    <select class="form-control" id="country_id" name="country_id">
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number"
                           step="0.01"
                           value="0.00"
                           placeholder="0.00"
                           class="form-control"
                           id="amount"
                           name="amount">
                    @error('amount')
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
