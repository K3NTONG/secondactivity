@extends('layout.app')

@section('content')
<div class="mt-5">
    <h1>Employee Information</h1>
    <div class="well">
        <h1>{{$emp_info->first_name}}</h1>
        <h1>{{$emp_info->last_name}}<h1>
        <h1>{{$emp_info->email}}</h1>
        <h1>{{$emp_info->phone}}<h1>   
        <small>Hired on {{date('m-d-y', strtotime($emp_info->created_at))}}</small> 
    </div>   
</div>
@endsection