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
    public partial class user : System.Web.UI.Page
    {
        MySqlConnection con = new MySqlConnection(@"Data Source=localhost;port=3306;Initial Catalog=book;User Id=root;password='';convert zero datetime=True;charset=utf8");
        protected void Page_Load(object sender, EventArgs e)
        {
            if (Session["name_user"] == null) {
                
                Response.Redirect("index.aspx");
            }
            if (!IsPostBack)
            {
                con.Open();
                Label1.Text = Session["name_user"].ToString();
                MySqlCommand cmd = con.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "SELECT * FROM book where not stok ='0'";
                cmd.ExecuteNonQuery();
                DataTable dt = new DataTable();
                MySqlDataAdapter da = new MySqlDataAdapter(cmd);
                da.Fill(dt);
                RepterDetails.DataSource = dt;
                RepterDetails.DataBind();

                MySqlCommand cmd1 = con.CreateCommand();
                cmd1.CommandType = CommandType.Text;
                cmd1.CommandText = "SELECT * FROM type";
                cmd1.ExecuteNonQuery();
                DataTable dt1 = new DataTable();
                MySqlDataAdapter da1 = new MySqlDataAdapter(cmd1);
                da1.Fill(dt1);
                DropDownList1.DataSource = dt1;
                DropDownList1.DataBind();

                MySqlCommand cmd2 = con.CreateCommand();
                cmd2.CommandType = CommandType.Text;
                cmd2.CommandText = "select *,image from rent_book INNER JOIN book on book.id = rent_book.id_book where name_user = '"+ Label1.Text +"' and status ='0'";
                cmd2.ExecuteNonQuery();
                DataTable dt2 = new DataTable();
                MySqlDataAdapter da2 = new MySqlDataAdapter(cmd2);
                da2.Fill(dt2);
                showbl4.DataSource = dt2;
                showbl4.DataBind();

                con.Close();
            }
        }

        protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
        {
            con.Open();            
            if (DropDownList1.SelectedValue == "1")
            {
                Response.Redirect("user.aspx");
            }
            MySqlCommand cmd_re = con.CreateCommand();
            cmd_re.CommandType = CommandType.Text;
            cmd_re.CommandText = "SELECT * FROM book where type ='" + DropDownList1.SelectedValue + "' and  not stok ='0'";
            cmd_re.ExecuteNonQuery();
            DataTable dt_re1 = new DataTable();
            MySqlDataAdapter da_re = new MySqlDataAdapter(cmd_re);
            da_re.Fill(dt_re1);
            RepterDetails.DataSource = dt_re1;
            RepterDetails.DataBind();
        }

        protected void GridView4_RowCommand(object sender, GridViewCommandEventArgs e)
        {
            con.Open();
            if (e.CommandName == "selectdel")
            {

                string id = e.CommandArgument.ToString();
                Response.Write("Vendorid:" + id);
                
                MySqlCommand cmd = con.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "UPDATE rent_book SET status = '1' WHERE id = @id";
                cmd.Parameters.AddWithValue("@id", id);
                cmd.Parameters.AddWithValue("status", 1);
                cmd.CommandType = CommandType.Text;
                cmd.ExecuteNonQuery();
                Response.Redirect("user.aspx");
            }
        }

        protected void LinkButton1_Click(object sender, EventArgs e)
        {
            Session.Contents.RemoveAll();
            Response.Redirect("index.aspx");
        }

       
    }
}