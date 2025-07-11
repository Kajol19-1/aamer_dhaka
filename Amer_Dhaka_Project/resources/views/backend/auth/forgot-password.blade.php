@extends('backend.auth.layouts.master')
@section('page_title', 'Reset Password')
@section('content')

{!! Form::open(['method'=>'post', 'route'=>'password.email']) !!}
{!! Form::label('email', 'Email') !!}
{!! Form::email('email', null, ['class'=>$errors->has('email')? 'is-invalid form-control form-control-sm': 'form-control from control-sm', 'placeholder'=>'Enter your name']) !!}
@error('email')
<p class="text-danger">{{$message}}</p>
@enderror

<div class="d-grid">
{!! Form::button('Reset Password', ['type'=>'submit', 'class'=>'btn btn-info btn-sm mt-2'])!!}
</div>

{!! Form::close()!!}
<p class="mt-4"> Already registerd? <a href="{{route('login')}}">Login Here </a></p>
<p>Not registered? <a href="{{route('register')}}">Register Here </a></p>
@endsection   