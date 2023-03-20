<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="user.aspx.cs" Inherits="Book.user" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body style="background-color:#d2ebfd">
    <form id="form1" runat="server">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <img src="https://www.flaticon.com/svg/static/icons/svg/2702/2702069.svg" width="50px" alt="Alternate Text" class="navbar-brand"/>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="user.aspx">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" style="width:200px;margin-top:8px">
          คุณ <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
      </li>
      
      <li class="nav-item" >
        <asp:DropDownList ID="DropDownList1" runat="server" class="nav-link dropdown-toggle" role="button" AutoPostBack="True" data-toggle="dropdown" DataTextField="name_type" DataValueField="id" OnSelectedIndexChanged="DropDownList1_SelectedIndexChanged"></asp:DropDownList>
      </li>
          
        
    </ul>&nbsp;&nbsp;
      <marquee>หนังสือ หมายถึง "เครื่องหมายใช้ขีดเขียนแทนเสียงหรือคำพูด เช่น อ่านหนังสือ เขียนหนังสือ, ลายลักษณ์อักษร เช่น ขอให้เขียนเป็นหนังสือไว้ด้วย, จดหมายที่มีไปมา เช่น หนังสือราชการ, เอกสาร, บทประพันธ์; ข้อความที่พิมพ์หรือเขียนเป็นต้นแล้วรวมเป็นเล่ม; (กฎ) เอกสาร ที่เขียนหรือพิมพ์ขึ้น" (พจนานุกรมฉบับราชบัณฑิตสถาน พ.ศ. 2542, น.1244)</marquee> 
    &nbsp;&nbsp;
      
      <asp:LinkButton ID="LinkButton3" runat="server" data-target="#myModal2" data-toggle="modal" class="btn btn-primary" style="width:200px">หนังสือที่ยืม</asp:LinkButton>
        &nbsp;<asp:LinkButton ID="LinkButton1" runat="server"  class="btn btn-warning" style="width:200px" OnClick="LinkButton1_Click">ออกระบบ</asp:LinkButton>
  </div>
</nav><br />
        <center><h1>เลือกหนังสือที่ท่านต้องการ</h1></center>
        <hr width="80%"/>
        
        
        
        <center>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <asp:Repeater ID="RepterDetails" runat="server">
            <HeaderTemplate>
                <div class="row">
                    
            </HeaderTemplate>
            <ItemTemplate>
                <div class="col-md-3">
                          
                <a href="buy.aspx?id=<%# Eval("id")%>"><img src='<%# Eval("image")%>' width="250px" class="rounded" style="margin-top:40px;margin-bottom:10px" height="340px"/></a>
                   
                
                     
                    </div>
            </ItemTemplate>
            <FooterTemplate>
                </div><br />
                <br />
            </FooterTemplate>
        </asp:Repeater>
            </div>
            <div class="col-md-1"></div>
            </center>
        
                                                                                       <!-- Modal2 -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Rent Book</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">     
            
            <h6>**คืนภายใน 7 วัน**</h6>
            <p></p>
               <asp:GridView ID="showbl4" runat="server"   OnRowCommand="GridView4_RowCommand"  EmptyDataText="ไม่พบข้อมูล" AutoGenerateColumns="false" class="table table-sm" width="100%" >
                <Columns>
                    <asp:templatefield Headertext="ID" >
                        <itemtemplate>
                            
                            <asp:Image ImageUrl='<%# Eval("image")%>' runat="server" Width="60px" />
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="หนังสือ">
                        <itemtemplate>
                            <br />
                            <asp:label id="name_book" Text ='<%# Eval("name_book")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                   
                    <asp:templatefield Headertext="จำนวน">
                        <itemtemplate>
                            <br />
                            <asp:label id="toltal" Text ='<%# Eval("toltal")%>' runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    

                    <asp:templatefield Headertext="วันที่ยืม">
                        <itemtemplate>
                            <br />
                            <asp:label id="date" Text ='<%#Eval("date") %>'  runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="วันที่ต้องคืน">
                        <itemtemplate>
                            <br />
                            <asp:label id="date7" Text ='<%#Eval("date7") %>'  runat="server"/>
                        </itemtemplate>
                    </asp:templatefield>

                    <asp:templatefield Headertext="คืน">
                        <itemtemplate>
                            <center>
                                <br />
                            <asp:LinkButton ID="Delete2" runat="server" Text="Delete" CommandArgument='<%# Eval("id") %>' CommandName="selectdel"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-right-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm2.5 8.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z"/>
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
    </form>
</body>
</html>
