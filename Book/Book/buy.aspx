<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="buy.aspx.cs" Inherits="Book.buy" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Buy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body style="background-color:#d2ebfd">
    <form id="form1" runat="server">
        <br />
        <br />
        
        <br />
        
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <img src='<%= Session["image"]%>' alt="Alternate Text" width="400px" class="rounded" style="margin-top:40px"/>
            </div>
            <div class="col-md-7">
                <center>
                    <font style="font-size:70px"><asp:Label ID="Label1" runat="server" Text=""></asp:Label></font>
        </center>
               
                <asp:Label ID="Label2" runat="server" Text=""></asp:Label>
                <h3>   
            ราคาขาย : <asp:Label ID="Label3" runat="server" Text="Label"></asp:Label> บาท
                    <p></p>
            ราคาเช่า &nbsp;: <asp:Label ID="Label4" runat="server" Text="Label"></asp:Label> บาท
                    <p></p>
                    <br />
                    <br />
            จำนวนที่มีอยู่ : <asp:Label ID="Label5" runat="server" Text="Label"></asp:Label> เล่ม <br />
                    <br />
            <center>
             ต้องการ : <asp:TextBox ID="TextBox1" runat="server" Width="100px" placeholder="จำนวน"></asp:TextBox> เล่ม </center>
                    </h3>
                    <p style="margin-top:10%"></p>
                <center>
                <asp:Button ID="Button1" runat="server" Text="ซื้อ" width="400px" class="btn btn-primary" OnClick="Button1_Click"/>&nbsp;
                <asp:Button ID="Button2" runat="server" Text="เช่า" width="400px" class="btn btn-warning" OnClick="Button2_Click"/> <p></p>
                  <asp:Button ID="Button3" runat="server" Text="กลับ" width="800px" class="btn btn-primary" OnClick="Button3_Click"/>  
            </center>
            </div>
        </div>
        
    </form>
</body>
</html>
