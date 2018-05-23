@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 data-notice="For test">Welcome, {{auth()->user()->name}}</h1>
                    <h2 data-notice="For test">You are logged in!</h2>
                </div>
            </div>

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">All transactions</div>
                <div class="panel-body">
                    Here is a table of all transanctions of all customers
                </div>

                <!-- Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Cnp</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($transactions as $trans)
                        <tr>
                            <td>{{$trans->id}}</td>
                            <td>{{$customers->find($trans->customerId)->name}}</td>
                            <td>{{$customers->find($trans->customerId)->cnp}}</td>
                            <td>{{$trans->amount}}</td>
                            <td>{{$trans->date}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" align="center">{{$transactions->links()}}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
