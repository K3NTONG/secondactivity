@extends('layout.app')

@section('content')
<div class="mt-5">
    <h1>{{$comp->name}} List Of Employee's <a style="margin-left:20px;margin-top:-3px;" href="../create_emp?company_id={{$comp->id}}" class="btn btn-primary">ADD EMPLOYEE</a></h1>
    <p>Email: {{$comp->email}}</p>
    <p>Website: {{$comp->website}}</p>  
    @if(count($emp) > 0)       
        @foreach($emp as $emp1)
            <div class="well">
                <h1><a href="../emp_info?id={{$emp1->id}}">{{$emp1->first_name}}</a><button onclick="Delete('{{$emp1->id}}')" type="button" style="margin-left:10px;" class="btn btn-danger btn-sm" name="Delete" >Delete </button><h1>
                <small>Hired on {{date('m-d-y', strtotime($emp1->created_at))}}</small> 
            </div>
        @endforeach      
    @else   
        <p>No Employee found!</p>
    @endif
</div>
    <script>
    function Delete(title){
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
            url: '../delete_employee_data', //check mo palagi yung url mo kung may sub route sya               
            data: {id:title,_token: '{{csrf_token()}}'},
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                    type: 'success',
                    title: 'Success',
                    text: 'Successfully Deleted',
                    
                    }).then((result) => {
                        location.href="../forms/";
                    })
                }
            })
        }
        })
    }
</script>
@endsection