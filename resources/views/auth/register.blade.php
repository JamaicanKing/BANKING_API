@extends('layouts.app')

@json($departments)
@section('content')
@include('components.form.addUser',
        [
            'formAction' => 'register',
            'title' => 'Register User',
            'submitButtonName' => 'Register User',
            'options' => $departments
        ])
@endsection
