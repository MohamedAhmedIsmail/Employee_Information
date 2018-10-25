@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> 
                    <h3>All The Employees</h3>
                </div>
<hr>
<div class="table-responsive-sm table-responsive-md table-responsive-lg">
    <table class="table table-striped text-center">
      <tr>
        <th style="border:1px solid black;">#</th>
        <th style="border:1px solid black;">FullName</th>
        <th style="border:1px solid black;">Email</th>
        <th style="border:1px solid black;">Job</th>
        <th style="border:1px solid black;">Job_ID</th>
        <th style="border:1px solid black;">Phone</th>
        <th style="border:1px solid black;">X_Lite_Number</th>
        <th style="border:1px solid black;">Department</th>
        <th style="border:1px solid black;">Manager</th>
    </tr>

    <?php $count=1;?>
    @foreach ($listings as $listing)
    <tr>
    <td style="width:50px;border:1px solid black;"><?php print ($count);$count++; ?></td>
    <td style="width:117px;border:1px solid black;">{{$listing->FullName}}</td>
    <td style="width:117px;border:1px solid black;">{{$listing->Email}}</td>
    <td style="width:117px;border:1px solid black;">{{$listing->Job}}</td>
    <td style="width:117px;border:1px solid black;">{{$listing->Job_ID}}</td>
    <td style="width:117px;border:1px solid black;">{{$listing->Phone}}</td>
    <td style="width:117px;border:1px solid black;">{{$listing->X_Lite_Number}}</td>
    <td style="width:117px;border:1px solid black;">{{$listing->Department}}</td>
    <td style="width:117px;border:1px solid black;">{{$listing->Manager}}
    </tr>
    @endforeach
</table>
<a href="/dashboard/{{ Auth::user()->id }}" class="btn btn-primary">MyEmployees</a>        
</div>
@endsection