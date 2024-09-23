@extends('layouts.app')

@section('content')
    <div class="container">
        <div
            class=" row justify-content-center align-items-center g-2">
            <div class="col-md-4"><img src="{{ asset('backgrounds/raphael--employee.svg') }}" class="object-fit-cover img-thumbnail w-100 h-100" alt=""></div>
            <div class="col-md-8">
                <!-- Hover added -->
                <div class="list-group list-group-flush">
                    <h1 class="list-group-item display-3 py-4">{{ $employee->first_name . " " . $employee->last_name }}</h1>
                    <p class="list-group-item">
                        @isset($employee->company)
                            Works for {{ $employee->company->name }}
                        @else
                            Is a Free Agent
                        @endif
                    </p>
                    @isset($employee->email)
                    <p class="list-group-item">Email: {{ $employee->email }}</p>
                    @endisset
                    @isset($employee->telephone)
                    <p class="list-group-item">Phone Number: {{ $employee->telephone }}</p>
                    @endisset
                    @auth
                    <div class="list-group-item d-grid gap-3 d-md-flex">
                        <a href="{{ route('employee.edit', ['employee' => $employee->id]) }}" class="btn btn-outline-primary">Edit</a>
                        <form action="{{ route('employee.destroy', ['employee' => $employee->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn w-100 btn-outline-danger">Delete</button>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
        <h1 class="display-6 pt-5 pb-2">Employment History</h1>
        <div class="list-group">
            <x-employment :company="$employee->company" />
            @if ($employee->employmentHistory->count() > 0)
                @foreach ($employee->employmentHistory as $prevWork)
                    <x-employment :company="$prevWork->company" :date="$prevWork->updated_at->format('jS F Y')" />
                @endforeach
            @endif
        </div>
    </div>
    @if (session()->has('success'))
        <x-toast :msg="session('success')" />
    @endif
@endsection