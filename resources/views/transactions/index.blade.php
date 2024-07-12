@php use App\Services\Formatter; @endphp
@extends('adminlte::page')

@section('title', 'Transactions')

@section('content_header')
    <h1>Transactions</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">

            @session('success')
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{ $value }}
            </div>
            @endsession

            <div class="card">
                <div class="card-header">
                    <a href="{{ route('transactions.create', 'expense') }}">
                        <button type="button" class="btn btn-success">
                            Add new expense
                        </button>
                    </a>
                    <a href="{{ route('transactions.create', 'income') }}">
                        <button type="button" class="btn btn-success">
                            Add new income
                        </button>
                    </a>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Account</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Account</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Type</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@stop
