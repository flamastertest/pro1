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
							<li><a href="#2">2. rodzaj pustaka test2</a></li>
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
		<div class="row">
			<div class="container container-custom">
				<div class="row">					
					<div class="tab-content">                   
                        <div id="6" class="tab-pane fade">                 
                        <div class="order" id="postinfo">
<?php 
          
    if(isset($_POST['typKomina'])){ $typKomina = $_POST['typKomina']; $_SESSION['typKomina'] = $typKomina; }              
    if(isset($_POST['rodzajPustaka'])){ $rodzajPustaka = $_POST['rodzajPustaka'];  $_SESSION['rodzajPustaka'] = $rodzajPustaka; } 
    if(isset($_POST['srednicaWkladu'])){ $srednicaWkladu = $_POST['srednicaWkladu'];  $_SESSION['srednicaWkladu'] = $srednicaWkladu; }         if(isset($_POST['connections'])){ $connections = $_POST['connections'];  $_SESSION['connections'] = $connections; }  
    include_once("cart.php");
    var_dump($_SESSION);
    echo $cart; 
?>                         
	                                
                                
                            
                        </div>
                        <div class="single-content-down-arrow v2">
							<div class="arrow-down arrow-left-down">
								<div class="arrow-down-wrapper">
									<i class="fa fa-caret-down"></i>
								</div>
							</div>
						</div>
                        <form id="order" action="#6" method="post">
                        <div id="ordertab" class="order-form">
                            <div>
<?php                                 
                        if(!isset($_POST['send']) ) {                            
echo '                           <div class="order-form-title">
                                    <div class="icon-order-form">
                                        <img src="img/ikony/icon-7.png" />
                                    </div>
                                    <div class="order-text-title v2">
                                        <span>Zamówienie</span>
                                    </div>
                                </div>';
                                }
?>                                 
                                <div id="order-form">
                                
<?php                                 
                        if(isset($_POST['send']) ) {
                            
echo '               <hr style="height:30pt; visibility:hidden;" />              
                                <div class="order-form-title">
                                    <div class="icon-order-form">
                                        <img src="img/ikony/icon-7.png" />
                                    </div>
                                    <div class="order-text-title v2">
                                        <span>Zamówienie zostało wysłane</span>
                                    </div>
                                </div>
                      <hr style="height:30pt; visibility:hidden;" /> ';
                        } else { 
                         if ($_SESSION["logged"] != 'klient') { $logged = $_SESSION['logged']; 
                        $getKlient = $lacz->query("SELECT * FROM ".DB_PREFIX."_partner_{$_SESSION['lang']} WHERE login='$logged'");                 
                        $showKlient = $getKlient->fetch_object(); 
                
echo '                              <div class="form-group">
                                        <label class="transparent-bg" for="name">Imię i nazwisko:</label>
                                        <input type="text" id="name2" name="name2" class="form-control" placeholder="" value="'.$showKlient->company.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="transparent-bg" for="city">Miejscowość:</label>
                                        <input type="text" id="city" name="city" class="form-control" placeholder="" value="'.$showKlient->address.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="transparent-bg" for="email">Adres e-mail:</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="" value="'.$showKlient->email.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="transparent-bg" for="phone">Telefon:</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="" value="'.$showKlient->phone.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="transparent-bg" for="additional_information">Dodatkowe informacje:</label>
                                        <textarea id="additional_information" name="additional_information" class="form-control" placeholder=""></textarea>
                                    </div>                                    
                                    <div class="center-block">
                                        <button type="submit" onclick="make_pdf_hidden();" >Wyślij</button>
                                    </div>';
                       } else {
                        
                        echo '                              <div class="form-group">
                                        <label class="transparent-bg" for="name">Imię i nazwisko:</label>
                                        <input type="text" id="name2" name="name2" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="transparent-bg" for="city">Miejscowość:</label>
                                        <input type="text" id="city2" name="city" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="transparent-bg" for="email">Adres e-mail:</label>
                                        <input type="email" id="email2" name="email" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="transparent-bg" for="phone">Telefon:</label>
                                        <input type="text" id="phone2" name="phone" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="transparent-bg" for="additional_information">Dodatkowe informacje:</label>
                                        <textarea id="additional_information2" name="additional_information" class="form-control" placeholder=""></textarea>
                                    </div>                                    
                                    <div class="center-block">
                                        <button type="submit" onclick="make_pdf_hidden();" >Wyślij</button>
                                    </div>';                        
                        
                       }
                }                              
