@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pt-5 justify-content-center align-items-center g-4 welcome-cards">
            <div class="col-md">
                <div class="card">
                    <img class="card-img-top object-fit-cover" src="backgrounds/companies.jpg" alt="Title" />
                    <div class="card-body">
                        <h4 class="card-title">Companies</h4>
                        <a href="../public/companies" class="btn btn-primary">See All</a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <img class="card-img-top object-fit-cover" src="backgrounds/employees.jpg" alt="Title" />
                    <div class="card-body">
                        <h4 class="card-title">Employees</h4>
                        <a href="../public/employees" class="btn btn-primary">See All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection