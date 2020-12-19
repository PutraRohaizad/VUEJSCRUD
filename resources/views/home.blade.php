@extends('layouts.app')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="text-center">
    <h1><u><b>VUE CRUD</b></u><h1>
</div>

 {{-- Result --}}
 <product-list></product-list>
@endsection

<script>
    setTimeout(function(){
        document.querySelector('.alert').remove()
    }, 2000)
</script>

