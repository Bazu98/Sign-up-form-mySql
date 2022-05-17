<?php    
include 'crud.php';  
$object = new Crud();  
?>  
<html>  
    <head>  
        <title></title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="style.css">
    </head>  
    <body>  
        <div class="container box">  
            <h3 align="center">Submit Form</h3><br />  
            <a href="config.php">Home Page</a>  
            <br /><br />  
            <div>  
                <form method="post" id="user_form" action="index.php">  
                    <label>Enter First Name</label>  
                    <input type="text" name="first_name" id="first_name" class="form-control" required/>  
                    <br />  
                    <label>Enter Last Name</label>  
                    <input type="text" name="last_name" id="last_name" class="form-control"  required/>  
                    <br />  
                    <label>Enter Email</label>  
                    <input type="email" name="email" id="email"  class="form-control" required/>  
                    <br />  
                    <div align="center"> 
                        <input type="submit" name="button_action" id="button_action" class="btn btn-default" value="Submit" />  
                    </div>  
                </form>  
            </div>  
            <br /><br />  
            <div id="user_table" class="table-responsive">  
            </div>  
        </div>  
    </body>  
</html>  
<script type="text/javascript">  
    $(document).ready(function(){  
        $('#user_form').on('submit', function(event){  
            event.preventDefault();  
            
            let data = new FormData(this);
            data.append('action', 'Submit');
            $.ajax({  
                url:"action.php",  
                method:"POST",  
                data:data,
                contentType:false,  
                processData:false,  
                success:function(data)  
                {
                    alert(data);  
                    $('#user_form')[0].reset();  
                }  
            })  
    });  
});  
</script>  