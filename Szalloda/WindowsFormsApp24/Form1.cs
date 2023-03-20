using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Diagnostics;
using System.Text;
using System.Linq;
using System.IO;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace WindowsFormsApp24
{
    public partial class frmMain : Form
    {
        public frmMain()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void pictureBox3_Click(object sender, EventArgs e)
        {

        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {
            frmFoglalas frmFoglalas = new frmFoglalas();
            frmFoglalas.Show();
        }

        private void button1_Click(object sender, EventArgs e)
        {

        }

        /*
        SEGITSEG A FELADATOK MEGOLDASAHOZ
        ============================================
        
        private void button10_Click(object sender, EventArgs e)
        {
            try
            {
                string connStr = $"server={textBox2.Text};user={textBox3.Text};port={textBox4.Text};password={textBox5.Text}";
                MySqlConnection conn = new MySqlConnection(connStr);
                conn.Open();
                string sql_useDatabase = $"use {textBox1.Text}";
                MySqlCommand cmd_useDatabase = new MySqlCommand(sql_useDatabase, conn);
                cmd_useDatabase.ExecuteNonQuery();
                string sql_insert = "";
                MySqlCommand cmd = new MySqlCommand(sql_insert, conn);
                MessageBox.Show("A feladat sikeresen lefutott!", "Siker", MessageBoxButtons.OK, MessageBoxIcon.Information);
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Hiba tortent", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
        ============================================
        private void button5_Click(object sender, EventArgs e)
        {
            try
            {
                string connStr = $"server={textBox2.Text};user={textBox3.Text};port={textBox4.Text};password={textBox5.Text}";
                MySqlConnection conn = new MySqlConnection(connStr);
                conn.Open();
                string sql_useDatabase = $"use {textBox1.Text}";
                MySqlCommand cmd_useDatabase = new MySqlCommand(sql_useDatabase, conn);
                cmd_useDatabase.ExecuteNonQuery();
                string sql_select = "";
                MySqlCommand cmd = new MySqlCommand(sql_select, conn);
                MySqlDataReader rdr = cmd.ExecuteReader();
                listBox1.Items.Clear();
                listBox1.Items.Add($"nev, kerulet");
                while (rdr.Read())
                {
                    listBox1.Items.Add($"{rdr[0]}, {rdr[1]}");
                }
                rdr.Close();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Hiba tortent", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
        ============================================
        */
    }
}
