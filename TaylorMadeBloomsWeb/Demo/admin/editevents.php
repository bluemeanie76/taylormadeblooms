<?php
include('security.php');
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
		
		
		<link rel="stylesheet" href="../assets/css/normalize.css" />
		<!--link rel="stylesheet" href="../assets/css/demo.css" /-->
		<link rel="stylesheet" href="../assets/css/component.css" />
		
        <meta name="description" content="Manchester Wedding Florist, Weddings and Funeral Flowers in Manchester ">
        <meta name="keywords" content="Manchester Wedding Florist,Manchester,Wedding,Funerals,Florist,Flowers, ">
        <meta name="author" content="Helen Taylor">
		<style>
		.smallimage{
			width:30%;
		}
		.item{
			background-color:#ffffff;
			padding-top:5px;
			padding-bottom:5px;
			border:solid black 1px;
		}
		.itemalt{
			background-color:silver;
			padding-top:5px;
			padding-bottom:5px;
			border:solid black 1px;
		}
		@media screen and (max-width: 480px)
		{
			input[type="submit"], input[type="reset"], input[type="button"], .button 
			{
				width:50%
			}
		}
		.box {
			background-color: #dfc8ca;
			padding: 6.25rem 1.25rem;
		}

		.box + .box {
			margin-top: 2.5rem;
		}
		
		.inputfile {
			width: 0.1px;
			height: 0.1px;
			opacity: 0;
			overflow: hidden;
			position: absolute;
			z-index: -1;
		}
				
		</style>
		<script>
		function validateform(){
			if(document.getElementById("fileToUpload").value != "") {
			   return true;
			}
			else{
				alert('Select a file dumbass!');
				return false;
			}
		}
		</script>
	</head>
	<body>

		<!-- Header -->
            <section id="header">   
				<header>
					<span class="image avatar"><img src="../images/helen.jpg" alt="Admin" /></span>
					<h1 id="logo"><a href="#">Admin</a></h1>
					<p>Admin section</p>
				</header>
				<nav id="nav">
					<ul>
                      <li><a href="editweddings.php"  >Weddings</a></li>
                        <li><a href="editfunerals.php">Funerals</a></li>
                        <li><a href="editevents.php" class="active">Occassions</a></li>
						<li><a href="editcorporate.php" >Corporate</a></li>
						<li><a href="logout.php" >Logout</a></li>
					</ul>
				</nav>
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
										<h2 style="font-family: blooms;">Occassions Editor</h2>
									</header>
                                    
                                    <div class="features">
										<article>
										
										<form action="upload.php" method="post" enctype="multipart/form-data" onsubmit="return validateform();">
											<input type="hidden" name="source" id="source" value="events">
											<input type="hidden" name="return" id="return" value="editevents.php">
											<input type="hidden" name="title" 	id="title" value="Events" >
											<!--input type="file" name="fileToUpload" id="fileToUpload"-->
											<div class="content">
												<div class="box">
													<input type="file" name="fileToUpload" id="fileToUpload" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
													<label for="fileToUpload"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
												</div>
												<input type="submit" value="Upload Image" name="submit">	
											</div>
											
										</form>
										
										
										<?php
											$path = '../gallerydata/events.xml';
											$feed = file_get_contents($path);
											$items = simplexml_load_string($feed);

											$i = 1;
											foreach($items->children() as $gallary) 
											{ 
												$class = "class=\"item\" ";
												if ($i % 2 == 0) {
												  $class = "class=\"itemalt\" ";
												}
												?>
												<div <?php echo $class; ?> >
												<form id="event<?php echo $i; ?>" action="processxml.php" method="post">
												<input type="hidden" id="source" 	name="source" 	value="events">
												<input type="hidden" id="return" 	name="return"  	value="editevents.php">
												<input type="hidden" id="id" 		name="id" 		value="<?php echo $gallary['imageid']; ?>" >
												<img class="smallimage" src="../<?php echo str_replace('admin','', $gallary->url); ?>" >
												<br/>
												<!--b>Title</b-->
												<input type="hidden" id="title" name="title" value="<?php echo $gallary->title; ?>" >
												<br/>
												<!--input type="submit" id="update" name="update" value="update" -->
												<input type="submit" id="delete" name="delete" value="delete" >
												
												</form>
												</div>
												<?php
												$i++;
											} 
									
										?>
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
			<script src="../assets/js/custom-file-input.js"></script>
	</body>
</html>