
<?php

?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<title>My web page</title>
	<link rel="stylesheet", href="index.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="index.js"></script>
  </head>
  <body>
	  <!-- The Header -->
	  <header>
		<div>
			<h4>The logo</h4>
		</div>
		<div>
			  <h2 class="slogan">The header slogan</h2>
		</div>
		<div id="form">
			<ul>
				<li>Hi <span>Guest</span></li>
				<li><a href="javascript:void(0)" onclick="showLoginForm()">Login</a></li>
			</ul>

			<form id="login" method="post" action="/login">
				<input type="text" name="username" placeholder="User name" />
				<input type="password" name="password" placeholder="Password"/>
				<label><input type="checkbox" name="rememberUsername" />Remember user name </label>
				<button type="submit" name="Login">Login</button>
			</form>
			<form method="GET" id="search">
				<input type="text" name="keyword" />
				<i class="material-icons">search</i>
			</form>
		</div>
	  </header>

	  <!-- The menu -->
	  <nav>
		  <ul>
			  <li><a href="/">Home</a></li>
			  <li><a href="users">Users</a></li>
			  <li><a href="courses">Courses</a></li>
			  <li><a href="trainers">Trainers</a></li>
		  </ul>
	  </nav>

	  <!-- MAIN content -->
	  <div id="main">
			<div id="main-content">
				<h3> The main content go here</h3>
				<?php
				if (!isset($_SESSION['LOGGED_IN'])) {
					echo '<p style="color: red;">You are not logged in!!! please login to view more info</a>';
				}
				?>
			</div>
			<div id="sidebar">
				<h3> Sidebar </h3>
				<ul>
					<li>Feature 1</li>
					<li>Feature 2</li>
					<li>Feature 3</li>
					<li>Feature 4</li>
					<li>Feature 5</li>
					<li>Feature 6</li>
				</ul>
			</div>
	  </div>

	  <!-- END  MAIN content -->

	  <footer>
		  <ol>
			  <li>Extra info 1</li>
			  <li>Extra info 1</li>
		  </ol>
		  <h3> The footer</h3>
			<div id="scroll">
				<a href="javascript:void(0)" onclick="scrollToTop()">
				  <i class="material-icons">arrow_drop_up</i>
				</a>
		  </div>
	</footer>
  </body>
</html>

