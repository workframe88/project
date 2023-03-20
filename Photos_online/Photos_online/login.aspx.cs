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
    public partial class login : System.Web.UI.Page
    {
        MySqlConnection conn = new MySqlConnection(@"Data Source=localhost;port=3306;Initial Catalog=photos_online;User Id=root;password='';convert zero datetime=True;charset=utf8");
        protected void Page_Load(object sender, EventArgs e)
        {
            Label1.ForeColor = System.Drawing.Color.White;
            type.ForeColor = System.Drawing.Color.White;
            Label1.Text = Session["email_users"].ToString();

            conn.Open();
            MySqlCommand cmd = conn.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "SELECT * FROM users WHERE email_users = '" + Label1.Text + "'";
            cmd.ExecuteNonQuery();
            DataTable dt = new DataTable();
            MySqlDataAdapter da = new MySqlDataAdapter(cmd);
            da.Fill(dt);
            DataRow row = dt.Rows[0];
            type.Text = row["lavel"].ToString();
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            
            MySqlCommand cmd2 = conn.CreateCommand();
            cmd2.CommandType = CommandType.Text;
            cmd2.CommandText = "SELECT * FROM users WHERE email_users = '" + Label1.Text + "'AND password_users = '" + pass.Text + "'";
            cmd2.ExecuteNonQuery();
            DataTable dt2 = new DataTable();
            MySqlDataAdapter da2 = new MySqlDataAdapter(cmd2);
            da2.Fill(dt2);
            
            foreach (DataRow dr in dt2.Rows)
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
            conn.Close();
            //Label1.Text = "Username or password is incorrect";
        }
    }
}