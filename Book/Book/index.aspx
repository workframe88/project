<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="index.aspx.cs" Inherits="Book.index" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body style="background-color:#d2ebfd">
    <form id="form1" runat="server">
        <br />
        <br />
        
        <center><font style="font-size:60px">ระบบเช่ายืมหนังสือ</font><br /><br />
        <asp:Image ImageUrl="https://www.flaticon.com/svg/static/icons/svg/2702/2702069.svg" runat="server" width="100px"/></center>
        <div class="row" style="margin-top:2%">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <asp:TextBox ID="TextBox1" runat="server" class="form-control" placeholder="username"></asp:TextBox>   
    <small id="emailHelp" class="form-text text-muted"><asp:Label ID="Label2" runat="server" Text="หากไม่มีสมาชิก คลิก "></asp:Label><asp:LinkButton ID="LinkButton1" runat="server" data-target="#myModal" data-toggle="modal">Register</asp:LinkButton>
                <font style="font-size:1px"><asp:Label ID="Label1" runat="server" Text=""></asp:Label></font>
                </small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <asp:TextBox ID="TextBox2" runat="server" type="password" class="form-control" placeholder="password"></asp:TextBox>   
  </div>
  
  <asp:Button ID="Button1" runat="server" Text="Login" class="btn btn-primary" OnClick="Button1_Click" />&nbsp;<asp:Button ID="Button3" runat="server" Text="Login by admin" class="btn btn-primary" OnClick="Button3_Click" Visible="False" />
        </div>
        <div class="col-md-4"></div>          
        </div>
        
        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Register</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>         
        </div>
        <div class="modal-body">
          <label for="exampleInputEmail1">Name lastname</label>
          <asp:TextBox ID="TextBox3" runat="server" class="form-control" placeholder="Name lastname"></asp:TextBox>
          <p></p>
          <label for="exampleInputEmail1">Email</label>
          <asp:TextBox ID="TextBox4" runat="server" class="form-control" placeholder="Email"></asp:TextBox> 
        <p></p>
          <label for="exampleInputEmail1">Username</label>
          <asp:TextBox ID="TextBox5" runat="server" class="form-control" placeholder="Username"></asp:TextBox> 
        <p></p>
          <label for="exampleInputEmail1">Password</label>
          <asp:TextBox ID="TextBox6" runat="server" class="form-control" placeholder="Password"></asp:TextBox>
        </div>
        <div class="modal-footer">
            <asp:Button ID="Button2" runat="server" Text="Done" class="btn btn-primary" OnClick="Button2_Click"/>      
        </div>
      </div>     
    </div>
  </div>
        <!--end-->

        
    </form>
</body>
</html>
