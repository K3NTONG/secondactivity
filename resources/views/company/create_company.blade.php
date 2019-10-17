@extends('layout.app')

@section('content')
        
<!--form submission with ajax request-->
<script>
    $(document).ready(function(){
        $("#name_form").submit(function(e) {
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

                url: '../ajax_sumit_company',  
                data: $('#name_form').serialize(), //dito from the form ipasa nya yung data to the conttroller
                success: function(data) { //<=dito sya mapunta pag nagreturn ako galing sa controller
                    //console.log(data); //then dito ko nagprint ng laman ng data
                    if(data=="success"){
                        Swal.fire({
                            type: 'success',
                            title: 'Success',
                            text: 'Successfully Added!',
                        }).then((result) => {
                            location.href="../forms";
                        });
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
        <form id="name_form" method="POST">
            {{ csrf_field() }}
            
            <div class="row">
                    <div class="col-md-12">
                    <table class="table table-sm borderless" style="margin-top:10px;">
                        <thead>
                        <tr style="background-color:#124f62;color:white">
                            <th colspan="2">Create Company</th>   
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td style="vertical-align:middle;" id="DepartmentTitle">Company Name</td>
                            </tr>
                            <tr>
                                <td style="vertical-align:middle;">
                                    <input type="text" name="name" id="name" class="form-control"  placeholder="Enter your name">
                                </td>
                            </tr>

                            <tr>
                                <td style="vertical-align:middle;" id="DepartmentTitle">Company Email</td>
                            </tr>
                            <tr>
                            <td style="vertical-align:middle;">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email">
                                </td>
                            </tr>

                            <tr>
                                    <td style="vertical-align:middle;" id="DepartmentTitle">Company Website</td>
                                </tr>
                                <tr>
                                <td style="vertical-align:middle;">
                                        <input type="text" name="website" id="website" class="form-control" placeholder="Enter the website of your company">
                                    </td>
                                </tr>
                            
                            <tr>
                                <td style="vertical-align:middle;" colspan="2"><input type="submit" class="btn btn-success" value="Submit"></td> 
                                 <a href="../forms/" class="btn btn-primary">Back</a>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>	               
        </div>
    </div>
</form>

@endsection 
