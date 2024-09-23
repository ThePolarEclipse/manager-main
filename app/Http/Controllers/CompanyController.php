<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("company.index", [
            "companies" => Company::orderBy('name')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("company.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $attribute = $request->validated();
        if (isset($attribute['logo']))
            $attribute['logo'] = $request->file('logo')->store('logos');

        Company::create($attribute);
        session()->flash("success", "You have successfully added a new company to the company list.");
        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view("company.show", [
            "company" => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view("company.edit", [
            "company" => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $attribute = $request->validated();
        if (isset($attribute['logo']))
            $attribute['logo'] = $request->file('logo')->store('logos');

        $company->update($attribute);
        session()->flash("success", "You have successfully updated the information of " . $company->name . ".");
        return redirect('/companies/' . $company->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        session()->flash("success", "You have successfully deleted " . $company->name . " from the companies list.");
        return redirect('/companies');
    }
}
