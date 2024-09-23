@props(['company', 'date' => 'Currently Works Here'])

@if ($company?->trashed())
<span  class="list-group-item d-flex disabled flex-column flex-md-row justify-content-between align-items-center">
    <span>
        [Deleted] {{ $company->name }}
    </span>
    <span class="">
        {{ $date == 'Currently Works Here'? $date : 'Employeed Till: ' . $date }} 
    </span>
</span>
@else
@empty($company)
<span  class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-center">
    <span>
        Free Agent
    </span>
    <span class="">
        {{ $date == 'Currently Works Here'? $date : 'Independent Till : ' . $date }} 
    </span>
</span>
@else
<a href="../companies/{{ $company->id }}" 
    class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-center">
    <span>
        {{ $company->name }}
    </span>
    <span class="">
        {{ $date == 'Currently Works Here'? $date : 'Employeed Till: ' . $date }} 
    </span>
</a>
@endempty
@endif