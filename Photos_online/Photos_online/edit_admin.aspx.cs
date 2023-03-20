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
    public partial class edit_admin : System.Web.UI.Page
    {
        MySqlConnection con = new MySqlConnection(@"Data Source=localhost;port=3306;Initial Catalog=photos_online;User Id=root;password='';convert zero datetime=True");
        protected void Page_Load(object sender, EventArgs e)
        {
            Label3.Text = Request.QueryString["id_users"];
            string id_users = Request.QueryString["id_users"];
            con.Open();
            MySqlCommand cmd = con.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "select * FROM users WHERE users.id_users = @id_users";
            cmd.Parameters.AddWithValue("@id_users", id_users);
            cmd.CommandType = CommandType.Text;
            cmd.ExecuteNonQuery();
            DataTable dt = new DataTable();
            MySqlDataAdapter da = new MySqlDataAdapter(cmd);
            da.Fill(dt);
            da.Fill(dt);
            DataRow row = dt.Rows[0];
            TextBox1.Text = row["email_users"].ToString();
            TextBox2.Text = row["password_users"].ToString();
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            string email = Request.Form["TextBox1"];
            string pass = Request.Form["TextBox2"];
            string id = Request.QueryString["id_users"];
            MySqlCommand cmd = con.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "UPDATE users SET email_users = @email , password_users = @pass where id_users = @id";
            cmd.Parameters.AddWithValue("@id", id);
            cmd.Parameters.AddWithValue("@email", email);
            cmd.Parameters.AddWithValue("@pass", pass);
            cmd.CommandType = CommandType.Text;
            
            cmd.ExecuteNonQuery();
            
            Response.Redirect("show.aspx");
            
            
           
        }
    }
}