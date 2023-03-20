using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;
using MySql.Data.MySqlClient;

namespace Book
{
    public partial class admin : System.Web.UI.Page
    {
        MySqlConnection con = new MySqlConnection(@"Data Source=localhost;port=3306;Initial Catalog=book;User Id=root;password='';convert zero datetime=True;charset=utf8");
        protected void Page_Load(object sender, EventArgs e)
        {
            if (Session["name_admin"] == null)
            {

                Response.Redirect("index.aspx");
            }
            if (!IsPostBack)
            {
                Label7.Text = Session["name_admin"].ToString(); 
                con.Open();
                MySqlCommand cmd41 = con.CreateCommand();
                cmd41.CommandType = CommandType.Text;
                cmd41.CommandText = "select * from user WHERE not level=1";
                cmd41.ExecuteNonQuery();
                DataTable dt41 = new DataTable();
                MySqlDataAdapter da41 = new MySqlDataAdapter(cmd41);
                da41.Fill(dt41);
                showbl2.DataSource = dt41;
                showbl2.DataBind();

                
                MySqlCommand cmd4 = con.CreateCommand();
                cmd4.CommandType = CommandType.Text;
                cmd4.CommandText = "select *,name_type from book inner join type on type.id = book.type";
                cmd4.ExecuteNonQuery();
                DataTable dt4 = new DataTable();
                MySqlDataAdapter da4 = new MySqlDataAdapter(cmd4);
                da4.Fill(dt4);
                showbl3.DataSource = dt4;
                showbl3.DataBind();

                
                MySqlCommand cmd = con.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "select * from rent_book INNER JOIN book on book.id = rent_book.id_book";
                cmd.ExecuteNonQuery();
                DataTable dt = new DataTable();
                MySqlDataAdapter da = new MySqlDataAdapter(cmd);
                da.Fill(dt);
                showbl4.DataSource = dt;
                showbl4.DataBind();

                MySqlCommand cmd1 = con.CreateCommand();
                cmd1.CommandType = CommandType.Text;
                cmd1.CommandText = "SELECT * FROM type where not id = '1'";
                cmd1.ExecuteNonQuery();
                DataTable dt1 = new DataTable();
                MySqlDataAdapter da1 = new MySqlDataAdapter(cmd1);
                da1.Fill(dt1);
                DropDownList1.DataSource = dt1;
                DropDownList1.DataBind();
                GridView1.DataSource = dt1;
                GridView1.DataBind();
            }
        }

        protected void GridView2_RowCommand(object sender, GridViewCommandEventArgs e)
        {
            con.Open();
            if (e.CommandName == "selectdel")
            {
                
                string id = e.CommandArgument.ToString();
                Response.Write("Vendorid:" + id);

                MySqlCommand cmd = con.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "DELETE FROM user WHERE id = @id";
                cmd.Parameters.AddWithValue("@id", id);
                cmd.CommandType = CommandType.Text;
                cmd.ExecuteNonQuery();
                Response.Redirect("admin.aspx");
            }
        }
        protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
        {
            con.Open();
            if (e.CommandName == "selectdel")
            {

                string id = e.CommandArgument.ToString();
                Response.Write("Vendorid:" + id);

                MySqlCommand cmd = con.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "DELETE FROM type WHERE id = @id";
                cmd.Parameters.AddWithValue("@id", id);
                cmd.CommandType = CommandType.Text;
                cmd.ExecuteNonQuery();
                Response.Redirect("admin.aspx");
            }
        }

        protected void GridView3_RowCommand(object sender, GridViewCommandEventArgs e)
        {
            if (e.CommandName == "selectdel")
            {
                con.Open();
                string id = e.CommandArgument.ToString();
                Response.Write("Vendorid:" + id);

                MySqlCommand cmd = con.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "DELETE FROM book WHERE id = @id";
                cmd.Parameters.AddWithValue("@id", id);
                cmd.CommandType = CommandType.Text;
                cmd.ExecuteNonQuery();
                Response.Redirect("admin.aspx");
            }
            if (e.CommandName == "edit")
            {
                string id = e.CommandArgument.ToString();
                Response.Redirect("edit_book.aspx?id=" + id);
            }
        }

        protected void GridView4_RowCommand(object sender, GridViewCommandEventArgs e)
        {
            if (e.CommandName == "selectdel")
            {
                con.Open();
                string id = e.CommandArgument.ToString();
                Response.Write("Vendorid:" + id);

                MySqlCommand cmd = con.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "DELETE FROM rent_book WHERE rent_book.id = @id";
                cmd.Parameters.AddWithValue("@id", id);
                cmd.CommandType = CommandType.Text;
                cmd.ExecuteNonQuery();
                Response.Redirect("admin.aspx");
            }
        }

        protected void LinkButton5_Click(object sender, EventArgs e)
        {
            con.Open();
            MySqlCommand cmd = con.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "INSERT INTO book (name_book,type,price_book,rent_book,stok,image) VALUES ('" + TextBox1.Text + "','" + DropDownList1.SelectedValue + "','" + TextBox2.Text + "','" + TextBox3.Text + "','" + TextBox4.Text + "','" + TextBox5.Text + "')";
            cmd.ExecuteNonQuery();
            Response.Redirect("admin.aspx");
        }
        protected void LinkButton8_Click(object sender, EventArgs e)
        {
            con.Open();
            MySqlCommand cmd = con.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "INSERT INTO type (name_type) VALUES ('" + TextBox6.Text + "')";
            cmd.ExecuteNonQuery();
            Response.Redirect("admin.aspx");
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            Session.Contents.RemoveAll();
            Response.Redirect("index.aspx");
        }
    }
}