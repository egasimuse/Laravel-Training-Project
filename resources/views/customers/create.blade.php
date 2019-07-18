@extends('layouts.app')

@section('title', 'Add New Customer')
 
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add New Customers</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <form action="/customers" method="POST" class="pb-3" enctype="multipart/form-data">
                @include('customers.form')

                <button type="submit" class="btn btn-primary mt-2">Add Customer</button>
            </form>
        </div>
    </div>

@endsection