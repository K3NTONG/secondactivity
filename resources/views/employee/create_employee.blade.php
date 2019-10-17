@extends('layout.app')

@section('content')
        
<!--form submission with ajax request-->
<script>
    $(document).ready(function(){
        $("#create_emp_form").submit(function(e) {
            e.preventDefault();

            //ajax request
            $.ajax({
                //from here
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                //until here 
                //static na yan na mga value hindi mo na kailangan baguhin

                url: 'ajax_sumit_employee',  //current route public/create_emp tangalin mo yung ../ kasinasa public ka na ...pag may ../ mag back pa sya sa public 
                data: $('#create_emp_form').serialize(), //dito from the form ipasa nya yung data to the conttroller
                success: function(data) { //<=dito sya mapunta pag nagreturn ako galing sa controller
                    //console.log(data); //then dito ko nagprint ng laman ng data
                    if(data=="success"){
                        Swal.fire({
                            type: 'success',
                            title: 'Success',
                            text: 'Successfully Added!',
                        }).then((result) => {
                            location.href="forms/";
                        });;
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Error',
                        });
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //may mga error na hindi ma detect sa query 
                    //so dito sila nagooutput
                    //hindi lahat ng error sa else sa taas mapupunta so lagyan mo nalang nito
                    //error :function
                    Swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Error',
                        });
                }
            })
            //ajax request end

        });
    });
</script>
<div class="container-fluid" >
    <div class="col-md-6" style="background-color:white;padding-top:20px;padding-bottom:10px;">
        <form id="create_emp_form" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="company_id" value="{{$company_id}}">
            <div class="row">
                    <div class="col-md-12">
                    <table class="table table-sm borderless" style="margin-top:10px;">
                        <thead>
                        <tr style="background-color:#124f62;color:white">
                            <th colspan="2">Add Employee</th>   
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td style="vertical-align:middle;" id="DepartmentTitle">First Name</td>
                            </tr>
                            
                            <tr>
                                <td style="vertical-align:middle;">
                                    <input type="text" name="first_name" id="first_name" class="form-control"  placeholder="Enter your First Name">
                                </td>
                            </tr>

                            <tr>
                                <td style="vertical-align:middle;" id="DepartmentTitle">Last Name</td>
                            </tr>
                            <tr>
                            <td style="vertical-align:middle;">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter your Last Name">
                                </td>
                            </tr>

                             <tr>
                                <td style="vertical-align:middle;" id="DepartmentTitle">Employee Email</td>
                            </tr>
                            <tr>
                            <td style="vertical-align:middle;">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email">
                                </td>
                            </tr>

                             <tr>
                                <td style="vertical-align:middle;" id="DepartmentTitle">Contact Number</td>
                            </tr>
                            <tr>
                            <td style="vertical-align:middle;">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your Phone Number">
                                </td>
                            </tr>
                            
                            <tr>
                                <td style="vertical-align:middle;" colspan="2"><input type="submit" class="btn btn-success" value="Submit"></td> 
                                 <a href="./forms" class="btn btn-primary">Back</a>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>	               
        </div>
    </div>
</form>

@endsection 