?>                                    
                                </div>
                            </div>
                        </div>
					</form>
                            
                            
                            
                            </div>
                            
                            
                            
                        
                        
							<div id="1" class="tab-pane fade in active tab-custom tab-chimneys">
								<div class="radio-wrapper">
<?php                                  
                            $getAllTheme = $lacz->query("SELECT * FROM ".DB_PREFIX."_blog_{$_SESSION['lang']} WHERE visibility=0 ORDER BY position");
                            $i=1;
                            while($showTheme = $getAllTheme->fetch_object()){ 
                                
							 echo '<div class="radio chimney-radio radio-'.$i.'">
										<img src="gallery/presentation_'.$lang.'/'.$showTheme->id.'.jpg" class="img-responsive" class="img-responsive">
										<label class="my-label">
											<input id="'.$showTheme->title.'" type="radio" name="typ_komina" value="'.$showTheme->id.'" >
											<div class="checked-border"></div>
											<img src="gallery/slider_'.$_SESSION['lang'].'/'.$showTheme->id.'.png" class="img-responsive chimney-img">';
											if ($showTheme->title == "Brata Premium") { echo '	<img src="img/kominy/medal.png" class="img-responsive award-img">';}
									echo '	<div class="info-description-container">
												<div class="info-button">
													<img src="img/kominy/info.jpg" class="img-responsive info-inactive">
													<img src="img/kominy/info-aktywne.jpg" class="img-responsive info-active">
												</div>
												<div class="product-description">'.$showTheme->lead.'</div>												
											</div>
										</label>
									</div>';
                        $i++;
                  }                                      
?>                                     
									
								</div>
								<div class="button-wrapper">
									<button class="previous" data-target="#" disabled style="visibility: hidden;"><i class="fa fa-angle-left"></i>poprzedni</button>
									<button class="next" data-target="2" disabled>następny<i class="fa fa-angle-right"></i></button>
								</div>
							</div>

							<div id="2" class="tab-pane fade">
								<div id="step2" class="radio-wrapper blocks-wrapper">
<?php                                
echo '								<div id="step2info" class="radio radio-blocks previous-steps" style="width: 260px; height: 736px;">';
var_dump($_SESSION);
                                        if(isset($_SESSION['typKomina'])){ 
                                        if(!isset($_SESSION['rodzajPustaka'])) { $rodzajPustaka = 'S';  } else {$rodzajPustaka = $_SESSION['rodzajPustaka']; } 
echo '									<img src="gallery/presentation_'.$_SESSION['lang'].'/'.$_SESSION['typKomina'].'.jpg" class="img-responsive">
										<img id="imgp" src="gallery/slider_'.$_SESSION['lang'].'/'.$_SESSION['typKomina'].'_'.$rodzajPustaka.'_a.png" class="img-responsive chimney-img">
                                        <img id="imgpa" src="gallery/slider_'.$_SESSION['lang'].'/'.$_SESSION['typKomina'].'_'.$rodzajPustaka.'.png" class="img-responsive chimney-img" style="display:none;">                                        
										<p>twoje wybory:</p>
										<span class="picked-elements">
											<span>Typ komina: <span class="picked-element-style">'.gettypKominaName($_SESSION['typKomina'], $lacz).'</span></span><br>
											<span>Rodzaj pustaka: <span class="picked-element-style">'.$rodzajPustaka.'</span></span><br>
										</span>';
                                        }                                                                                
echo '								</div>';
?>
									<div class="radio-content-wrapper">
