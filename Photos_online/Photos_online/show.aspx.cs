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
    public partial class show : System.Web.UI.Page
    {
        MySqlConnection conn = new MySqlConnection(@"Data Source=localhost;port=3306;Initial Catalog=photos_online;User Id=root;password='';convert zero datetime=True;charset=utf8");
        protected void Page_Load(object sender, EventArgs e)
        {
            Label1.Text = Session["email_users"].ToString();
        conn.Open();
        MySqlCommand cmd = conn.CreateCommand();
        cmd.CommandType = CommandType.Text;
        cmd.CommandText = "select * from users INNER JOIN type ON id_users2 = users.email_users WHERE email_users = '" + Label1.Text + "'";
        cmd.ExecuteNonQuery();
        DataTable dt = new DataTable();
        MySqlDataAdapter da = new MySqlDataAdapter(cmd);
        da.Fill(dt);

        DropDownList1.DataSource = dt;
        DropDownList1.DataBind();

        DataRow row = dt.Rows[0];
        username.Text = row["name_users"].ToString();
        Lastname.Text = row["lasname_users"].ToString();

        MySqlCommand cmd_type = conn.CreateCommand();
        cmd_type.CommandType = CommandType.Text;
        cmd_type.CommandText = "select * from users INNER JOIN type ON id_users2 = users.email_users WHERE email_users = '" + Label1.Text + "'";
        cmd_type.ExecuteNonQuery();
        DataTable type = new DataTable();

        MySqlDataAdapter type1 = new MySqlDataAdapter(cmd_type);
        type1.Fill(type);

        DropDownList2.DataSource = type;
        DropDownList2.DataBind();

        MySqlCommand cmd2 = conn.CreateCommand();
        cmd2.CommandType = CommandType.Text;
        cmd2.CommandText = "SELECT *,COUNT(id_users2)-1 as `sum_type` FROM type INNER JOIN users ON users.email_users=id_users2 WHERE users.email_users = '" + Label1.Text + "'";
        cmd2.ExecuteNonQuery();
        DataTable dt2 = new DataTable();

        MySqlDataAdapter da2 = new MySqlDataAdapter(cmd2);
        da2.Fill(dt2);
        DataRow row2 = dt2.Rows[0];
        Label2.Text = row2["sum_type"].ToString();

        MySqlCommand cmd3 = conn.CreateCommand();
        cmd3.CommandType = CommandType.Text;
        cmd3.CommandText = "SELECT *,COUNT(name_image)as sum_image FROM `users`INNER JOIN (type INNER JOIN image_users on image_users.id_type = type.id_type) ON type.id_users2=users.email_users WHERE users.email_users = '" + Label1.Text + "'";
        cmd3.ExecuteNonQuery();
        DataTable dt3 = new DataTable();

        MySqlDataAdapter da3 = new MySqlDataAdapter(cmd3);
        da3.Fill(dt3);
        DataRow row3 = dt3.Rows[0];
        Label3.Text = row3["sum_image"].ToString();

        MySqlCommand cmd4 = conn.CreateCommand();
        cmd4.CommandType = CommandType.Text;
        cmd4.CommandText = "select *,COUNT(image_users.email_users)-1 as total from users INNER JOIN image_users on image_users.email_users=users.email_users WHERE users.lavel NOT LIKE'1' GROUP BY image_users.email_users";
        cmd4.ExecuteNonQuery();
        DataTable dt4 = new DataTable();
        MySqlDataAdapter da4 = new MySqlDataAdapter(cmd4);
        da4.Fill(dt4);
        showbl.DataSource = dt4;
        showbl.DataBind();
        }

        protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
        {
            if (e.CommandName == "selectdel")
            {
                string email_users = e.CommandArgument.ToString();
                Response.Write("Vendorid:" + email_users);

                MySqlCommand cmd = conn.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "DELETE FROM users WHERE email_users = @email_users";
                cmd.Parameters.AddWithValue("@email_users", email_users);
                cmd.CommandType = CommandType.Text;
                cmd.ExecuteNonQuery();

                
                MySqlCommand cmd2 = conn.CreateCommand();
                cmd2.CommandType = CommandType.Text;
                cmd2.CommandText = "DELETE FROM type WHERE id_users2 = @email_users";
                cmd2.Parameters.AddWithValue("@email_users", @email_users);
                cmd2.CommandType = CommandType.Text;
                cmd2.ExecuteNonQuery();

                MySqlCommand cmd3 = conn.CreateCommand();
                cmd3.CommandType = CommandType.Text;
                cmd3.CommandText = "DELETE FROM image_users WHERE email_users = @email_users";
                cmd3.Parameters.AddWithValue("@email_users", @email_users);
                cmd3.CommandType = CommandType.Text;
                cmd3.ExecuteNonQuery();

                
                    string sFolderPath;
                    sFolderPath = "F:/ตัวติดตั้ง C#/ตัวติดตั้ง C#/Photos_online/Photos_online/photos_user/" + @email_users + "";    // THE PATH OF THE FOLDER.
                    Directory.Delete(sFolderPath);          // DELETE THE FOLDER.
                

                Response.Redirect("show.aspx");
            }
            if (e.CommandName == "selectdel2")
            {
                string id_users = e.CommandArgument.ToString();
                Response.Redirect("edit_admin.aspx?id_users=" + id_users);
            }
            if (e.CommandName == "selectdel3")
            {
                string id_users = e.CommandArgument.ToString();
                
                MySqlCommand cmd = conn.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "UPDATE users SET password_users = '1234' WHERE id_users = @id_users";
                cmd.Parameters.AddWithValue("@id_users", id_users);
                cmd.CommandType = CommandType.Text;
                cmd.ExecuteNonQuery();
                Response.Redirect("show.aspx");
            }
        }
        
    }

    
}