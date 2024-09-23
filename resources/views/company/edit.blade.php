@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-9 col-lg-7 mx-auto form-bg py-4 px-4 rounded">
            <form action="{{ route('company.update', ['company' => $company->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <h2 class="mb-4 mt-1">Edit Company Details</h2>
                <x-input name="name" label="Company Name <span class='text-danger'>*</span>" :value="old('name', $company->name)" />
                <x-input name="email" label="Email" :value="old('email', $company->email)" />
                <x-input name="website" label="Website" :value="old('website', $company->website)" />
                <x-input name="logo" label="Logo" type="file" />
                
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