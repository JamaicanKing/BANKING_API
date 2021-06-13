@extends('layouts.app')

@section('content')

<div class="mx-auto" style="width: 1000px; margin-bottom: 10px">   
    <a href="{{ route("departments.create") }}">
        <button role="button" class="btn btn-primary" type="submit" >Add Secondary Account</button>
    </a> 
</div>


<div  class = "mx-auto" style="width: 1000px;">
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Customer</th>
        <th scope="col">Account</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach($secondaryAccountHolders as $secondaryAccountHolder)
        <tr>
            <td>{{ $secondaryAccountHolder->customer_id }}</td>
            <td>{{ $secondaryAccountHolder->account_id }}</td>
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">   
                            <a href="{{ route("secondaryAccountHolders.edit",['department' => $department->id]) }}">
                                <button role="button" class="btn btn-success" type="submit" >Edit</button>
                            </a> 
                        </div>
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">
                            <form action="{{ route("secondaryAccountHolders.destroy",['department' => $department->id]) }}" method="POST">
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