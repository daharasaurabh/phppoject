<!DOCTYPE html>
<html>
    <head>
    <title>Signup Page</title>
        <link rel="stylesheet" href="css/mystyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>

            $(document).ready(function(){
            $('#email').on('change',function(){
                var CID= $(this).val();
                if(CID){
                    $.ajax({
                        type:'post',
                        url:'connection.php',
                        data:'c_id='+CID,
                        success:function(html){
                            $('#email_error').html(html);
                        }
                    })
                }
            });
            $('#age').on('change',function(){
                var age= $(this).val();
                if(age){
                    $.ajax({
                        type:'post',
                        url:'connection.php',
                        data:'age='+age,
                        success:function(html){
                            $('#age_error').html(html);
                        }
                    })
                }
            });
            $('#contact').on('change',function(){
                var contact= $(this).val();
                if(contact){
                    $.ajax({
                        type:'post',
                        url:'connection.php',
                        data:{ contact: contact},
                        success:function(html){
                            $('#contact_error').html(html);
                        }
                    })
                }
            });
            $('#confpassword').on('change',function(){
                var confpassword= $(this).val();
                var password = $("#password").val();
                if(confpassword){
                    $.ajax({
                        type:'post',
                        url:'connection.php',
                        data:{ confpassword: confpassword, password: password},
                        success:function(html){
                            $('#pass_error').html(html);
                        }
                    })                    
                }
            });
            
        }); 
        </script>
    </head>
    <body><center>
        <div class="signup">
        <form id="form1" onsubmit="return myfunction()" action="oncomplete.php" method="post" enctype="multipart/form-data">
        First Name: <input type="text" name="firstname">
        <br>
        Last Name: <input type="text" name="lastname">
        <br>
        E-mail: <input type="text" name="email" id="email">
        <p id="email_error" class="smallp"></p>
        Contact No: <input type="number" name="contact" id="contact">
        <p id="contact_error" class="smallp"></p>
        Age: <input type="text" name="age" id="age">
        <p id="age_error" class="smallp"></p>
        Password: <input type="text" name="password" id="password">
        <br>
        Confirm Password <input type="text" name="confpassword" id="confpassword">
        <p id="pass_error" class="smallp"></p>
        Select image to upload:
        <input type="file" class="choose" name="fileToUpload" id="fileToUpload">
        <br>
        <input type="submit" value="SignUP" name="submit" id="submit">
        </form>
        </div>
        <script src="" async defer></script>
        </center>
    </body>
</html>