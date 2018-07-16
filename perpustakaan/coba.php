<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post">
	<table align="center" cellspacing="0" cellpadding="5" border="1px">
		<tr>
			<td>nama</td>
			<td>tahun terbit</td>
			<td>sinopsis</td>
			<td>sampul</td>
			<td>berkas</td>
		</tr>
<?php
include 'connect.php';
$view = $dbconnect -> query ("SELECT * FROM buku");
while ($row=$view->fetch_array()) {
	# code...
	?>
	<tr>
		<td><?php echo $r['nama'];?></td>
		<td><?php echo $r['tahun_terbit'];?></td>
		<td><?php echo $r['sinopsis'];?></td>
		<td><?php echo $r['sampul'];?></td>
		<td><?php echo $r['berkas'];?></td>
		<td>
			<a href="edit.php?edit=<?php echo $row['id']; ?>">Edit</a> ||
            <a href="delete.php?del=<?php echo $row['id']; ?>">Hapus</a>
		</td>
	</tr>
}
?>
	</table>

	
</form>
</body>
</html>