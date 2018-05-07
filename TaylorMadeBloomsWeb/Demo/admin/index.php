<?php
include('processlogin.php'); // Includes Login Script

if(isset($_SESSION['login_user']))
{
	header("location: editweddings.php");
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Taylor Made Blooms</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
        <link rel="stylesheet" href="../assets/css/additional.css" />

        <meta name="description" content="Manchester Wedding Florist, Weddings and Funeral Flowers in Manchester ">
        <meta name="keywords" content="Manchester Wedding Florist,Manchester,Wedding,Funerals,Florist,Flowers, ">
        <meta name="author" content="Helen Taylor">
		<style>
		@media screen and (max-width: 480px)
		{
			input[type="submit"], input[type="reset"], input[type="button"], .button 
			{
				width:30%
			}
		}
		</style>
	</head>
	<body>

		<!-- Header -->
            <section id="header">   
				<header>
					<span class="image avatar"><img src="../images/helen.jpg" alt="Admin" /></span>
					<h1 id="logo"><a href="#">Admin</a></h1>
					<p>Login</p>
				</header>

				<footer>
				</footer>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">

						<!-- One -->
							<section id="one">
								<div class="container">
									<header class="major">
										<h2 style="font-family: blooms;">Welcome Please Login</h2>
									</header>
                                    
                                    <div class="features">
										<article>
											<div class="inner">
												<form id="loginform" method="post" action="index.php">
												<p>
													Login Name:
													<input id="loginname" name="loginname" type="text" />
													<br/>
													Password:
													<input id="password" name="password" type="password" />
													<br/>
													<span syle="font-color:red;"><?php echo $error; ?></span>	
													<br/>
													<input id="login" name="login" type="submit" value="login" />
												</p>
												</form>
											</div>
										</article>
									</div>
         
								</div>
							</section>

					</div>

				<!-- Footer -->
					<section id="footer">
						<div class="container">
							<ul class="copyright">
								<li>&copy; taylormadeblooms.com 2016</li>
							</ul>
						</div>
					</section>

			</div>

		    <!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollzer.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	</body>
</html>