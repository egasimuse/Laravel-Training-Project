@extends('layouts.app')

@section('title', 'Customer List')
 
@section('content')
    
    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
        </div>
    </div>

    @can('create', App\Customer::class)
        <div class="row">
            <div class="col-12">
                <p><a href="/customers/create">Add New Customers</a></p>
            </div>
        </div>
    @endcan
   
    <hr>

    @foreach ($customers as $customer)
        <div class="row">
            <div class="col-2">
                {{ $customer->id }}
            </div>
            <div class="col-4">
                @can('view', $customer)
                    <a href="/customers/{{ $customer->id }}">
                        {{ $customer->name }}
                    </a>
                @endcan
                @cannot('view', $customer)
                    {{ $customer->name }}
                @endcannot
            </div>
            <div class="col-4">{{ $customer->company->name }}</div>
            <div class="col-2">{{ $customer->active }}</div>
        </div>     
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-4">
            {{ $customers->links() }}
        </div>
    </div>


   
@endsection