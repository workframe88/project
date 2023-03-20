using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;
using MySql.Data.MySqlClient;

namespace Photos_online
{
    public partial class edit_image : System.Web.UI.Page
    {
        MySqlConnection con = new MySqlConnection(@"Data Source=localhost;port=3306;Initial Catalog=photos_online;User Id=root;password='';convert zero datetime=True;charset=utf8");
        protected void Page_Load(object sender, EventArgs e)
        {
            Label1.ForeColor = System.Drawing.Color.White;
            type.ForeColor = System.Drawing.Color.White;
            Label1.Text = Session["email_users"].ToString();

            con.Open();
            MySqlCommand cmd = con.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "select * from users WHERE email_users = '" + Label1.Text + "'";
            cmd.Parameters.AddWithValue("@email_users", Label1.Text);
            cmd.CommandType = CommandType.Text;
            cmd.ExecuteNonQuery();
            DataTable dt = new DataTable();
            MySqlDataAdapter da = new MySqlDataAdapter(cmd);
            da.Fill(dt);
            
            DataRow row = dt.Rows[0];
            TextBox1.Text = row["name_users"].ToString();
            TextBox2.Text = row["lasname_users"].ToString();
            type.Text = row["lavel"].ToString();
        }

        protected void Button2_Click(object sender, EventArgs e)
        {
            if (type.Text == "1")
            {
                Session["email_users"] = Label1.Text;
                Response.Redirect("show.aspx");
            }
            else
            {
                Session["email_users"] = Label1.Text;
                Response.Redirect("home_user.aspx");
            }
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            string name = Request.Form["TextBox1"];
            string last = Request.Form["TextBox2"];
            
            MySqlCommand cmd = con.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "UPDATE users SET name_users = @name , lasname_users = @last WHERE email_users = '" + Label1.Text + "'";
            
            cmd.Parameters.AddWithValue("@name", name);
            cmd.Parameters.AddWithValue("@last", last);
            cmd.CommandType = CommandType.Text;
            cmd.ExecuteNonQuery();
            
            if (type.Text == "1")
            {
                Session["email_users"] = Label1.Text;
                Response.Redirect("show.aspx");
            }
            else
            {
                Session["email_users"] = Label1.Text;
                Response.Redirect("home_user.aspx");
            }
        }
    }
}