<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="show.aspx.cs" Inherits="Photos_online.show" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>ชื่อผู้ใช้</title>
   
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
      <a  class="btn btn-outline-success my-2 my-sm-0" href="contact.aspx">Customize Web</a>
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
                    </asp:DropDownList>&nbsp;
                   
                    
                   
            </div>
            <div class="col-md-2"></div>
        </div>
        </p>
        <center>
            <asp:GridView ID="showbl" runat="server"   OnRowCommand="GridView1_RowCommand"  EmptyDataText="ไม่พบข้อมูล" AutoGenerateColumns="false" class="table table-striped" width="65%">
                <Columns>
                    <asp:templatefield Headertext="ไอดี" >
                        <itemtemplate>
                            <asp:label id="id_users" Text ='<%# Eval("id_users")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="Email">
                        <itemtemplate>
                            <asp:label id="email_users" Text ='<%# Eval("email_users")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="Password">
                        <itemtemplate>
                            <asp:label id="password_users" Text ='<%# Eval("password_users")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="ชื่อ สกุล">
                        <itemtemplate>
                            <asp:label id="Name_users" Text ='<%#Eval("name_users") + " " + Eval("lasname_users") %>'  runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="จำนวนรูป">
                        <itemtemplate>
                            <asp:label id="total" Text ='<%# Eval("total")%>' runat="server"/>
                           
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="Rrset">
                        <itemtemplate>
                            <asp:LinkButton ID="reset" runat="server"  CommandArgument='<%# Eval("id_users") %>' CommandName="selectdel3"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bootstrap-reboot" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 0 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8zm5.48-.079V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6zm0 3.75V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141z"/>
</svg></asp:LinkButton>
                           
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="แก้ไข">
                        <itemtemplate>
                            <asp:LinkButton ID="edit" runat="server" Text="Edit" CommandArgument='<%# Eval("id_users") %>' CommandName="selectdel2"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg></asp:LinkButton>
                           
                        </itemtemplate>
                    </asp:templatefield>
                    <asp:templatefield Headertext="ลบ">
                        <itemtemplate>
                            
                            <asp:LinkButton ID="Delete" runat="server" Text="Delete" CommandArgument='<%# Eval("email_users") %>' CommandName="selectdel"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
</svg></asp:LinkButton>
                            
                        </itemtemplate>
                    </asp:templatefield>
                </Columns>
                </asp:GridView>

        </center>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
