@extends('layouts.app')

@section('content')

<div class="mx-auto" style="width: 1000px; margin-bottom: 10px">   
    <a href="{{ route("accountTypes.create") }}">
        <button role="button" class="btn btn-primary" type="submit" >Add Account Type</button>
    </a> 
</div>


<div  class = "mx-auto" style="width: 1000px;">
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Account Type</th>
        <th scope="col">Interest</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach($accountTypes as $accountType)
        <tr>
            <td>{{ $accountType->id }}</td>
            <td>{{ $accountType->name }}</td>
            <td>{{ $accountType->interest }}</td>
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">   
                            <a href="{{ route("accountTypes.edit",['accountType' => $accountType->id]) }}">
                                <button role="button" class="btn btn-success" type="submit" >Edit</button>
                            </a> 
                        </div>
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">
                            <form action="{{ route("accountTypes.destroy",['accountType' => $accountType->id]) }}" method="POST">
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