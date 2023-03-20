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
    public partial class buy : System.Web.UI.Page
    {
        MySqlConnection con = new MySqlConnection(@"Data Source=localhost;port=3306;Initial Catalog=book;User Id=root;password='';convert zero datetime=True;charset=utf8");
        protected void Page_Load(object sender, EventArgs e)
        {
            
                con.Open();
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
                    Label1.Text = row["name_book"].ToString();
                    Label3.Text = row["price_book"].ToString();
                    Label4.Text = row["rent_book"].ToString();
                    Label5.Text = row["stok"].ToString();
                    Session["image"] = row["image"].ToString();
                    Session["id"] = row["id"].ToString();
                }
                if (Label5.Text == "0") {
                    Response.Redirect("user.aspx");
                }
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            if (TextBox1.Text == "")
            {
                //
            }
            else
            {
                string number = Request.Form["TextBox1"];
                string stok = Label5.Text;
                string id = Request.QueryString["id"];
                int t1 = int.Parse(number);
                int t = int.Parse(stok);

                if (t1 <= 0 || t1 > t)
                {
                    // 
                }
                else
                {
                    int sum = t - t1;
                    MySqlCommand cmd = con.CreateCommand();
                    cmd.CommandType = CommandType.Text;
                    cmd.CommandText = "UPDATE book SET stok = @sum WHERE id = @id";
                    cmd.Parameters.AddWithValue("@id", id);
                    cmd.Parameters.AddWithValue("@sum", sum);
                    cmd.CommandType = CommandType.Text;
                    cmd.ExecuteNonQuery();
                    string id2 = Session["id"].ToString();
                    string name = Session["name_user"].ToString();
                    MySqlCommand cmd2 = con.CreateCommand();
                    cmd2.CommandType = CommandType.Text;
                    cmd2.CommandText = "INSERT INTO rent_book (name_book,toltal,date,date7,name_user,status,id_book) VALUES ('" + Label1.Text + "','" + number + "', now() ,DATE_ADD(date,INTERVAL 7 DAY),'" + name + "','2','" + id2 + "')";
                    cmd2.ExecuteNonQuery();

                    Response.Redirect("buy.aspx?id=" + id);
                }
            }
        }

        protected void Button2_Click(object sender, EventArgs e)
        {
            if (TextBox1.Text == "")
            { 
                //
            }
            else { 
            string number = Request.Form["TextBox1"];
            string stok = Label5.Text;
            string id = Request.QueryString["id"];
            int t1 = int.Parse(number);
            int t = int.Parse(stok);

            if (t1 <= 0 || t1 > t)
            {
                // 
            }
            else
            {
                int sum = t - t1;
                MySqlCommand cmd = con.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "UPDATE book SET stok = @sum WHERE id = @id";
                cmd.Parameters.AddWithValue("@id", id);
                cmd.Parameters.AddWithValue("@sum", sum);
                cmd.CommandType = CommandType.Text;
                cmd.ExecuteNonQuery();
                string id2 = Session["id"].ToString();
                string name = Session["name_user"].ToString();
                MySqlCommand cmd2 = con.CreateCommand();
                cmd2.CommandType = CommandType.Text;
                cmd2.CommandText = "INSERT INTO rent_book (name_book,toltal,date,date7,name_user,id_book) VALUES ('" + Label1.Text + "','" + number + "', now() ,DATE_ADD(date,INTERVAL 7 DAY),'" + name + "','" + id2 + "')";
                cmd2.ExecuteNonQuery();

                Response.Redirect("buy.aspx?id=" + id);
            }
            }
        }

        protected void Button3_Click(object sender, EventArgs e)
        {
            Response.Redirect("user.aspx");
        }
    }
}