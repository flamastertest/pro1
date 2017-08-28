<?php require "includes/_config.php"; ?>

<!doctype html>
<html lang="<?=$_SESSION['lang'];?>">

<head>
	<meta charset="utf-8">
	<title>Brata Konfigurator</title>
    <base href="<?=APP_PATH;?>" />	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
      <![endif]-->

	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous"> -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css"> -->
	<link rel="stylesheet" href="css/style.css">
    
	
</head>

<body>

<div class="container-fluid container-fluid-custom">
<?php  
if(isset($_POST['logged']) ){ $logged = $_POST['logged']; $_SESSION['logged'] = $logged; }   
cart($lacz); 
  
if(!isset($_SESSION['logged'])) {
    include_once("logowanie.php");    
    }  else {
 ?>     
   
        
		<div class="row menu-row">
			<div class="container menu-container-custom">
				<nav class="navbar navbar-default navbar-custom">
					<div class="navbar-header navbar-header-custom">
						<a href="#"><img class="img-responsive" src="img/logo.png" alt="logo"></a>
					</div>
					<div class="tabs-wrapper">
						<ul class="nav nav-tabs tabs-custom">
							<li id="tab1" class="active"><a data-toggle="tab" href="#1">1. typ komina</a></li>
							<li><a href="#2">2. rodzaj pustaka test3</a></li>
							<li><a href="#3">3. średnica wkładu ceramicznego</a></li>
							<li><a href="#4">4. wysokość komina</a></li>
							<li><a href="#5">5. akcesoria</a></li>
                            <li id="tab6" style="display:none"><a href="#6">6. Form</a></li>
							<!-- <li class="disabled"><a href="#2">2. rodzaj pustaka</a></li>
							<li class="disabled"><a href="#3">3. średnica wkładu ceramicznego</a></li>
							<li class="disabled"><a href="#4">4. wysokość komina</a></li>
							<li class="disabled"><a href="#5">5. akcesoria</a></li> -->
						</ul>
					</div>
				</nav>
			</div>
		</div>
		
		</div>
<?php } ?>        
	</div>
	<footer>
		<div class="container container-custom-footer">
			<div class="row">
				<div class="footer-logo-wrapper">
					<span>Copyright <i class="fa fa-copyright"></i> Wszelkie prawa zastrzeżone</span>
					<img src="img/logo-stopka.png" class="img-responsive">
				</div>
				<div class="social-media-wrapper">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
				</div>
			</div>
		</div>
	</footer>


    <script>
    $(function () {
        $('#order').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'includes/mail.php',
                data: $('form').serialize(),
				dataType : 'json'
            });
        });
    });
    </script>
</body>

</html>