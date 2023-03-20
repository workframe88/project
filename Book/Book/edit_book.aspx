<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="edit_book.aspx.cs" Inherits="Book.edit_book" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body style="background-color:#FFFFCC">
    <form id="form1" runat="server">
        <center><br /><br /><br />
        <h1>แก้ไขหนังสือ</h1></center>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="margin-top:50px">
                
                <asp:Label ID="Label1" runat="server" Text="ชื่อหนังสือ"></asp:Label>
                <asp:TextBox ID="TextBox1" runat="server" class="form-control"></asp:TextBox><p></p>
               <asp:Label ID="Label6" runat="server" Text="ประเภท "></asp:Label> <asp:DropDownList ID="DropDownList1" runat="server"  class="form-control" role="button"  data-toggle="dropdown" DataTextField="name_type" DataValueField="id" AutoPostBack="True"></asp:DropDownList>
                <p></p>
                <asp:Label ID="Label2" runat="server" Text="ราคาขาย"></asp:Label>
                <asp:TextBox ID="TextBox2" runat="server" class="form-control"></asp:TextBox><p></p>
                <asp:Label ID="Label3" runat="server" Text="ราคาเช่า"></asp:Label>
                <asp:TextBox ID="TextBox3" runat="server" class="form-control"></asp:TextBox><p></p>
                <asp:Label ID="Label4" runat="server" Text="คงเหลือ"></asp:Label>
                <asp:TextBox ID="TextBox4" runat="server" class="form-control"></asp:TextBox> <p></p>
                <asp:Label ID="Label5" runat="server" Text="รูปปก"></asp:Label>
                <asp:TextBox ID="TextBox5" runat="server" class="form-control"></asp:TextBox><br /><br />
                <asp:Button ID="Button1" runat="server" Text="เสร็จสิ้น" class="btn btn-primary" OnClick="Button1_Click"></asp:Button>
                <asp:Button ID="Button2" runat="server" Text="ยกเลิก" class="btn btn-warning" OnClick="Button2_Click"></asp:Button>
                    
            </div>
            <div class="col-md-4"></div>
       </div>
            
    </form>
</body>
</html>
