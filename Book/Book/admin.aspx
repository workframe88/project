<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="admin.aspx.cs" Inherits="Book.admin" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body style="background-color:#FFFFCC">
    <form id="form1" runat="server">
        <center>
            <br /><br />
            <h1>Admin</h1>
               <h4>คุณ <asp:Label ID="Label7" runat="server" Text="Label" ></asp:Label><p></p>
           <asp:Button ID="Button1" runat="server" Text="Logout" Class="btn btn-primary" OnClick="Button1_Click"></asp:Button>
               </h4>
        <div class="row">
            <div class="col-md-4" style="margin-top:7%"> 
               <a href="#" data-target="#myModal1" data-toggle="modal"><asp:image imageurl="https://www.flaticon.com/svg/static/icons/svg/921/921347.svg" runat="server" width="200px"/></a> 
               <p></p><h3>สมาชิกทั้งหมด</h3>
               
                
                
            </div>
            <div class="col-md-4" style="margin-top:7%">
                 <a href="#" data-target="#myModal2" data-toggle="modal"><asp:image imageurl="https://www.flaticon.com/svg/static/icons/svg/2702/2702069.svg" runat="server" width="200px"/></a> 
                <p><h3>เพิ่ม | ลบ | แก้ไข</h3></p>
            </div>
            <div class="col-md-4" style="margin-top:7%">
                 <a href="#" data-target="#myModal3" data-toggle="modal"><asp:image imageurl="https://www.flaticon.com/svg/static/icons/svg/1191/1191620.svg" runat="server" width="200px"/></a> 
                <p><h3>ซื้อ | เช่า | คืน</h3></p>
            </div>
            
        </div>
            </center>
                                                                             <!-- Modal2 -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">All Book</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">        
               <asp:GridView ID="showbl3" runat="server"   OnRowCommand="GridView3_RowCommand"  EmptyDataText="ไม่พบข้อมูล" AutoGenerateColumns="false" class="table table-sm" width="100%" >
                <Columns>
                    <asp:templatefield Headertext="ID" >
                        <itemtemplate>
                            <asp:label id="id" Text ='<%# Eval("id")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="ปก">
                        <itemtemplate>
                            <asp:Image ImageUrl='<%# Eval("image")%>' runat="server" Width="60px"/>
                            
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="Name">
                        <itemtemplate>
                            <asp:label id="name_book" Text ='<%# Eval("name_book")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                     <asp:templatefield Headertext="ประเภท">
                        <itemtemplate>
                            <asp:label id="name_type" Text ='<%# Eval("name_type")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="Price">
                        <itemtemplate>
                            <asp:label id="price_book" Text ='<%# Eval("price_book")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="Rent price">
                        <itemtemplate>
                            <asp:label id="rent_book" Text ='<%#Eval("rent_book") %>'  runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="Stock">
                        <itemtemplate>
                            <asp:label id="stok" Text ='<%#Eval("stok") %>'  runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="แก้ไข">
                        <itemtemplate>
                            <center>
                            <asp:LinkButton ID="edit" runat="server" Text="Edit" CommandArgument='<%# Eval("id") %>' CommandName="edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg></asp:LinkButton>
                            </center>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="ลบ">
                        <itemtemplate>
                            <center>
                            <asp:LinkButton ID="Delete2" runat="server" Text="Delete" CommandArgument='<%# Eval("id") %>' CommandName="selectdel"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
</svg></asp:LinkButton>
                            </center>
                        </itemtemplate>
                    </asp:templatefield>
                </Columns>
                </asp:GridView>
            </p>
        </div>
        <div class="modal-footer">
            <asp:LinkButton ID="LinkButton4" runat="server" data-target="#myModal4" data-toggle="modal" class="btn btn-primary">Add Book</asp:LinkButton>
        </div>
      </div>

        
      
    </div>
  </div>

                                                                                  <!-- Modal1 -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">All Users</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">        
               <asp:GridView ID="showbl2" runat="server"   OnRowCommand="GridView2_RowCommand"  EmptyDataText="ไม่พบข้อมูล" AutoGenerateColumns="false" class="table table-sm" width="100%" >
                <Columns>
                    <asp:templatefield Headertext="ID" >
                        <itemtemplate>
                            <asp:label id="id" Text ='<%# Eval("id")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="Name">
                        <itemtemplate>
                            <asp:label id="name_user" Text ='<%# Eval("name_user")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="Email">
                        <itemtemplate>
                            <asp:label id="email" Text ='<%# Eval("email")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="Username">
                        <itemtemplate>
                            <asp:label id="username" Text ='<%#Eval("username") %>'  runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="ลบ">
                        <itemtemplate>
                            <center>
                            <asp:LinkButton ID="Delete2" runat="server" Text="Delete" CommandArgument='<%# Eval("id") %>' CommandName="selectdel"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
