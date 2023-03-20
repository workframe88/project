<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="edit_profile.aspx.cs" Inherits="Photos_online.edit_image" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <form id="form1" runat="server">
    <div>
        <br />
        <br />
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card" style="width: 100%; margin-top:100px">
                    <div class="row">
                    <div class="col-md-3"><img src="https://www.flaticon.com/svg/static/icons/svg/3579/3579045.svg" width="120px" alt="..." style="margin-left:40px; margin-top:10px"></div>
                    <div class="col-md-9" style="margin-top:20px"><font style="font-size:50px; margin-left:35px;">Edit Profile</font></div>
                    </div>
                    <div class="card-body">
                        
                        <h5 class="card-title">Name<asp:Label ID="Label1" runat="server" Text=""></asp:Label><asp:Label ID="type" runat="server" Text=""></asp:Label>
                        
                        
                            </h5>
                        
                        
                            <asp:TextBox ID="TextBox1" class="form-control" placeholder="Password" runat="server"></asp:TextBox><br />
                        <h5 class="card-title">LastName</h5>
                            <asp:TextBox ID="TextBox2" class="form-control" placeholder="Confirm Password" runat="server"></asp:TextBox>
                        
                        </p>
                        <input type="file" name="image"/>
                        </p>
                        <asp:Button ID="Button1" runat="server" class="btn btn-primary" data-toggle="button" aria-pressed="false" Text="Save" OnClick="Button1_Click" />
                        <asp:Button ID="Button2" runat="server" class="btn btn-primary" data-toggle="button" aria-pressed="false" Text="Cancel" OnClick="Button2_Click" />
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
