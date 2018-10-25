@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> 
                <h3>Add Employee</h3>
                <a href="/dashboard/{{Auth::user()->id}}" class="pull-right btn btn-success btn-xs">Go Back</a>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {!!Form::open(['action'=>'ListingsController@store','method'=>'POST']) !!}
                <input name="user_id" class="form-control" value="{{ Auth::user()->id }}" type="hidden">
                {{ Form::bsText('FullName','')}}
                {{ Form::bsText('Email','')}}
                {{ Form::bsText('Job','')}}
                {{ Form::bsText('Job_ID','')}}
                {{ Form::bsText('Phone','')}}
                {{ Form::bsText('X_Lite_Number','')}}
                {{ Form::bsText('Department','')}}
                {{ Form::bsText('Manager','')}}
                {{ Form::bsSubmit('Add Employee',['class'=>'btn btn-primary']) }}
                {!!Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection