@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Edit Listing</h3>
            <a href="/dashboard/{{Auth::user()->id}}" class="pull-right btn btn-success btn-xs">Go Back</a>
            </div>
            <div class="card-body">
            {!! Form::open(['action'=>['ListingsController@update',$listing->id],'method'=>'POST']) !!}
            <input name="user_id" class="form-control" value="{{ Auth::user()->id }}" type="hidden">
            {{ Form::bsText('FullName',$listing->FullName)}}
            {{ Form::bsText('Email',$listing->Email)}}
            {{ Form::bsText('Job',$listing->Job)}}
            {{ Form::bsText('Job',$listing->Job_ID)}}
            {{ Form::bsText('Phone',$listing->Phone)}}
            {{ Form::bsText('X_Lite_Number',$listing->X_Lite_Number)}}
            {{ Form::bsText('Department',$listing->Department)}}
            {{ Form::bsText('Manager',$listing->Manager)}}
            {{Form::hidden('_method','PUT')}}
            {{ Form::bsSubmit('Edit Employee',['class'=>'btn btn-primary']) }}
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection