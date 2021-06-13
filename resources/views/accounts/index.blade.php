@extends('layouts.app')


@section('content')

<div class="mx-auto" style="width: 1000px;">   
    <a href="{{ route("accounts.create") }}">
        <button role="button" class="btn btn-primary" type="submit" >Add Account</button>
    </a> 
</div>

<div  class = "mx-auto" style="width: auto;">
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Account Holder</th>
        <th scope="col">Account Number</th>
        <th scope="col">Account Balance</th>
        <th scope="col">Account Type</th>
        <th scope="col">Currency</th>
        <th scope="col">Branch</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach($accounts as $account)
        <tr>
            <td>{{ $account->id }}</td>
            <td>{{ $account->account_holder }}</td>
            <td>{{ $account->account_number }}</td>
            <td>{{ $account->account_balance }}</td>
            <td>{{ $account->account_type_name }}</td>
            <td>{{ $account->currency_name }}</td>
            <td>{{ $account->branch_name }}</td>
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">   
                            <a href="{{ route("accounts.edit",['account' => $account->id]) }}">
                                <button role="button" class="btn btn-success" type="submit" >Edit</button>
                            </a> 
                        </div>
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">
                            <form action="{{ route("accounts.destroy",['account' => $account->id]) }}" method="POST">
                                @csrf
                                @method("Delete")
                                <button role="button" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <td>
        </tr>
        @endforeach

@endsection