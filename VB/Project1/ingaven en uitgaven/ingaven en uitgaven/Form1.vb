Imports MySql.Data.MySqlClient
Imports System.IO

Public Class Form1
    Public ds As New DataSet("pj1")
    Dim tblcode = New DataTable("code")
    Dim tblverrichting = New DataTable("verrichtingen")
    Dim tblgebruiker = New DataTable("gebruiker")
    Dim tblshow = New DataTable("show")
    Public connstring As String = "server=localhost;Port=3307;database=project1;uid=root;password=usbw;"
    Public conn As New MySqlConnection(connstring)
    'databanken
    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load

        Dim cmd As New MySqlCommand

        'query 1
        Dim gbrQuery As String = "select * from gebruiker"
        cmd.Connection = conn
        cmd.CommandText = gbrQuery
        conn.Open()
        Dim rd As MySqlDataReader
        rd = cmd.ExecuteReader()
        tblgebruiker.Load(rd)
        ds.Tables.Add(tblgebruiker)

        'query 2
        Dim IOQuery As String = "select * from io"
        cmd.Connection = conn
        cmd.CommandText = IOQuery
        rd = cmd.ExecuteReader()
        tblcode.Load(rd)
        ds.Tables.Add(tblcode)

        'query 3
        Dim verquery As String = "select * from verrichting"
        cmd.Connection = conn
        cmd.CommandText = verquery
        rd = cmd.ExecuteReader()
        tblverrichting.Load(rd)
        ds.Tables.Add(tblverrichting)

        'query 4
        Dim showquery As String = "select * from verrichtinginfo"
        cmd.Connection = conn
        cmd.CommandText = showquery
        rd = cmd.ExecuteReader()
        tblshow.Load(rd)
        ds.Tables.Add(tblshow)

        'data tonen 
        DataGridView1.DataSource = tblshow
        DataGridView1.Refresh()

        conn.Close()
    End Sub

    'Alle buttons/clicks
    Private Sub SluitenToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles SluitenToolStripMenuItem.Click
        Me.Close()
    End Sub

    Private Sub btnIO_Click(sender As Object, e As EventArgs) Handles btnIO.Click
        'insert query
        Dim insert As New MySqlCommand("INSERT INTO io (omschrijving, IO) VALUES (@omschrijving, @IO);")

        conn.Open()

        insert.Parameters.Add("@omschrijving", MySqlDbType.VarChar).Value = txtIO.Text
        insert.Parameters.Add("@IO", MySqlDbType.VarChar).Value = cbInkomst.Checked Or cbUitgave.Checked

        Dim adapter As New MySqlDataAdapter(insert)

        adapter.Fill(tblcode)

        If tblcode.Rows.Count = 0 Then
            MessageBox.Show("niet gelukt")
            txtIO.Clear()
            txtBedragIO.Clear()
        Else
            MessageBox.Show("toegevoegd")
        End If

        Dim insertbd As New MySqlCommand("INSERT INTO verrichting (bedrag) VALUES (@bedrag);")

        insertbd.Parameters.Add("@bedrag", MySqlDbType.VarChar).Value = txtBedragIO.Text

        Dim adapterdb As New MySqlDataAdapter(insertbd)

        adapterdb.Fill(tblverrichting)

        If tblverrichting.Rows.Count = 0 Then
            MessageBox.Show("niet gelukt")
            txtIO.Clear()
            txtBedragIO.Clear()
        Else
            MessageBox.Show("toegevoegd")
            conn.Close()
        End If
    End Sub

    Private Sub ExportToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles ExportToolStripMenuItem.Click
        BestandOpslaan("", BrowseFolder())
    End Sub

    'subs en functions
    Public Sub BestandOpslaan(ByVal gbrNaam As String, ByVal path As String)
        Dim file As StreamWriter
        file = My.Computer.FileSystem.OpenTextFileWriter(path + "\bank.txt", False)

        Using file
            For row As Integer = 0 To tblshow.RowCount - 1
                For col As Integer = 0 To tblshow.ColumnCount - 1
                    file.WriteLine(tblshow.Rows(row).Cells(col).Value.ToString)
                Next
            Next
        End Using

        file.Close()
    End Sub

    Private Function BrowseFolder() As String
        If (FolderBrowserDialog1.ShowDialog() = DialogResult.OK) Then
            Return FolderBrowserDialog1.SelectedPath
        Else
            Return “no-path”
        End If
    End Function
End Class