<?php       
                                    $type = $_SESSION['typKomina'] == '71' ? 2 : 1; 
        $questionDB = $lacz->query("SELECT * FROM ".DB_PREFIX."_slider_{$lang} WHERE link=$type  AND visibility=0 ORDER BY position ");	
        $i=1; 
          while ($show_questionDB = $questionDB->fetch_object()) {                            
                               echo ' 
                                <div class="radio radio-content">
									<p>'.$show_questionDB->name.'</p>
									<label class="my-label">
										<input id="photoP_'.$i.'" type="radio" name="typ_pustaka" value="'.$show_questionDB->name.'" onclick="selectP();">
										<div class="checked-border"></div>
										<img src="gallery/pustak_'.$_SESSION['lang'].'/'.$show_questionDB->id_slider.'_'.friendly_url($show_questionDB->name).'.png" class="img-responsive blocks-img">
										<div class="info-description-container">
											<div class="info-button">
												<img src="img/kominy/info.jpg" class="img-responsive info-inactive">
												<img src="img/kominy/info-aktywne.jpg" class="img-responsive info-active">
											</div>';
                                            if ($show_questionDB->name == 'S') {
                                               echo '<div class="additional-info">
                                                    <span>Wybierz wymiar pustaka</span>
                                                </div>';
                                            }
											echo '<div class="product-description">';
                                            if ($show_questionDB->name == 'S') {
   echo '                                       <p class="title">Wymiary pustaka</p>
                                                <div id="groupRadio" class="input-dimensions ">                                                                                                                                                            
                                                            <input id="radio1" type="checkbox" name="subradio" value="S" />
                                                            <label for="radio1">36x36x33</label>                                                   
                                                            <input id="radio2" type="checkbox" name="subradio" value="SM" />
                                                            <label for="radio2">48x48x33</label>      
                                                    
                                                </div>';                                                
                                            }
                                                $show_questionDB->label;
   echo ' 									</div>
										</div>
									</label>
								</div>';
                                $i++;                              
                            }         
                                        
?>                                        
                                    
                                
                                    
                                                                              
									</div>									
								</div>
                                
                                
                                
                                
                                
                                
                                
                                
								<div class="button-wrapper">
									<button class="previous" data-target="1"><i class="fa fa-angle-left"></i>poprzedni</button>
									<button id="nextFor2" data-target="3" class="next">następny<i class="fa fa-angle-right"></i></button>
									<!-- <button data-target="3" class="next" disabled>następny<i class="fa fa-angle-right"></i></button> -->
								</div>
							</div>
                            


                        <div id="3" class="tab-pane fade">
								<div id="step3" class="radio-wrapper diameters-container">
									<?php                           
                                                                                                  
echo '								<div id="step3_komin" class="radio-blocks previous-steps" style="width: 260px; height: 736px;">';
                                     if(!isset($_SESSION['srednicaWkladu'])) { $srednicaWkladu = '160';  } else {$srednicaWkladu = $_SESSION['srednicaWkladu']; } 
echo '                					<img src="gallery/presentation_'.$_SESSION['lang'].'/'.$_SESSION['typKomina'].'.jpg" class="img-responsive">
										<img id="imgd" src="gallery/slider_'.$_SESSION['lang'].'/'.$_SESSION['typKomina'].'_'.$_SESSION['rodzajPustaka'].'_'.$_SESSION['srednicaWkladu'].'_a.png" class="img-responsive chimney-img">
                                        <img id="imgda" src="gallery/slider_'.$_SESSION['lang'].'/'.$_SESSION['typKomina'].'_'.$_SESSION['rodzajPustaka'].'_'.$_SESSION['srednicaWkladu'].'.png" class="img-responsive chimney-img" style="display:none;">                                        
										<p>twoje wybory:</p>
										<span class="picked-elements">
											<span>Typ komina: <span class="picked-element-style">'.gettypKominaName($_SESSION['typKomina'], $lacz).'</span></span><br>
											<span>Rodzaj pustaka: <span class="picked-element-style">'.$_SESSION['rodzajPustaka'].'</span></span><br>
											<span>Średnica wkładu ceramicznego: <span class="picked-element-style">'.$srednicaWkladu.'</span></span><br>
										</span>
									</div>';
?>                                    
                                    
									<div class="radio-content-wrapper diameters-wrapper">
                                    
