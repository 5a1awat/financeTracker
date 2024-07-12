@php use App\Services\Formatter; @endphp
@extends('adminlte::page')

@section('title', 'Accounts')

@section('content_header')
    <h1>Accounts</h1>
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
                    <a href="{{ route('accounts.create') }}">
                        <button type="button" class="btn btn-success">
                            Add new account
                        </button>
                    </a>
                </div>

                <div class="card-header">
                    <h5>Balance total amount: {{ Formatter::getBalance($totalBalance, $defaultCurrency)  }} </h5>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Balance</th>
                            <th>Balance in {{ $defaultCurrency }}</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($accountsWithBalance as $data)
                            <tr>
                                <td>{{ $data['account']->name }}</td>
                                <td>{{ $data['account']->type }}</td>
                                <td><b>{{ Formatter::getBalance($data['account']->balance(), $data['account']->currency->code) }}</b>
                                </td>
                                <td><b>{{ Formatter::getBalance($data['balanceWithDefaultCurrency'], $defaultCurrency) }}</b></td>
                                <td><a href="{{ route('accounts.edit', $data['account']->id) }}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@stop