</svg></asp:LinkButton>
                            </center>
                        </itemtemplate>
                    </asp:templatefield>
                </Columns>
                </asp:GridView>
            </p>
        </div>
        
      </div>

        
      
    </div>
  </div>

                                                                                      <!-- Modal3 -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Rent Book</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">     
            <h3>เช่า = 0 | คืนแล้ว = 1 | ซื้อ = 2</h3>
            <h6>**คืนภายใน 7 วัน**</h6>
            <p></p>
               <asp:GridView ID="showbl4" runat="server"   OnRowCommand="GridView4_RowCommand"  EmptyDataText="ไม่พบข้อมูล" AutoGenerateColumns="false" class="table table-sm" width="100%" >
                <Columns>
                    <asp:templatefield Headertext="ID" >
                        <itemtemplate>
                            <asp:label id="id" Text ='<%# Eval("id")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="หนังสือ">
                        <itemtemplate>
                            <asp:label id="name_book" Text ='<%# Eval("name_book")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                   

                    <asp:templatefield Headertext="จำนวน">
                        <itemtemplate>
                            <asp:label id="toltal" Text ='<%# Eval("toltal")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="ชื่อ">
                        <itemtemplate>
                            <asp:label id="name_user" Text ='<%# Eval("name_user")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="วันที่ยืม">
                        <itemtemplate>
                            <asp:label id="date" Text ='<%#Eval("date") %>'  runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="วันที่ต้องคืน">
                        <itemtemplate>
                            <asp:label id="date7" Text ='<%#Eval("date7") %>'  runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="สถานะ">
                        <itemtemplate>
                            <asp:label id="status" Text ='<%#Eval("status") %>'  runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="ลบ">
                        <itemtemplate>
                            <center>
                            <asp:LinkButton ID="Delete2" runat="server" Text="Delete" CommandArgument='<%# Eval("id") %>' CommandName="selectdel"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
</svg></asp:LinkButton>
                            </center>
                        </itemtemplate>
                    </asp:templatefield>
                </Columns>
                </asp:GridView>
            </p>
        </div>
        
      </div>

        
      
    </div>
  </div>

                                                                                           <!-- Modal4 -->
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add book</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">        
               <asp:Label ID="Label1" runat="server" Text="ชื่อหนังสือ"></asp:Label>
                <asp:TextBox ID="TextBox1" runat="server" Class="form-control"></asp:TextBox><p></p>
               <asp:Label ID="Label6" runat="server" Text="ประเภท "></asp:Label> <asp:DropDownList ID="DropDownList1" runat="server" Class="form-control" role="button"  data-toggle="dropdown" DataTextField="name_type" DataValueField="id"></asp:DropDownList>
                <p></p>
                <asp:Label ID="Label2" runat="server" Text="ราคาขาย"></asp:Label>
                <asp:TextBox ID="TextBox2" runat="server" Class="form-control"></asp:TextBox><p></p>
                <asp:Label ID="Label3" runat="server" Text="ราคาเช่า"></asp:Label>
                <asp:TextBox ID="TextBox3" runat="server" Class="form-control"></asp:TextBox><p></p>
                <asp:Label ID="Label4" runat="server" Text="จำนวน" ></asp:Label>
                <asp:TextBox ID="TextBox4" runat="server" Class="form-control"></asp:TextBox> <p></p>
                <asp:Label ID="Label5" runat="server" Text="รูปปก Link address"></asp:Label>
                <asp:TextBox ID="TextBox5" runat="server" Class="form-control"></asp:TextBox><br /><br />
        </div>
        <div class="modal-footer">
            <asp:LinkButton ID="LinkButton5" runat="server" class="btn btn-primary" OnClick="LinkButton5_Click">Submit</asp:LinkButton>
            <asp:LinkButton ID="LinkButton6" runat="server" data-target="#myModal5" data-toggle="modal" class="btn btn-primary">Type Book</asp:LinkButton>
        </div>
      </div>

        
      
    </div>
  </div>

                                                                                 <!-- Modal5 -->
  <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Type Book</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">     
            
            <p></p>
               <asp:GridView ID="GridView1" runat="server"   OnRowCommand="GridView1_RowCommand"  EmptyDataText="ไม่พบข้อมูล" AutoGenerateColumns="false" class="table table-sm" width="100%" >
                <Columns>
                   

                    <asp:templatefield Headertext="ชื่อ">
                        <itemtemplate>
                            <asp:label id="name_user" Text ='<%# Eval("name_type")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    

                    <asp:templatefield Headertext="ลบ">
                        <itemtemplate>
                            <center>
                            <asp:LinkButton ID="Delete2" runat="server" Text="Delete" CommandArgument='<%# Eval("id") %>' CommandName="selectdel"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
</svg></asp:LinkButton>
                            </center>
                        </itemtemplate>
                    </asp:templatefield>
                </Columns>
                </asp:GridView>
            </p>
        </div>
        <div class="modal-footer"> 
            <asp:LinkButton ID="LinkButton7" runat="server" data-target="#myModal7" data-toggle="modal" class="btn btn-primary">Add Type</asp:LinkButton>
        </div>
      </div>

        
      
    </div>
  </div>

                                                                                         <!-- Modal7 -->
  <div class="modal fade" id="myModal7" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Type Book</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">     
            <asp:TextBox ID="TextBox6" runat="server" Class="form-control"></asp:TextBox>
            </p>
        </div>
        <div class="modal-footer"> 

            <asp:LinkButton ID="LinkButton8" runat="server" class="btn btn-primary" OnClick="LinkButton8_Click">Submit</asp:LinkButton>
        </div>
      </div>

        
      
    </div>
  </div>
    </form>
</body>
</html>