<?php                                    $step4P = $_SESSION['rodzajPustaka']; 
										 $table = ($_SESSION['rodzajPustaka'] ? ($_SESSION['rodzajPustaka'] == 'SW' ? '2' : ($_SESSION['rodzajPustaka'] == 'SW2' ? '3' : '')) : '');                                                             if ($_SESSION['typKomina'] == '70') {
										 $diam = ($_SESSION['rodzajPustaka'] ? ($_SESSION['rodzajPustaka'] == 'S' ? '<=200' : ($_SESSION['rodzajPustaka'] == 'SM' ? '>=200' : '!=0')) : '!=0');  
										 } else {
                                         $diam = ($_SESSION['rodzajPustaka'] ? ($_SESSION['rodzajPustaka'] == 'S' ? '<=200' : ($_SESSION['rodzajPustaka'] == 'SM' ? '>200' : '!=0')) : '!=0'); 
                                    }
                                    $curKomin = $_SESSION['typKomina'];
               $getSetTags = $lacz->query("SELECT ".DB_PREFIX."_blog_category_{$lang}.id_category, ".DB_PREFIX."_blog_category_{$lang}.name, ".DB_PREFIX."_blog_category_{$lang}.parent FROM ".DB_PREFIX."_blog_category_{$lang} INNER JOIN ".DB_PREFIX."_blog_tags{$table}_{$lang} ON ".DB_PREFIX."_blog_category_{$lang}.id_category = ".DB_PREFIX."_blog_tags{$table}_{$lang}.id_tag WHERE ".DB_PREFIX."_blog_tags{$table}_{$lang}.id_article='$curKomin' AND ".DB_PREFIX."_blog_category_{$lang}.parent IS NOT NULL AND ".DB_PREFIX."_blog_category_{$lang}.name{$diam} ORDER BY ".DB_PREFIX."_blog_category_{$lang}.name"); 
                     $i=1;         
                     while($showSetTags = $getSetTags->fetch_object()){	
                        //$srednica = ($_SESSION['srednicaWkladu'] ? $_SESSION['srednicaWkladu'] : ($i == 1 ? $showSetTags->name : 'brak'));
echo '									<div class="radio radio-content">
											<p><span>&#8960;</span>'.$showSetTags->name.'</p>
											<label class="my-label">
												<input id="photoD_'.$i.'" type="radio" name="optradio" value="'.$showSetTags->name.'" onclick="selectD();">
												<div class="checked-border"></div>
												<img src="gallery/slider_'.$_SESSION['lang'].'/'.$_SESSION['typKomina'].'_'.$_SESSION['rodzajPustaka'].'_'.$showSetTags->name.'_d.png"  class="img-responsive diameter-img">
												<div class="info-description-container">
													<div class="info-button">
														<img src="img/kominy/info.jpg" class="img-responsive info-inactive">
														<img src="img/kominy/info-aktywne.jpg" class="img-responsive info-active">
													</div>
                                                    <div class="additional-info">
                                                        <span>Wybierz liczbę przyłączy</span>
                                                    </div>
													<div class="product-description">';
                                                    if($curKomin == '68' && $showSetTags->name == '140') {
echo '													
														<div class="input-connections" hidden>
															<i id="less'.$i.'" class="fa fa-chevron-left" aria-hidden="true" onclick="minusP('.$i.', '.$showSetTags->name.', '.$curKomin.');"></i>
                                                            <input id="connections_'.$i.'" name="connections" type="number" min="0" max="10" value="0" />
                                                            <i id="more'.$i.'" class="fa fa-chevron-right" aria-hidden="true" onclick="addP('.$i.', '.$showSetTags->name.', '.$curKomin.');"></i>
														</div>';                                                       
                                                        
                                                    } 
                                                    else {
echo '													<p class="title">Przyłącza spalinowe</p>
                                                        <p><span id="span3_'.$i.'">w zakresie od 1 do 10</span></p>
														
														<div class="input-connections">
                                                            <div><input id="coninfo_'.$i.'" type="hidden" name="lang" value="'.$showSetTags->name.'" /></div>
															<i id="less'.$i.'" class="fa fa-chevron-left" aria-hidden="true" onclick="minusP('.$i.', '.$showSetTags->name.', '.$curKomin.');"></i>
                                                            <input id="connections_'.$i.'" name="connections" type="number" min="0" max="10" value="0" readonly/>
                                                            <i id="more'.$i.'" class="fa fa-chevron-right" aria-hidden="true" onclick="addP('.$i.', '.$showSetTags->name.', '.$curKomin.');"></i>
														</div>';
                                                        }
echo '													<p>Rura ceramiczna s Lorem ipsum dolor sit amet, consectetur adispisicing elit, sed</p>
													</div>
												</div>
											</label>
										</div>';
                            $i++;
                  }                      
