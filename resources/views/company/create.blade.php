@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-9 col-lg-7 mx-auto form-bg py-4 px-4 rounded">
            <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <h2 class="mb-4 mt-1">Add Company</h2>
                <x-input name="name" label="Company Name <span class='text-danger'>*</span>" />
                <x-input name="email" label="Email" />
                <x-input name="website" label="Website" />
                <x-input name="logo" label="Logo" type="file" />
                
                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Submit
                </button>
                
            </form>
        </div>
    </div>
    
@endsection