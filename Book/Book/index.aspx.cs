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
    public partial class index : System.Web.UI.Page
    {
        MySqlConnection con = new MySqlConnection(@"Data Source=localhost;port=3306;Initial Catalog=book;User Id=root;password='';convert zero datetime=True;charset=utf8");
        protected void Page_Load(object sender, EventArgs e)
        {
            Label1.ForeColor = System.Drawing.Color.SkyBlue;
            
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            con.Open();
            MySqlCommand cmd2 = con.CreateCommand();
            cmd2.CommandType = CommandType.Text;
            cmd2.CommandText = "SELECT * FROM user WHERE username = '" + TextBox1.Text + "'AND password = '" + TextBox2.Text + "'";
            cmd2.ExecuteNonQuery();
            DataTable dt2 = new DataTable();
            MySqlDataAdapter da2 = new MySqlDataAdapter(cmd2);
            da2.Fill(dt2);

            foreach (DataRow dr in dt2.Rows)
            {
                DataRow row = dt2.Rows[0];
                Label1.Text = row["level"].ToString();
                Session["name_user"] = row["name_user"].ToString();
                if (Label1.Text == "1")
                {
                    TextBox1.Text = "";
                    TextBox2.Text = "";
                    LinkButton1.Visible = false;
                    Label2.Visible = false;
                    Button3.Visible = true;
                    Button1.Visible = false;
                    
                }
                else
                {
                    Response.Redirect("user.aspx");
                }
            }
        }

        protected void Button3_Click(object sender, EventArgs e)
        {
            con.Open();
            MySqlCommand cmd = con.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "SELECT * FROM admin WHERE username = '" + TextBox1.Text + "'AND password = '" + TextBox2.Text + "'";
            cmd.ExecuteNonQuery();
            DataTable dt = new DataTable();
            MySqlDataAdapter da = new MySqlDataAdapter(cmd);
            da.Fill(dt);
            

            foreach (DataRow dr in dt.Rows)
            {
                DataRow row1 = dt.Rows[0];
                
                Session["name_admin"] = row1["name_admin"].ToString();
                Response.Redirect("admin.aspx");
            }    
        }

        protected void Button2_Click(object sender, EventArgs e)
        {
            con.Open();
            MySqlCommand cmd = con.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "INSERT INTO user (name_user,email,username,password) VALUES ('" + TextBox3.Text + "','" + TextBox4.Text + "','" + TextBox5.Text + "','" + TextBox6.Text + "')";
            cmd.ExecuteNonQuery();
            Response.Redirect("index.aspx");
        }

        

        
    }
}