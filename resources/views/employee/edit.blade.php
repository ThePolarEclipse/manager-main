@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-9 col-lg-7 mx-auto form-bg py-4 px-4 rounded">
            <form action="{{ route('employee.update', ['employee' => $employee->id]) }}" method="post">
                @csrf
                @method('patch')
    
                <h2 class="mb-4 mt-1">Edit Employee Details</h2>
                <x-input name="first_name" label="First Name <span class='text-danger'>*</span>" value="{{ old('first_name', $employee->first_name) }}" />
                <x-input name="last_name" label="Last Name <span class='text-danger'>*</span>" value="{{ old('last_name', $employee->last_name) }}" />
                <x-floating name="company_id" label="Company">
                    <select
                        class="form-select {{ $errors->has('company_id')? 'is-invalid' : '' }}"
                        name="company_id"
                        id="company_id"
                    >
                        <option 
                            value=""
                            {{ empty(old('company_id', $employee->company_id))? 'selected' : '' }}
                        >No Company / Free Agent</option>
                        @foreach (\App\Models\Company::all() as $company)
                            <option 
                                value="{{ $company->id }}"
                                {{ old('company_id', $employee->company_id) == $company->id? 'selected' : '' }}
                            >{{ $company->name }}</option>
                        @endforeach
                    </select>
                </x-floating>
                <x-input name="email" label="Email" value="{{ old('email', $employee->email) }}" />
                <x-input name="telephone" label="Phone Number" value="{{ old('telephone', $employee->telephone) }}" />
                
                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Update
                </button>
            </form>
        </div>
    </div>
@endsection