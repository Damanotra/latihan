<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Barang</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($rows as $row): ?> echo 
		<tr>
			<td width="150">
				<?php echo $row->name ?> 
			</td>
			<td>
				<?php echo $row->email ?> 
			</td>
			<td>
				<?php echo $row->barang ?> 
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
</body>
</html>