using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using MySql.Data.MySqlClient;
using System.IO;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace FoldrajzGUI
{
    public partial class Form1 : Form
    {
        Button[] gombok;
        public Form1()
        {
            InitializeComponent();

            int width = this.ClientSize.Width;
            int height = this.ClientSize.Height;
            int wCount = width / 70;

            gombok = new Button[65];

            for (int i = 0; i < gombok.Length; i++)
            {
                gombok[i] = new Button();
                gombok[i].Location = new Point(i % wCount * 70, (i / wCount) * 25 + 150);
                gombok[i].Name = "button" + (i + 1).ToString();
                gombok[i].Size = new Size(70, 25);
                gombok[i].Text = (i + 1) + ". feladat".ToString();
                gombok[i].UseVisualStyleBackColor = true;

                gombok[i].Click += GombKattintas;

                this.Controls.Add(gombok[i]);

            }
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void GombKattintas(object sender, EventArgs e)
        {
            Button b = sender as Button;
            MessageBox.Show(b.Text + " gomb lett megnyomva");
        }

        private void button2_Click(object sender, EventArgs e) // letrehozas
        {
            try
            {
                string connStr = $"server={textBox2.Text};user={textBox3.Text};port={textBox4.Text};password={textBox5.Text}";
                MySqlConnection conn = new MySqlConnection(connStr);
                conn.Open();
                string sql_createDatabase = $"CREATE DATABASE {textBox1.Text} DEFAULT CHARACTER set utf8 COLLATE utf8_hungarian_ci;";
                MySqlCommand cmd_createDatabase = new MySqlCommand(sql_createDatabase, conn);
                cmd_createDatabase.ExecuteNonQuery();
                conn.Close();
                MessageBox.Show("Az adatbazis sikeresen letrejott!", "Siker", MessageBoxButtons.OK, MessageBoxIcon.Information);
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Hiba tortent", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private void button3_Click(object sender, EventArgs e) // torles
        {
            try
            {
                string connStr = $"server={textBox2.Text};user={textBox3.Text};port={textBox4.Text};password={textBox5.Text}";
                MySqlConnection conn = new MySqlConnection(connStr);
                conn.Open();
                string sql_drop = $"drop database {textBox1.Text}";
                MySqlCommand cmd_drop = new MySqlCommand(sql_drop, conn);
                cmd_drop.ExecuteNonQuery();
                conn.Close();
                MessageBox.Show("Az adatbazis sikeresen torolve lett!", "Siker", MessageBoxButtons.OK, MessageBoxIcon.Information);
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Hiba tortent", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private void textBox1_Click(object sender, EventArgs e)
        {
            //MessageBox.Show("A feladat hibatlan megoldasa miatt a szovegdoboz jelenleg csak olvashato!", "Figyelmeztetes", MessageBoxButtons.OK, MessageBoxIcon.Warning);
        }

        private void button1_Click(object sender, EventArgs e) // beillesztes
        {
            try
            {
                string connStr = $"server={textBox2.Text};user={textBox3.Text};port={textBox4.Text};password={textBox5.Text}";
                MySqlConnection conn = new MySqlConnection(connStr);
                conn.Open();
                string sql_useDatabase = $"use {textBox1.Text}";
                MySqlCommand cmd_useDatabase = new MySqlCommand(sql_useDatabase, conn);
                cmd_useDatabase.ExecuteNonQuery();

                /*string sql_createTable = File.ReadAllText("adatbazis.sql");
                MySqlCommand cmd_createTable = new MySqlCommand(sql_createTable, conn);
                cmd_createTable.ExecuteNonQuery();
                conn.Close();
                MessageBox.Show("Az adatfajl sikeresen beillesztesre kerult!", "Siker", MessageBoxButtons.OK, MessageBoxIcon.Information);*/

                string fileContent = string.Empty;
                string filePath = string.Empty;

                using (OpenFileDialog openFileDialog1 = new OpenFileDialog())
                {
                    openFileDialog1.InitialDirectory = "c:\\";
                    openFileDialog1.Filter = "SQL Database (*.sql)|*.sql";
                    openFileDialog1.FilterIndex = 1;
                    openFileDialog1.RestoreDirectory = true;

                    if (openFileDialog1.ShowDialog() == DialogResult.OK)
                    {
                        //Get the path of specified file
                        filePath = openFileDialog1.FileName;
                        //Read the contents of the file into a stream
                        var fileStream = openFileDialog1.OpenFile();

                        using (StreamReader reader1 = new StreamReader(fileStream))
                        {
                            fileContent = reader1.ReadToEnd();
                        }
                        string sql_insert = File.ReadAllText(filePath);
                        MySqlCommand cmd_insert = new MySqlCommand(sql_insert, conn);
                        cmd_insert.ExecuteNonQuery();
                        MessageBox.Show("Az SQL fajl sikeresen beillesztesre kerult!", "Siker", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        conn.Close();
                    }
                }


            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Hiba tortent", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private void button4_Click(object sender, EventArgs e) // 3. feladat
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

        private void button7_Click(object sender, EventArgs e) // Custom Command
        {
            try
            {
                if (textBox6.Text.Length >= 1)
                {
                    try
                    {
                        string connStr = $"server={textBox2.Text};user={textBox3.Text};port={textBox4.Text};password={textBox5.Text}";
                        MySqlConnection conn = new MySqlConnection(connStr);
                        conn.Open();
                        string sql_useDatabase = $"use {textBox1.Text}";
                        MySqlCommand cmd_useDatabase = new MySqlCommand(sql_useDatabase, conn);
                        cmd_useDatabase.ExecuteNonQuery();
                        string sql_insert = $"{textBox6.Text}";
                        MySqlCommand cmd = new MySqlCommand(sql_insert, conn);
                        cmd.ExecuteNonQuery();
                        listBox1.Items.Clear();
                        listBox1.Items.Add("Ez a parancs futott le:");
                        listBox1.Items.Add(" ");
                        listBox1.Items.Add(sql_insert);
                        MessageBox.Show("A feladat sikeresen lefutott!", "Siker", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show(ex.Message, "Hiba tortent", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
                else
                {
                    MessageBox.Show("A parancs nem lehet üres", "Hiba tortent", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Hiba tortent", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private void button8_Click(object sender, EventArgs e)
        {
            listBox1.Items.Clear();
        }

        /*
        SEGITSEG A FELADATOK MEGOLDASAHOZ
        ============================================================================================================================
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
                string sql_insert = "update diakok set kpmagy = 43 where oktazon = 0143302;";
                MySqlCommand cmd = new MySqlCommand(sql_insert, conn);
                cmd.ExecuteNonQuery();
                listBox1.Items.Clear();
                listBox1.Items.Add("Ez a parancs futott le:");
                listBox1.Items.Add(" ");
                listBox1.Items.Add(sql_insert);
                MessageBox.Show("A feladat sikeresen lefutott!", "Siker", MessageBoxButtons.OK, MessageBoxIcon.Information);
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Hiba tortent", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
        ============================================================================================================================
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
        ============================================================================================================================
        */
    }
}