?>	
									</div>
								</div>
								<div class="button-wrapper">
									<button class="previous" data-target="2"><i class="fa fa-angle-left"></i>poprzedni</button>
									<button data-target="4" class="next" disabled onclick="sendCon();">następny<i class="fa fa-angle-right"></i></button>								
								</div>
							</div>


						
							<div id="4" class="tab-pane fade">
								<!-- <input type="range" min="12" max="45" step="1" value="12" name="wysokosc">
								<p id="height">4.00</p>
								<div class="number-container">

								</div> -->
								<div class="container-fluid height-container">
									<div class="row">
										<div class="col-sm-4 col-md-3 height-previous-column">
											<div id="step4" class="radio  previous-steps">
<?php                                            
echo '											<img src="gallery/presentation_'.$_SESSION['lang'].'/'.$_SESSION['typKomina'].'.jpg" class="img-responsive">
                                                <img id="imgh" src="gallery/slider_'.$_SESSION['lang'].'/'.$_SESSION['typKomina'].'_'.$_SESSION['rodzajPustaka'].'_'.$_SESSION['srednicaWkladu'].'_h.png" class="img-responsive height-chimney-img" >
												 <img id="imgha" src="gallery/slider_'.$_SESSION['lang'].'/'.$_SESSION['typKomina'].'_'.$_SESSION['rodzajPustaka'].'_'.$_SESSION['srednicaWkladu'].'_ha.png" class="img-responsive height-chimney-img" style="display:none;">												
												<p>twoje wybory:</p>
												<span class="picked-elements">
													<span>Typ komina: <span class="picked-element-style">'.gettypKominaName($_SESSION['typKomina'], $lacz).'</span></span><br>
											<span>Rodzaj pustaka: <span class="picked-element-style">'.$_SESSION['rodzajPustaka'].'</span></span><br>';
                                            if(isset($_SESSION['srednicaWkladu']) && $_SESSION['srednicaWkladu'] != 'null' ) {                                            
echo '										<span>Średnica wkładu ceramicznego: <span class="picked-element-style">'.$_SESSION['srednicaWkladu'].'</span></span><br>';
                                            }
echo '  									<span class="picked-h">Wysokość komina: <span class="picked-element-style">4</span></span>                                                 
                                                    
												</span>';
?>                                               
											</div>
										</div>
										<div class="col-sm-8 col-md-9 range-column">
											<div class="range-wrapper xs-hidden md-visible">
												<img src="img/wysokosc/komin_element_dach.png" class="img-responsive height-chimney-top">
												<div class="bar mb"></div>
												<div class="bar-container">
													<div class="bar meter"></div>
													<div class="bar middle">
														<div class="range-input-wrapper">
															<div id="slider-vertical-integer"></div>
														</div>
														<div class="range-input-wrapper">
															<div id="slider-vertical-decimal"></div>
														</div>
													</div>
													<div class="bar third"></div>
												</div>
												<div class="bar fourth"></div>
											</div>
											<div class="tablet-input-wrapper">
												<span>wysokość komina</span>
												<span class="smallLetters" id="mbInfo">W ZAKRESIE OD 4 DO 15 m</span>
												<input type="text" name="height" id="height" placeholder="4.00">
												<span class="smallLetters">1m komina = wysokość 3 pustaków</span>
												<span class="smallLetters">Wysokość zaokrągla się do sumy wysokości pustaków, która mieści się w wysokości komina.</span>
												<img src="img/wysokosc/pustak_szczegol_dol_3.png" class="img-responsive height-block md-hidden">
											</div>
										</div>
										<!-- <div class="col-sm-8 tablet-input-column">
											<div class="tablet-input-wrapper md-hidden">
												<span>wysokość komina</span>
												<span>w zakresie od 4 do 15 m</span>
												<input type="text" name="height" id="height" placeholder="4,00">
												<span>1m komina = wysokość 3 pustaków</span>
												<span>Wysokość zaokrągla się do sumy wysokości pustaków, która mieści się w wysokości komina.</span>
												<img src="img/wysokosc/pustak_szczegol_dol.png" class="img-responsive height-block">
											</div>

										</div> -->
									</div>
								</div>
								<div class="button-wrapper">
									<button id="previousFor4" class="previous" data-target="3"><i class="fa fa-angle-left"></i>poprzedni</button>
									<button class="next" data-target="5">następny<i class="fa fa-angle-right"></i></button>
								</div>
							</div>


							<div id="5" class="tab-pane fade">
								<div class="radio-wrapper diameters-accesories-container accessories-container">
									<div id="step5" class="radio-blocks previous-steps">
