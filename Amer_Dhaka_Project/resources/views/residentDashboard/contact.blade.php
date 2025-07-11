@extends('residentDashboard.layouts.master')
@section('page_title','Contact Us')
@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Contact</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Contact us</li>
                        </ol>
                        <div class="row justify-content-center">
                           <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                  <h4>Contact us </h4>
                                </div>
                                <div class="card-body">
                                <form>
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your name">
                                </form>
                            </div>
                            </div>
                           
                           </div>
                        </div>
@endsection
                      