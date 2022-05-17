<?php
//index.php  
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
    <a href="config.php">Home Page</a>   
        <div id="user_table" class="table-responsive">  
        </div>  
</body>  
</html>  
<script type="text/javascript">  
$(document).ready(function(){
    load_data();
    

    $("body").on("click", function(e){
        $.ajax({
            url:"action.php",
            method: "POST",
            data:{action:'Delete',id:e.target.id},
            success: function (){
                load_data();
            }
        });
    });


    function load_data()  {   
        $.ajax({  
                url:"action.php",  
                method:"POST",
                data:{action:'Load'},  
                success:function(data)  
                {  
                    $('#user_table').html(data);  
                }  
        });  
    }; 

});  

</script>  