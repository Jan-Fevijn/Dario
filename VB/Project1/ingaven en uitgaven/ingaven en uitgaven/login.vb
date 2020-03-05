Imports System.IO
Imports MySql.Data.MySqlClient
Public Class login
    Public connstring As String = "server=localhost;Port=3307;database=project1;uid=root;password=usbw;"
    Public conn As New MySqlConnection(connstring)

    Private Sub OK_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles OK.Click

        Dim command As New MySqlCommand("SELECT `Gebruikersnaam`, `Wachtwoord` from `gebruiker` where `Gebruikersnaam` = @username and `Wachtwoord` = @ww", conn)

        conn.Open()

        command.Parameters.Add("@username", MySqlDbType.VarChar).Value = txtgebr.Text
        command.Parameters.Add("@ww", MySqlDbType.VarChar).Value = txtpass.Text

        Dim adapter As New MySqlDataAdapter(command)
        Dim tblgbr As New DataTable()

        adapter.Fill(tblgbr)

        If tblgbr.Rows.Count = 0 Then
            MessageBox.Show("niet correct")
            txtgebr.Clear()
            txtpass.Clear()
        Else
            MessageBox.Show("ingelogd")
            Form1.Show()
            Me.Hide()
            conn.Close()
        End If
    End Sub

    Private Sub Cancel_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Cancel.Click
        Me.Close()
    End Sub

    Private Sub login_Load(sender As Object, e As EventArgs) Handles MyBase.Load

    End Sub
End Class
