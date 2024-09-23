@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-3 py-4">Companies List</h1>
        @auth
            <a href="{{ route('company.create') }}" class="btn btn-primary mb-4"> Add New Company </a>
        @endauth
        <div class="list-group company-list">
            @foreach ($companies as $company)
                <a href="../public/companies/{{ $company->id }}" 
                    class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $company->name }} 
                    <span class="badge text-bg-primary rounded-pill">More Details</span>
                </a>
            @endforeach
        </div>
    </div>
    <div class="container pt-3">
        {{ $companies->links() }}
    </div>
    @if (session()->has('success'))
        <x-toast :msg="session('success')" />
    @endif
@endsection