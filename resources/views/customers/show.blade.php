@extends('layouts.app')

@section('title', 'Details for ' . $customer->name)
 
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Details for {{ $customer->name }}</h1>
            <p><a class="btn btn-primary" href="/customers/{{ $customer->id }}/edit">Edit</a></p>
            <form action="/customers/{{ $customer->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
    
   <div class="row">
       <div class="col-12">
            <p><strong>Name: </strong>{{ $customer->name }}</p>
            <p><strong>Email: </strong>{{ $customer->email }}</p>
            <p><strong>Company: </strong>{{ $customer->company->name }}</p>
       </div>
   </div>

   @if ($customer->image)
       <div class="row">
           <div class="col-12">
               <img src ="{{ asset('storage\uploads\\' . $customer->image) }}" alt="" class="img-thumbnail">
           </div>
       </div>
   @else
       
   @endif
@endsection