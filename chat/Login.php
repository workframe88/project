<?php session_start(); ?>
<?php

?>
<?php session_destroy(); ?>
<script src="css/sweetalert2@10"></script>
<script src="css/bootstrap.min.js"></script>
<script src="css/polyfill.js"></script>
<script src="css/popper.min.js"></script>
<script src="css/jquery-3.6.0.min.js"></script>

<script src="ajax/jquery.validate.js"></script>
<script src="ajax/jquery.validate.min.js"></script>
<script src="ajax/additional-methods.js"></script>
<script src="ajax/additional-methods.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/w3.css" rel="stylesheet">
<link href="css/font/css/all.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!------ Include the above in your HEAD tag ---------->
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
<title id="edp">ล็อคอิน</title>
<link rel="icon" href="css2/poto/box1x.png" type="image/x-icon">
<style>
    /*
 * Specific styles of signin component
 */
    /*
 * General styles
 */
    * {
        scrollbar-width: thin;
        scrollbar-color: #666666e3 #FFF;
    }

    /* Works on Chrome, Edge, and Safari */
    *::-webkit-scrollbar {
        width: 0px;

    }

    *::-webkit-scrollbar-track {
        background: #FFFFFF;
    }

    *::-webkit-scrollbar-thumb {
        background-color: blue;
        border-radius: 20px;
        border: 0px solid #FFFFFF;
    }

    body,
    html {
        background-repeat: no-repeat;
        background:#448861;
        
    }

    .card-container.card {
        max-width: 350px;
        padding: 40px 40px;
    }

    .btn {
        font-weight: 700;
        height: 36px;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none;
        cursor: default;
    }

    /*
 * Card component
 */
    .card {
        background-color: #F7F7F7;
        /* just in case there no content*/
        padding: 20px 25px 30px;
        margin: 0 auto 25px;
        margin-top: 20px;
        /* shadows and rounded borders */
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
    
    }

    .profile-img-card {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }

    /*
 * Form styles
 */
    .profile-name-card {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        margin: 10px 0 0;
        min-height: 1em;
    }

    .reauth-email {
        display: block;
        color: #404040;
        line-height: 2;
        margin-bottom: 10px;
        font-size: 14px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin #inputEmail,
    .form-signin #inputPassword {
        direction: ltr;
        height: 44px;
        font-size: 16px;
    }

    .form-signin input[type=email],
    .form-signin input[type=password],
    .form-signin input[type=text],
    .form-signin button {
        width: 100%;
        display: block;
        margin-bottom: 10px;
        z-index: 1;
        position: relative;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin .form-control:focus {
        border-color: rgb(104, 145, 162);
        outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb(104, 145, 162);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb(104, 145, 162);
    }

    .btn.btn-signin {
        /*background-color: #4d90fe; */
        background-color: rgb(104, 145, 162);
        /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
        padding: 0px;
        font-weight: 700;
        font-size: 14px;
        height: 36px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        border: none;
        -o-transition: all 0.218s;
        -moz-transition: all 0.218s;
        -webkit-transition: all 0.218s;
        transition: all 0.218s;
    }

    .btn.btn-signin:hover,
    .btn.btn-signin:active,
    .btn.btn-signin:focus {
        background-color: rgb(12, 97, 33);
    }

    .forgot-password {
        color: rgb(104, 145, 162);
    }

    .forgot-password:hover,
    .forgot-password:active,
    .forgot-password:focus {
        color: rgb(12, 97, 33);
    }
    @font-face {
        font-family: myFirstFont;
        src: url(css/Kanit-Light.woff);
    }
</style>

<body style="font-family:myFirstFont;">
<div class="container w3-animate-opacity">
<div class="row" style="margin-top:auto;margin-bottom:auto; margin-right:auto; margin-left:auto; padding: 35px; ">



    <div class="card card-container" style="background:white;">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" onerror="this.src='img/1.png'" class="profile-img-card" src="img/1.png" />

        
        <hr>
        <form id="quickForm" class="form-signin" style="margin-left: 10px;" >
            <div class="form-group" style="margin-bottom:5px">
            <input onfocusout="test001();" type="text" name="id"id="loginusername" onblur="checkText();" class="form-control" placeholder="รหัสผู้ใช้งาน" pattern="[A-Za-z0-9]+"  required autofocus>
            </div>
            <div class="form-group" style="margin-bottom:5px">
            <input type="password" name="password"id="loginpassword" class="form-control" placeholder="พาสเวิร์ด" pattern="[A-Za-z0-9]+"  required>
            </div>
            <div id="remember" class="checkbox">

            <hr>
            <button style="margin-top: 10px;margin-bottom: 10px;" id="login_btn" type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> ล็อคอิน</button>
           
        </form><!-- /form -->
        <a href="#" class="forgot-password">

        </a>
    </div><!-- /card-container -->
</div><!-- /container -->
</div>
</body>

<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      id: {
        required: true
      },
      password: {
        required: true,
    
      },
      terms: {
        required: true
      },
    },
    messages: {
      id: {
        required: '<i class="fas fa-exclamation-circle"></i> กรุณากรอก รหัสผู้ใช้งานด้วยจ้า !!'
      },
      password: {
        required: '<i class="fas fa-exclamation-circle"></i> กรุณากรอก พาสเวิร์ดด้วยจ้า !!'
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
      $(element).addClass('is-valid');
    }
  });
});
</script>
<script>
    $('document').ready(function() {
        $('#login_btn').on("click", function(e) {
            var username = $('#loginusername').val();
            var password = $('#loginpassword').val();
            if (username != '' && password != '') {
                e.preventDefault();
                $.ajax({
                    url: 'ajax/checklogin.php',
                    type: 'post',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(data) {
                        if (data == 'Yes') {
                            $.post("ajax/user.php", {},
                                function(data) {
                                    swal.fire({
                                        title: "เข้าสู่ระบบ",
                                        text: data,
                                        icon: "success",
                                    }).then(function(isConfirm) {
                                        window.location.replace('chat.php');
                                       
                                    })
                                    $("#error_msg").text("เข้าสู่ระบบสำเร็จ");
                                });
                        } else {
                            swal.fire({
                                icon: 'error',
                                title: 'ผิดพลาด',
                                text: 'Username หรือ Password ของท่านไม่ถูกต้อง',
                            })
                            $("#error_msg").text("กรุณาตรวจสอบ รหัสเข้าใช้งาน");
                            $('#loginpassword').val("");
                        }
                    }
                })
            } else {
                swal.fire({
                    icon: 'warning',
                    title: 'ผิดพลาด',
                    text: 'กรุณากรอกข้อมูลให้ครบถ้วนจ้า',
                })
                $("#error_msg").text("กรุณากรอกข้อมูลให้ครบถ้วนจ้า");
                e.preventDefault();
            }
        });

       
    });

    function test001() {

        var username = $('#loginusername').val();
        $("#profile-img").attr("src", 'img/' + username + '.png');

    }

   
</script>