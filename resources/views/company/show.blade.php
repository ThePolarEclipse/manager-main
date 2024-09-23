@extends('layouts.app')

@section('content')
    <div class="container">
        <div
            class="row justify-content-center align-items-center g-2"
        >
            <div class="col-md-4 align-self-stretch">
                <img src="{{ empty($company->logo)? asset('backgrounds/icon-park-solid--building-two.svg') : asset('storage/' . $company->logo) }}" class="object-fit-cover img-thumbnail w-100 h-100" alt="">
            </div>
            <div class="col-md-8">
                <!-- Hover added -->
                <div class="list-group list-group-flush">
                    <h1 class="list-group-item display-3 py-4">{{ $company->name }}</h1>
                    @isset($company->email)  
                    <p class="list-group-item">Email: {{ $company->email }}</p>
                    @endisset
                    @isset($company->website)  
                    <p class="list-group-item">Website: {{ $company->website }}</p>
                    @endisset
                    @auth
                        <div class="list-group-item d-grid gap-3 d-md-flex">
                            <a href="{{ route('company.edit', ['company' => $company->id]) }}" class="btn btn-outline-primary">Edit</a>
                            <form action="{{ route('company.destroy', ['company' => $company->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn w-100 btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    @endauth
                </div>
                
            </div>
        </div>
        <h1 class="display-6 pt-5 pb-2">Employees</h1>
        @auth
            <a href="{{ route('employee.create', ['company_id'=> $company->id]) }}" class="btn btn-primary mb-4"> Add Employee to Company </a>
        @endauth
        <div class="list-group">
            @if ($company->employees->count() > 0)
                @foreach ($company->employees as $employee)
                    <a href="../employees/{{ $employee->id }}" 
                        class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $employee->first_name . " " . $employee->last_name}} 
                    </a>
                @endforeach
            @else
                <p class="fs-5">This company has no employees</p>
            @endif
        </div>
    </div>
    @if (session()->has('success'))
        <x-toast :msg="session('success')" />
    @endif
@endsection