<?php                                    
                                        if(isset($_SESSION['srednicaWkladu'])) {$srednicaWkladu = $_SESSION['srednicaWkladu']; }  
echo '                            
										<img src="gallery/presentation_'.$_SESSION['lang'].'/'.$_SESSION['typKomina'].'.jpg" class="img-responsive accessories-chimney-name" >
										<div class="accessories-picked-img-wrapper">
                                            <img src="gallery/slider_'.$_SESSION['lang'].'/'.$_SESSION['typKomina'].'_'.$_SESSION['rodzajPustaka'].'_'.$srednicaWkladu.'.png" class="img-responsive chimney-img">';
                                         
                                        $rodzajPustaka = $_SESSION['rodzajPustaka'];                                     
                                        $questionDB1 = $lacz->query("SELECT * FROM ".DB_PREFIX."_products_{$lang} WHERE (content='{$rodzajPustaka}' OR  content='0') AND visibility=0 ORDER BY position");
	 while ($show_questionDB1 = $questionDB1->fetch_object()) { 
	   $file_nameD = $show_questionDB1->id_products.'_d.png';
       $file_nameC = $show_questionDB1->id_products.'_c.png';
	    if (file_exists('gallery/products_accessories_'.$lang.'/'.$file_nameD)) {       
    	echo '                                     
				<img id="'.$show_questionDB1->id_products.'_d" style="display:none;" src="gallery/products_accessories_'.$lang.'/'.$file_nameD.'" class="img-responsive accessories-absolute-img accessories-absolute-img-previous">';
        }
        if (file_exists('gallery/products_accessories_'.$lang.'/'.$file_nameC)) {	  	
    	echo '                                     
				<img id="'.$show_questionDB1->id_products.'_c" style="display:none;" src="gallery/products_accessories_'.$lang.'/'.$file_nameC.'" class="img-responsive accessories-absolute-img accessories-absolute-img-recent">';
        }
        
	}
      
                                         $questionDB1 = $lacz->query("SELECT * FROM ".DB_PREFIX."_products_{$lang} WHERE (content='{$rodzajPustaka}' OR  content='0') AND visibility=0 ORDER BY position ");
	$questionDB1_cnt = $questionDB1->num_rows;	
                                            
  ?>                                     
       
										</div>
										<p>twoje wybory:</p>
										<span class="picked-elements">
<?php                                        
echo '										<span>Typ komina: <span class="picked-element-style">'.gettypKominaName($_SESSION['typKomina'], $lacz).'</span></span><br>
											<span>Rodzaj pustaka: <span class="picked-element-style">'.$rodzajPustaka.'</span></span><br>';
                                            if(isset($_SESSION['srednicaWkladu']) && $_SESSION['srednicaWkladu'] != 'null' ) {                                            
echo '										<span>Średnica wkładu ceramicznego: <span class="picked-element-style">'.$_SESSION['srednicaWkladu'].'</span></span><br>';
                                            }                                            
