<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()>
Partial Class Form1
    Inherits System.Windows.Forms.Form

    'Form overrides dispose to clean up the component list.
    <System.Diagnostics.DebuggerNonUserCode()>
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Required by the Windows Form Designer
    Private components As System.ComponentModel.IContainer

    'NOTE: The following procedure is required by the Windows Form Designer
    'It can be modified using the Windows Form Designer.  
    'Do not modify it using the code editor.
    <System.Diagnostics.DebuggerStepThrough()>
    Private Sub InitializeComponent()
        Me.SaveFileDialog1 = New System.Windows.Forms.SaveFileDialog()
        Me.OpenFileDialog1 = New System.Windows.Forms.OpenFileDialog()
        Me.MenuStrip1 = New System.Windows.Forms.MenuStrip()
        Me.BestandToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.ExportToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.SluitenToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.Label1 = New System.Windows.Forms.Label()
        Me.lblIO = New System.Windows.Forms.Label()
        Me.txtBedragIO = New System.Windows.Forms.TextBox()
        Me.txtIO = New System.Windows.Forms.TextBox()
        Me.btnIO = New System.Windows.Forms.Button()
        Me.FolderBrowserDialog1 = New System.Windows.Forms.FolderBrowserDialog()
        Me.cbInkomst = New System.Windows.Forms.CheckBox()
        Me.cbUitgave = New System.Windows.Forms.CheckBox()
        Me.Label5 = New System.Windows.Forms.Label()
        Me.Label6 = New System.Windows.Forms.Label()
        Me.DataGridView1 = New System.Windows.Forms.DataGridView()
        Me.MenuStrip1.SuspendLayout()
        CType(Me.DataGridView1, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'OpenFileDialog1
        '
        Me.OpenFileDialog1.FileName = "OpenFileDialog1"
        '
        'MenuStrip1
        '
        Me.MenuStrip1.ImageScalingSize = New System.Drawing.Size(20, 20)
        Me.MenuStrip1.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.BestandToolStripMenuItem, Me.SluitenToolStripMenuItem})
        Me.MenuStrip1.Location = New System.Drawing.Point(0, 0)
        Me.MenuStrip1.Name = "MenuStrip1"
        Me.MenuStrip1.Padding = New System.Windows.Forms.Padding(5, 2, 0, 2)
        Me.MenuStrip1.Size = New System.Drawing.Size(768, 28)
        Me.MenuStrip1.TabIndex = 0
        Me.MenuStrip1.Text = "MenuStrip1"
        '
        'BestandToolStripMenuItem
        '
        Me.BestandToolStripMenuItem.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.ExportToolStripMenuItem})
        Me.BestandToolStripMenuItem.Name = "BestandToolStripMenuItem"
        Me.BestandToolStripMenuItem.Size = New System.Drawing.Size(76, 24)
        Me.BestandToolStripMenuItem.Text = "Bestand"
        '
        'ExportToolStripMenuItem
        '
        Me.ExportToolStripMenuItem.Name = "ExportToolStripMenuItem"
        Me.ExportToolStripMenuItem.Size = New System.Drawing.Size(135, 26)
        Me.ExportToolStripMenuItem.Text = "Export"
        '
        'SluitenToolStripMenuItem
        '
        Me.SluitenToolStripMenuItem.Name = "SluitenToolStripMenuItem"
        Me.SluitenToolStripMenuItem.Size = New System.Drawing.Size(68, 24)
        Me.SluitenToolStripMenuItem.Text = "Sluiten"
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.Location = New System.Drawing.Point(125, 151)
        Me.Label1.Margin = New System.Windows.Forms.Padding(4, 0, 4, 0)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(26, 17)
        Me.Label1.TabIndex = 3
        Me.Label1.Text = "IO:"
        '
        'lblIO
        '
        Me.lblIO.AutoSize = True
        Me.lblIO.Location = New System.Drawing.Point(160, 316)
        Me.lblIO.Margin = New System.Windows.Forms.Padding(4, 0, 4, 0)
        Me.lblIO.Name = "lblIO"
        Me.lblIO.Size = New System.Drawing.Size(20, 17)
        Me.lblIO.TabIndex = 7
        Me.lblIO.Text = "..."
        '
        'txtBedragIO
        '
        Me.txtBedragIO.Location = New System.Drawing.Point(87, 69)
        Me.txtBedragIO.Margin = New System.Windows.Forms.Padding(4)
        Me.txtBedragIO.Name = "txtBedragIO"
        Me.txtBedragIO.Size = New System.Drawing.Size(132, 22)
        Me.txtBedragIO.TabIndex = 9
        '
        'txtIO
        '
        Me.txtIO.Location = New System.Drawing.Point(87, 33)
        Me.txtIO.Margin = New System.Windows.Forms.Padding(4)
        Me.txtIO.Name = "txtIO"
        Me.txtIO.Size = New System.Drawing.Size(132, 22)
        Me.txtIO.TabIndex = 10
        '
        'btnIO
        '
        Me.btnIO.Location = New System.Drawing.Point(107, 101)
        Me.btnIO.Margin = New System.Windows.Forms.Padding(4)
        Me.btnIO.Name = "btnIO"
        Me.btnIO.Size = New System.Drawing.Size(100, 28)
        Me.btnIO.TabIndex = 11
        Me.btnIO.Text = "Submit"
        Me.btnIO.UseVisualStyleBackColor = True
        '
        'cbInkomst
        '
        Me.cbInkomst.AutoSize = True
        Me.cbInkomst.Location = New System.Drawing.Point(236, 33)
        Me.cbInkomst.Margin = New System.Windows.Forms.Padding(4)
        Me.cbInkomst.Name = "cbInkomst"
        Me.cbInkomst.Size = New System.Drawing.Size(78, 21)
        Me.cbInkomst.TabIndex = 17
        Me.cbInkomst.Text = "Inkomst"
        Me.cbInkomst.UseVisualStyleBackColor = True
        '
        'cbUitgave
        '
        Me.cbUitgave.AutoSize = True
        Me.cbUitgave.Location = New System.Drawing.Point(236, 69)
        Me.cbUitgave.Margin = New System.Windows.Forms.Padding(4)
        Me.cbUitgave.Name = "cbUitgave"
        Me.cbUitgave.Size = New System.Drawing.Size(78, 21)
        Me.cbUitgave.TabIndex = 18
        Me.cbUitgave.Text = "Uitgave"
        Me.cbUitgave.UseVisualStyleBackColor = True
        '
        'Label5
        '
        Me.Label5.AutoSize = True
        Me.Label5.Location = New System.Drawing.Point(17, 41)
        Me.Label5.Margin = New System.Windows.Forms.Padding(4, 0, 4, 0)
        Me.Label5.Name = "Label5"
        Me.Label5.Size = New System.Drawing.Size(49, 17)
        Me.Label5.TabIndex = 19
        Me.Label5.Text = "Naam:"
        '
        'Label6
        '
        Me.Label6.AutoSize = True
        Me.Label6.Location = New System.Drawing.Point(17, 73)
        Me.Label6.Margin = New System.Windows.Forms.Padding(4, 0, 4, 0)
        Me.Label6.Name = "Label6"
        Me.Label6.Size = New System.Drawing.Size(58, 17)
        Me.Label6.TabIndex = 20
        Me.Label6.Text = "Bedrag:"
        '
        'DataGridView1
        '
        Me.DataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize
        Me.DataGridView1.Location = New System.Drawing.Point(43, 193)
        Me.DataGridView1.Margin = New System.Windows.Forms.Padding(3, 2, 3, 2)
        Me.DataGridView1.Name = "DataGridView1"
        Me.DataGridView1.RowHeadersWidth = 51
        Me.DataGridView1.RowTemplate.Height = 24
        Me.DataGridView1.Size = New System.Drawing.Size(688, 150)
        Me.DataGridView1.TabIndex = 21
        '
        'Form1
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(8.0!, 16.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(768, 379)
        Me.Controls.Add(Me.DataGridView1)
        Me.Controls.Add(Me.Label6)
        Me.Controls.Add(Me.Label5)
        Me.Controls.Add(Me.cbUitgave)
        Me.Controls.Add(Me.cbInkomst)
        Me.Controls.Add(Me.btnIO)
        Me.Controls.Add(Me.txtIO)
        Me.Controls.Add(Me.txtBedragIO)
        Me.Controls.Add(Me.lblIO)
        Me.Controls.Add(Me.Label1)
        Me.Controls.Add(Me.MenuStrip1)
        Me.MainMenuStrip = Me.MenuStrip1
        Me.Margin = New System.Windows.Forms.Padding(4)
        Me.Name = "Form1"
        Me.Text = "Form1"
        Me.MenuStrip1.ResumeLayout(False)
        Me.MenuStrip1.PerformLayout()
        CType(Me.DataGridView1, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub

    Friend WithEvents SaveFileDialog1 As SaveFileDialog
    Friend WithEvents OpenFileDialog1 As OpenFileDialog
    Friend WithEvents MenuStrip1 As MenuStrip
    Friend WithEvents BestandToolStripMenuItem As ToolStripMenuItem
    Friend WithEvents ExportToolStripMenuItem As ToolStripMenuItem
    Friend WithEvents SluitenToolStripMenuItem As ToolStripMenuItem
    Friend WithEvents Label1 As Label
    Friend WithEvents lblIO As Label
    Friend WithEvents txtBedragIO As TextBox
    Friend WithEvents txtIO As TextBox
    Friend WithEvents btnIO As Button
    Friend WithEvents FolderBrowserDialog1 As FolderBrowserDialog
    Friend WithEvents cbInkomst As CheckBox
    Friend WithEvents cbUitgave As CheckBox
    Friend WithEvents Label5 As Label
    Friend WithEvents Label6 As Label
    Friend WithEvents DataGridView1 As DataGridView
End Class
