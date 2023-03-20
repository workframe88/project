<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="index.aspx.cs" Inherits="Photos_online.index" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Photos Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</head>
<body style="background-color:#F3F3F2">
    <form id="form1" runat="server">
        <center><font style="font-size:70px">ฝากรูปออนไลน์</font><br /><br /><br />
            <marquee width="60%" direction="left" bgcolor="#FFFF00">บริการ ฝากรูป อัพโหลดรูป ไม่จำกัดจำนวน ไม่มีหมดอายุ ตลอดอายุการใช้งาน ฟรี!</marquee><br />
            <img src="https://www.flaticon.com/svg/static/icons/svg/3567/3567097.svg" alt="Alternate Text" width="100px"/><br /><br />
           
            
        </center>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                    <asp:TextBox ID="user" type="email" class="form-control" placeholder="name@example.com" runat="server" ></asp:TextBox>
                </div>
                <br />
                <center>
                <asp:Button ID="loginBtn" runat="server" class="btn btn-primary" data-toggle="button" aria-pressed="false" Text="Login" OnClick="loginBtn_Click1" />
            
                </center>
            </div>
            <div class="col-md-4"></div>
        </div>
    <div>
    
    </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
