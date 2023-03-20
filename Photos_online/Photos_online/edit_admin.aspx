<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="edit_admin.aspx.cs" Inherits="Photos_online.edit_admin" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
        <asp:Label ID="Label1" runat="server" Text="แก้ไขข้อมูล"></asp:Label>
        <br />
        <asp:Label ID="Label2" runat="server" Text="รหัส"></asp:Label>
        <asp:Label ID="Label3" runat="server" Text=""></asp:Label>
        <br />
        <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
    
        <br />
        <br />
        <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
    
        </p>
        <asp:Button ID="Button1" runat="server" Text="Button" OnClick="Button1_Click" />
        <br />
    </div>
    </form>
</body>
</html>
