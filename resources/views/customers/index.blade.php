@extends('layouts.app')

@section('content')

<div class="mx-auto" style="width: 1000px;">   
    <a href="{{ route("customers.create") }}">
        <button role="button" class="btn btn-primary" type="submit" >Add Customer</button>
    </a> 
</div>

<div  class = "mx-auto" style="width: auto;">
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Firstname</th>
        <th scope="col">Lastname</th>
        <th scope="col">Address</th>
        <th scope="col">Email Address</th>
        <th scope="col">TRN Number</th>
        <th scope="col">ID Type</th>
        <th scope="col">ID Number</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->firstname }}</td>
            <td>{{ $customer->lastname }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->trn_number }}</td>
            <td>{{ $customer->id_type }}</td>
            <td>{{ $customer->id_number }}</td>
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">   
                            <a href="{{ route("customers.edit",['customer' => $customer->id]) }}">
                                <button role="button" class="btn btn-success" type="submit" >Edit</button>
                            </a> 
                        </div>
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">
                            <form action="{{ route("customers.destroy",['customer' => $customer->id]) }}" method="POST">
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