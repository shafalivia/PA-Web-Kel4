<!DOCTYPE html>
<html>
<head>
	<title>Gudetama Admin Dashboard</title>
	<style type="text/css">
		body {
			background-color: #FFF9C4;
		}
		.container {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
		.card {
			width: 250px;
			height: 300px;
			background-color:burlywood;
			box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.25);
			border-radius: 5px;
			margin: 0px 20px;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: space-evenly;
			cursor: pointer;
			transition: box-shadow 0.3s ease-in-out;
		}
		.card:hover {
			box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.3);
		}
		h2 {
			margin: 0px;
			font-size: 24px;
			color: #212121;
		}
		p {
			margin: 0px;
			font-size: 16px;
			color: #757575;
		}
		a {
			text-decoration: none;
		}
	</style>
</head>
<body>
    <h1>Gudetama Admin Dashboard</h1>
	<div class="container">
		<a href="edit-menu.php">
			<div class="card">
				<img src="https://www.sanrio.com/media/W1siZiIsIjIwMjEvMDkvMTIvMTcvMDkvMzEvNjMvZ3VkZXRhbWEuanBnIl0sWyJwIiwidGh1bWIiLCI4MDB4PiJdXQ/gudetama.jpg?sha=2d2c79a19e09b72c" alt="Edit Menu" width="150px" height="150px">
				<h2>Edit Menu</h2>
				<p>Edit the menu items</p>
			</div>
		</a>
		<a href="edit-datauser.php">
			<div class="card">
				<img src="https://www.sanrio.com/media/W1siZiIsIjIwMjEvMDkvMTIvMTcvMDkvMzEvNjIvZ3VkZXRhbWF1c2VyLmpwZyJdLFsicCIsInRodW1iIiwiODB4PiJdXQ/gudetamauser.jpg?sha=cf43f85ed1d63dd2" alt="Edit Data User" width="150px" height="150px">
				<h2>Edit Data User</h2>
				<p>Edit user data</p>
			</div>
		</a>
		<a href="edit-history.php">
			<div class="card">
				<img src="">
				<h2>Edit Riwayat Transaksi</h2>
				<p>Edit Riwayat Transaksi</p>
			</div>