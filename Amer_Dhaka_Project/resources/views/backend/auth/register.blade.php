@extends('backend.auth.layouts.master')
@section('page_title', 'Register')
@section('content')

{!! Form::open(['method'=>'post', 'route'=>'register']) !!}
{!! Form::label('name', 'Name') !!}
{!! Form::text('name', null, ['class'=>$errors->has('name')? 'is-invalid form-control form-control-sm':'form-control form-control-sm','placeholder'=>'Enter your name']) !!}
@error('name')
<p class="text-danger">{{$message}}</p>
@enderror
{!! Form::label('email', 'Email',['class'=>'mt-2']) !!}
{!! Form::email('email', null, ['class'=>$errors->has('email')? 'is-invalid form-control form-control-sm':'form-control form-control-sm','placeholder'=>'Enter your email']) !!}
@error('email')
<p class="text-danger">{{$message}}</p>
@enderror
{!! Form::label('role','Role',['class'=>'mt-2'])!!}
{!! Form::select('role', ['Admin'=>'Admin', 'User'=>'User'],null, ['class'=>'form-select', 'placeholder'=>'Select your role'])!!}
@error('role')
<p class="text-danger">{{$message}}</p>
@enderror
{!! Form::label('password', 'Password',['class'=>'mt-2']) !!}
{!! Form::password('password',  ['class'=>$errors->has('password')? 'is-invalid form-control form-control-sm':'form-control form-control-sm','placeholder'=>'Enter your password']) !!}
@error('password')
<p class="text-danger">{{$message}}</p>
@enderror

{!! Form::label('password_confirmation', 'Password Confirmation',['class'=>'mt-2']) !!}
{!! Form::password('password_confirmation',  ['class'=>$errors->has('password_confirmation')? 'is-invalid form-control form-control-sm':'form-control form-control-sm', 'placeholder'=>'Enter confirm password ']) !!}
@error('password_confirmation')
<p class="text-danger">{{$message}}</p>
@enderror


<div class="d-grid">
{!! Form::button('Register', ['type'=>'submit', 'class'=>'btn btn-info btn-sm mt-2'])!!}
</div>

{!! Form::close()!!}
<p class="mt-4"> Forgot Password? <a href="{{route('password.request')}}">Reset here </a></p>
<p class="mt-4"> Already registered? <a href="{{route('login')}}">Already registered? </a></p>
@endsection