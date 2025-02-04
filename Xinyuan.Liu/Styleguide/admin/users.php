<?php

include "../lib/php/functions.php";


$users = file_get_json("../data/users.json");

//file_put_contents json_encode explode $_POST
//CRUD, Create Read Update Delete

function showUserpage($user){

$classes = implode(",", $user->classes);


	//heredoc
	echo <<<HTML
	<nav class="nav nav-crumbs">
		<ul>
			<li><a href="admin/users.php">Back</a></li>
		</ul>
	</nav>
	<div>
		<H2>$user->name</H2>
	</div>
	<div>
		<strong>Type</strong>
		<span>$user->type</span>
	</div>
	<div>
		<strong>Email</strong>
		<span>$user->email</span>
	</div>
	<div>
		<strong>Classes</strong>
		<span>$classes</span>
	</div>

HTML;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Admin Page</title>

	<?php include "../parts/meta.php"; ?>

</head>
<body>

<header class="navbar">
	<div class="containter display-flex">
		<div class="flex-none">
			<h1>User Admin</h1></div>
		<div class="flex-stretch"></div>
		<nav class="nav nav-flex flex-none">
			<ul>
				<li><a href="admin/users.php">User List</a></li>
			</ul>
		</nav>
	</div>
</header>


<div class="container">
	<div class="card soft">

		<?php 

		if(isset($_GET['id'])) {
			showUserpage($users[$_GET['id']]);
		} else {

		 ?>
		<h2>User List</h2>

		<nav class="nav">
			<ul>
		<?php 

		for($i=0;$i<count($users);$i++){
			echo "<li>
				<a href='admin/users.php?id=$i'>{$users[$i]->name}</a>
				</li>";

		}

		?>
			</ul>
		</nav>

		<?php } ?>
	</div>
</div>

</body>
</html>

