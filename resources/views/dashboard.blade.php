@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> 
                    <h3>Employees Information</h3>
                    <span class="pull-right">
                        <a href="/listings/create/{{ Auth::user()->id }}" class="btn btn-success btn-xs">Add Employee</a>
                    </span>
                    <a href="/" class="btn btn-primary btn-xs">Home</a></span></div>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
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
                            <th style="border:1px solid black;">Edit Employee</th>
                            <th style="border:1px solid black;">Delete Employee</th>
                        </tr>
                        <?php $count=1;?>
                        @foreach ($users->listings as $listing)
                        <tr>
                        <td style="width:50px;border:1px solid black;"><?php print($count);$count++; ?></td>
                        <td style="width:106px;border:1px solid black;">{{$listing->FullName}}</td>
                        <td style="width:106px;border:1px solid black;">{{$listing->Email}}</td>
                        <td style="width:106px;border:1px solid black;">{{$listing->Job}}</td>
                        <td style="width:106px;border:1px solid black;">{{$listing->Job_ID}}</td>
                        <td style="width:106px;border:1px solid black;">{{$listing->Phone}}</td>
                        <td style="width:106px;border:1px solid black;">{{$listing->X_Lite_Number}}</td>
                        <td style="width:106px;border:1px solid black;">{{$listing->Department}}</td>
                        <td style="width:106px;border:1px solid black;">{{$listing->Manager}}</td>
                        <td style="width:106px;border:1px solid black;"><a class="btn btn-primary" href="/listings/edit/{{Auth::user()->id}}/{{$listing->id}}">Edit</a></td>
                        <td style="width:150px;border:1px solid black;">
                            {!! Form::open(['action'=>['ListingsController@destroy',$listing->id],'method'=>'POST','class'=>'pull-left','onsubmit'=>'return confirm("Are You Sure?")']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::bsSubmit('Delete',['class'=>'btn btn-danger']) }}
                            {!! Form::close() !!}
                        </td>
                        </tr>
                        @endforeach
                    </table>        
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
