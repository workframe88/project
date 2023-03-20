using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;
using MySql.Data.MySqlClient;
using System.IO;

namespace Photos_online
{
    public partial class register : System.Web.UI.Page
    {
        MySqlConnection conn = new MySqlConnection(@"Data Source=localhost;port=3306;Initial Catalog=photos_online;User Id=root;password='';convert zero datetime=True;charset=utf8");
        protected void Page_Load(object sender, EventArgs e)
        {
            Label2.ForeColor = System.Drawing.Color.White;
            Label2.Text = Session["email_users"].ToString();

            
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            conn.Open();

            if (TextBox1.Text != TextBox2.Text)
            {       
                Label1.Text = "รหัสผ่านไม่ตรงกัน";
            }
            else
            {
                MySqlCommand cmd = conn.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "INSERT INTO users (email_users,password_users) VALUES ('" + Label2.Text + "','" + TextBox1.Text + "')";
                cmd.ExecuteNonQuery();

                MySqlCommand cmd2 = conn.CreateCommand();
                cmd2.CommandType = CommandType.Text;
                cmd2.CommandText = "INSERT INTO image_users (name_image,email_users) VALUES ('Test','" + Label2.Text + "')";
                cmd2.ExecuteNonQuery();

                MySqlCommand cmd3 = conn.CreateCommand();
                cmd3.CommandType = CommandType.Text;
                cmd3.CommandText = "INSERT INTO type (name_type,id_users2) VALUES ('ทั้งหมด','" + Label2.Text + "')";
                cmd3.ExecuteNonQuery();

                try
                {
                    string sFolderPath;
                    string name = Label2.Text;
                    sFolderPath = "F:/ตัวติดตั้ง C#/ตัวติดตั้ง C#/Photos_online/Photos_online/photos_user/" + Label2.Text + "";            // THE PATH OF THE FOLDER.

                    Directory.CreateDirectory(sFolderPath);     // CREATE THE FOLDER (DIRECTORY).
                }
                catch
                {
                    //
                }

                Response.Redirect("login.aspx");
                conn.Close();
            }
        }

        protected void Button2_Click(object sender, EventArgs e)
        {
            TextBox1.Text = "";
            TextBox2.Text = "";
            Label1.Text = "";
        }


    }

    
}