<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="home_user.aspx.cs" Inherits="Photos_online.home_user" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>ชื่อผู้ใช้</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <!-- Image and text -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="https://www.flaticon.com/svg/static/icons/svg/3567/3567097.svg" width="35" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    ฝากรูปออนไลน์
  </a>

    
    <form class="form-inline my-2 my-lg-0">
        
      <div class="dropdown">
  <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="https://www.flaticon.com/svg/static/icons/svg/711/711769.svg" width="25" height="25" class="d-inline-block align-top" alt="" loading="lazy">&nbsp;
        <asp:Label ID="Label1" runat="server" Text=""></asp:Label>&nbsp;
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="edit_profile.aspx?id=<%= Session["email_users"]%>">Edit Profile</a>
    <a class="dropdown-item" href="edit_password.aspx?id=<%= Session["email_users"]%>">Edit Password</a>
    <a class="dropdown-item" href="index.aspx">Logout</a>
  </div>
</div>&nbsp;&nbsp;
      <a  class="btn btn-outline-success my-2 my-sm-0" href="contact.aspx">Contect</a>
    </form>
</nav>
    <form id="form1" runat="server">
    <div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <br /><br />
                <div class="row">
                <div class="col-md-2"><img src="https://www.flaticon.com/svg/static/icons/svg/711/711769.svg" alt="Alternate Text" width="200px"/></div>
                <div class="col-md-6">
                    <h1>
            <asp:Label ID="username" runat="server" Text=""></asp:Label>&nbsp;<asp:Label ID="Lastname" runat="server" Text=""></asp:Label></h1>                                   
                    <h4>จำนวนรูปที่ฝาก <asp:Label ID="Label3" runat="server" Text=""></asp:Label>&nbsp;รูป</h4>                    
                    <h4>หมวดหมู่ที่สร้าง <asp:Label ID="Label2" runat="server" Text=""></asp:Label>&nbsp;หมวด</h4>  <br />                 
                    
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">ฝากรูป ></button>

                    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Upload Photos</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <input type="file" name="image"><br />
            </p>
            <label>เลือกหมวดหมู่</label>&nbsp;
            <asp:DropDownList ID="DropDownList2" runat="server" DataTextField="name_type" DataValueField="name_type" class="btn btn-warning" >                       
                    </asp:DropDownList>
            <button type="button" class="btn btn-warning" data-target="#myModal2" data-toggle="modal">สร้างหมวดหมู่</button>
        </div>
        <div class="modal-footer">
          <asp:Button ID="Button1" runat="server" Text="Upload" class="btn btn-warning"/>
          
        </div>
      </div>

        
      
    </div>
  </div>

                                     <!-- Modal2 -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Create a category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">        
            <label>ชื่อหมวดหมู่</label>&nbsp;<asp:TextBox ID="TextBox1" runat="server" class="form-control"></asp:TextBox>   
            </p>
        </div>
        <div class="modal-footer">
          <asp:Button ID="Button2" runat="server" Text="Create" class="btn btn-warning"/>
          
        </div>
      </div>

        
      
    </div>
  </div>

                </div>
                <div class="col-md-4">
                    <iframe style="overflow:hidden;border:0;margin:0;padding:0;width:175px;height:80px;"src="http://www.clocktag.com/html5/d171red1.html"></iframe>
                    <iframe style="overflow:hidden;border:0;margin:0;padding:0;width:120px;height:120px;" src="http://www.clocktag.com/html5/t13.html"></iframe>
                </div>
                </div>
            </div>
            <div class="col-md-1">
              
            </div>
        </div>
    </div>

        <div class="row" style="margin-top:100px">
            <div class="col-md-1"></div>
            <div class="col-md-9" style="margin-left:40px">
                    <asp:DropDownList ID="DropDownList1" runat="server" DataTextField="name_type" DataValueField="name_type" class="btn btn-warning dropdown-toggle" >                       
                    </asp:DropDownList>
                    
            </div>
            <div class="col-md-2"></div>
        </div>
        
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
