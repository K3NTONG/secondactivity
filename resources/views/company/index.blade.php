@extends('layout.app')

@section('content')
<div class="mt-5">
    <h1>Company Lists<a style="margin-left:60px;margin-top:-3px;" href="forms/create" class="btn btn-primary">ADD COMPANY</a></h1>
    @if(count($comp) > 1)       
        @foreach($comp as $company)
            <div class="well">
                <h1><a href="forms/{{$company->id}}">{{$company->name}}</a><button onclick="DeleteCompany('{{$company->id}}')" style="margin-left:10px;" type="button" class="btn btn-danger btn-sm" name="Delete" >Delete </button><h1>
                <small>Establish on {{date('m-d-y', strtotime($company->created_at))}}</small>
                
            </div>
        @endforeach      
    @else   
        <p>No Company Found</p>
    @endif
</div>
<script>
        function DeleteCompany(title){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'delete_company_data', //check mo palagi yung url mo kung may sub route sya               
                data: {id:title,_token: '{{csrf_token()}}'},
                    success: function(data) {
                        console.log(data);
                        Swal.fire({
                        type: 'success',
                        title: 'Success',
                        text: 'Successfully Deleted',
                        
                        }).then((result) => {
                            location.href="forms";
                        })
                    }
                })
            }
            })
        }
    </script>
@endsection