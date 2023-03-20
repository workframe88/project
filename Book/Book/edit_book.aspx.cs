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
    public partial class edit_book : System.Web.UI.Page
    {
        MySqlConnection con = new MySqlConnection(@"Data Source=localhost;port=3306;Initial Catalog=book;User Id=root;password='';convert zero datetime=True;charset=utf8");
        protected void Page_Load(object sender, EventArgs e)
        {
            if (!IsPostBack)
            {
                con.Open();

                MySqlCommand cmd1 = con.CreateCommand();
                cmd1.CommandType = CommandType.Text;
                cmd1.CommandText = "SELECT * FROM type where not id = '1'";
                cmd1.ExecuteNonQuery();
                DataTable dt1 = new DataTable();
                MySqlDataAdapter da1 = new MySqlDataAdapter(cmd1);
                da1.Fill(dt1);
                DropDownList1.DataSource = dt1;
                DropDownList1.DataBind();


                string id = Request.QueryString["id"];
                MySqlCommand cmd = con.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "select * from book where id = @id";
                cmd.Parameters.AddWithValue("@id", id);
                cmd.ExecuteNonQuery();
                DataTable dt = new DataTable();
                MySqlDataAdapter da = new MySqlDataAdapter(cmd);
                da.Fill(dt);
                foreach (DataRow dr in dt.Rows)
                {
                    DataRow row = dt.Rows[0];
                    TextBox1.Text = row["name_book"].ToString();
                    TextBox2.Text = row["price_book"].ToString();
                    TextBox3.Text = row["rent_book"].ToString();
                    TextBox4.Text = row["stok"].ToString();
                    TextBox5.Text = row["image"].ToString();

                }
            }
        }

        protected void Button2_Click(object sender, EventArgs e)
        {
            Response.Redirect("admin.aspx");
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            con.Open();
            string name = Request.Form["TextBox1"];
            string price = Request.Form["TextBox2"];
            string rent = Request.Form["TextBox3"];
            string stok = Request.Form["TextBox4"];
            string image = Request.Form["TextBox5"];
            string id = Request.QueryString["id"];
            string type = DropDownList1.SelectedValue;
            int p = int.Parse(price);
            int r = int.Parse(rent);
            int s = int.Parse(stok);

            MySqlCommand cmd = con.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "UPDATE book SET name_book = @name,price_book = @p , rent_book = @r , stok = @s , image = @image ,type = @type  WHERE id = @id";
            cmd.Parameters.AddWithValue("@id", id);
            cmd.Parameters.AddWithValue("@name", name);
            cmd.Parameters.AddWithValue("@p", p);
            cmd.Parameters.AddWithValue("@r", r);
            cmd.Parameters.AddWithValue("@s", s);
            cmd.Parameters.AddWithValue("@type", type);
            cmd.Parameters.AddWithValue("@image", image);
            cmd.CommandType = CommandType.Text;
            cmd.ExecuteNonQuery();
            Response.Redirect("admin.aspx");
        }
    }
}