echo '  									<span class="picked-ha">Wysokość komina: <span class="picked-element-style">4</span></span> 
											<br /><span class="picked-a">Akcesoria:<br /></span>';
?>                                           
										</span>
									</div>
									<div id="query5" class="radio-content-wrapper">										
<?php                                  
    	
    	   while ($show_questionDB1 = $questionDB1->fetch_object()) {               	       
    	echo '                                            
										<div class="radio radio-content"><p>'.$show_questionDB1->title.'</p>							
											<label class="my-label">
												<input type="checkbox" name="accessories"  id="access_'.$show_questionDB1->id_products.'" value="'.$show_questionDB1->id_products.'" class="ibtn" onclick="selectA(\''.$show_questionDB1->id_products.'\', \''.$show_questionDB1->title.'\');">
												<div class="checked-border"></div>
												<img src="gallery/products_accessories_'.$lang.'/'.$show_questionDB1->id_products.'.png" class="img-responsive accessories-img">
												<div class="info-description-container">
													<div class="info-button">
														<img src="img/kominy/info.jpg" class="img-responsive info-inactive">
														<img src="img/kominy/info-aktywne.jpg" class="img-responsive info-active">
													</div>';
                                                    if (($show_questionDB1->content == 'W1' || $show_questionDB1->content == 'W2' || $show_questionDB1->content == 'W3' || $show_questionDB1->content == 'W4' || $show_questionDB1->content == 'W1p' || $show_questionDB1->content == 'W2p') && ($show_questionDB1->title == 'PŁYTA PRZYKRYWAJĄCA STALOWA_W1' || $show_questionDB1->title == 'PŁYTA PRZYKRYWAJĄCA STALOWA_W2' || $show_questionDB1->title == 'PŁYTA PRZYKRYWAJĄCA STALOWA_W3' || $show_questionDB1->title == 'PŁYTA PRZYKRYWAJĄCA STALOWA_W4' || $show_questionDB1->title == 'PŁYTA PRZYKRYWAJĄCA STALOWA_W1p' || $show_questionDB1->title == 'PŁYTA PRZYKRYWAJĄCA STALOWA_W2p')) {
                                                       echo '<div class="additional-info">
                                                            <span>Podaj wymiar płytki</span>
                                                        </div>';
                                                    }
													echo '<div class="product-description">';
                                                    if (($show_questionDB1->content == 'W1' || $show_questionDB1->content == 'W2' || $show_questionDB1->content == 'W3' || $show_questionDB1->content == 'W4' || $show_questionDB1->content == 'W1p' || $show_questionDB1->content == 'W2p') && ($show_questionDB1->title == 'PŁYTA PRZYKRYWAJĄCA STALOWA_W1' || $show_questionDB1->title == 'PŁYTA PRZYKRYWAJĄCA STALOWA_W2' || $show_questionDB1->title == 'PŁYTA PRZYKRYWAJĄCA STALOWA_W3' || $show_questionDB1->title == 'PŁYTA PRZYKRYWAJĄCA STALOWA_W4' || $show_questionDB1->title == 'PŁYTA PRZYKRYWAJĄCA STALOWA_W1p' || $show_questionDB1->title == 'PŁYTA PRZYKRYWAJĄCA STALOWA_W2p')) {
                                                        echo
                                                        '
                                                        <p class="title">Wymiary płytki</p>
                                                        <div class="input-dimensions">
                                                            <input id="wymiary_plytki" type="text" name="wymiary_plytki" />
                                                        </div>
                                                        ';
                                                    }
													echo '</div>
												</div>
											</label>
										</div>';
                                  }
                                  
?>                                                                                                                                                                                                                 
									</div>
								</div>
								
								<div class="button-wrapper">
									<button class="previous" data-target="4"><i class="fa fa-angle-left"></i>poprzedni</button>
                                    <?php
echo '  							<button class="next" data-target="6" onclick="loadCSS(\'css/new.css\');">zamawiam<i class="fa fa-angle-right"></i></button>';
                                    ?>                                    
								</div>
							</div>
						</div>
					
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

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
	crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="js/script.js"></script>
    <script src="js/konfig.js"></script>
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