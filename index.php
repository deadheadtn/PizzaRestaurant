
<?php

require_once('promotion.php');

require_once('produit.php');
session_start();
require_once('config.php');
require_once('config1.php');
$db=Db::getInstance();
$pizza=[];
$sandwich=[];
$hamburger=[];
$req = $db->query('SELECT * FROM produit where categorie="pizza"');
 foreach($req->fetchAll() as $produit) {
        $pizza[] = new produit($produit['id_produit'], $produit['nom'], $produit['reference'], $produit['categorie'],$produit['quantite'], $produit['prix'],$produit['image'],$produit['description']);
      }
	  $req = $db->query('SELECT * FROM produit where categorie="sandwich"');
 foreach($req->fetchAll() as $produit) {
        $sandwich[] = new produit($produit['id_produit'], $produit['nom'], $produit['reference'], $produit['categorie'],$produit['quantite'], $produit['prix'],$produit['image'],$produit['description']);
      }
	  $req = $db->query('SELECT * FROM produit where categorie="hamburger"');
 foreach($req->fetchAll() as $produit) {
        $hamburger[] = new produit($produit['id_produit'], $produit['nom'], $produit['reference'], $produit['categorie'],$produit['quantite'], $produit['prix'],$produit['image'],$produit['description']);
      }
      $sql="SELECT * from youtube";
      $reqq=$db->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Ha' Food  </title>
    <script>
    function reclamation()
    {
        var name = window.document.contactForm.name.value;
        var email = window.document.contactForm.email.value;
        var texte = window.document.contactForm.message.value;
        $.get("AjoutRec.php", {name:name,email:email,texte:texte}, function(data){
            if(data.includes("ok")){
                document.getElementById("success").innerHTML = '<div class="alert alert-success"><strong>Reclamation envoyer avec succés </strong></div>';
                $('#contactForm').trigger("reset");
            }
        });
    }
    function addtocart(id){
        $.get("includes/cartAction.php", {controller:"addToCart", id:id}, function(data){
            if(data == 'ok'){
                document.getElementById('tag-id').innerHTML = '<div class="alert alert-success"><strong>Ajouter!</strong>.</div>';
                document.getElementById('FrfameID').contentWindow.location.reload(true);
            }else{
                alert('l ajout a echouer');
            }
        });
    }
    function login(){
        var email=window.document.loginarea.email.value;
        var pwd=window.document.loginarea.pwd.value;
        $.get("includes/se_connecter.php", {controller:"connection", email:email,pwd:pwd}, function(data){
            if(data == 'email'){
                document.getElementById('logincheck').innerHTML = '<div class="alert alert-info"><strong>Email inexistant</strong>.</div>';
            }else if(data == 'pwd'){
                document.getElementById('logincheck').innerHTML = '<div class="alert alert-info"><strong>Mot de passe érroné</strong>.</div>';
            }
            else if(data == 'status'){
                document.getElementById('logincheck').innerHTML = '<div class="alert alert-info"><strong>Compte non vérifié, veuillez vérifer votre compte.</strong>.</div>';
            }
            else if(data == 'admin'){
                window.location.href="/admin/";
            }
            else if(data == 'pwd1'){
                document.getElementById('logincheck').innerHTML = '<div class="alert alert-success"><strong>Authentification en cours..</strong>.</div>';
                location.reload();
            }
        });
    }
    function creer(){
        var nom=window.document.register.nom.value;
        var prenom=window.document.register.prenom.value;
        var email=window.document.register.email.value;
        var mdp=window.document.register.mdp.value;
        var mdp2=window.document.register.mdp2.value;
        var date_naissance=window.document.register.date_naissance.value;
        var adresse=window.document.register.adresse.value;
        var CIN=window.document.register.CIN.value;
        var num_tel=window.document.register.num_tel.value;
        var sexe=window.document.register.sexe.value;
        var captcha_code=window.document.register.captcha_code.value;
        
        $.get("includes/se_connecter.php", {controller:"creer", prenom:prenom,nom:nom,email:email,date_naissance:date_naissance,adresse:adresse,CIN:CIN,num_tel:num_tel,mdp:mdp,mdp2:mdp2,sexe:sexe,captcha_code:captcha_code}, function(data){
            if(data == 'nom'){
                document.getElementById('creercheck').innerHTML = '<div class="alert alert-info"><strong>Votre nom doit contenir 3 caractères au minimum</strong>.</div>';
            }
            if(data == 'prenom'){
                document.getElementById('creercheck').innerHTML = '<div class="alert alert-info"><strong>Votre prenom doit contenir 3 caractères au minimum</strong>.</div>';
            }
            if(data == 'mdpm'){
                document.getElementById('creercheck').innerHTML = '<div class="alert alert-info"><strong>Votre mot de passe est trop court (8 caractères au minimum) </strong>.</div>';
            }
            if(data == 'email'){
                document.getElementById('creercheck').innerHTML = '<div class="alert alert-info"><strong>Email existant</strong>.</div>';
            }
            else  if(data == 'mdp'){
                document.getElementById('creercheck').innerHTML = '<div class="alert alert-info"><strong>Vérifiez votre mot de passe</strong>.</div>';
            }
            else  if(data == 'captcha_code'){
                document.getElementById('creercheck').innerHTML = '<div class="alert alert-info"><strong>The security code entered was incorrect.<br/><br/></strong>.</div>';
            }
            else if(data == 'ok'){
                document.getElementById('creercheck').innerHTML = '<div class="alert alert-success"><strong>Creation du Compte en cours...</strong>.</div>';
                document.getElementById('creercheck').innerHTML = '<div class="alert alert-success"><strong> Confirmation link has been sent to your email , please verify your account by clicking on the link in the message </strong>.</div>';
            }
        });
}

function modifier_compte(){
        var nom=window.document.modifier.nom.value;
        var prenom=window.document.modifier.prenom.value;
        var email=window.document.modifier.email.value;
        var date_naissance=window.document.modifier.date_naissance.value;
        var adresse=window.document.modifier.adresse.value;
        var num_tel=window.document.modifier.num_tel.value;
        
        $.get("includes/modifier_compte.php", {controller:"modifier", prenom:prenom,nom:nom,email:email,date_naissance:date_naissance,adresse:adresse,num_tel:num_tel}, function(data){
            if(data == 'nom'){
                //document.getElementById('creercheck').innerHTML = '<div class="alert alert-info"><strong>Votre nom doit contenir 3 caractères au minimum</strong>.</div>';
                alert('njhbj');
            }
            if(data == 'prenom'){
                document.getElementById('creercheck').innerHTML = '<div class="alert alert-info"><strong>Votre prenom doit contenir 3 caractères au minimum</strong>.</div>';
            }
            if(data == 'email'){
                document.getElementById('creercheck').innerHTML = '<div class="alert alert-info"><strong>Email existant</strong>.</div>';
            }
            else if(data == 'ok'){
               document.getElementById('logincheck').innerHTML = '<div class="alert alert-success"><strong>Modification du compte en cours...</strong>.</div>';
                location.reload();             }
        
        });
    }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'nom');
        data.addColumn('number', 'qte');
        <?php
        if(isset($_SESSION['loggeduser']))
        {
          $req=$db->query("select p.nom,count(*) as qte from orders o join order_items oi on o.id=oi.order_id join produit p on p.id_produit=oi.product_id where id_user=".$_SESSION['loggeduser']." group by nom;");
          $data=$req->fetchAll();
          $pie_chart_data = array();
        foreach($data as $result)
        {
         $pie_chart_data[] = array($result['nom'], (int)$result['qte']);
        }
        $pie_chart_data = json_encode($pie_chart_data);
        echo 'data.addRows('.$pie_chart_data.');';
        }
        ?>
        // Set chart options
        var options = {'title':'Les produit acheté',
                       'width':800,
                       'height':600};
        
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
<style>
#FrfameID {
    position: fixed;
    border: none;
    top: 100px;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=229451183806153";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Ha'Food</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#page-top">Accueil</a>
                    </li>
                    
                     <li>
                        <a class="page-scroll" href="#Menu">Menu</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">a propos</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Service client</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#Promotion">Promotion</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <?php
                    if(!isset($_SESSION['loggeduser'])){
                        echo '<li><a class="page-scroll" href="#loginarea" class="portfolio-link" data-toggle="modal">login</a></li>';
                    }
                    else{
                        echo '<li><a class="page-scroll" href="#compte" class="portfolio-link" data-toggle="modal">Votre Compte</a></li>';
                    }
                    
                    if(isset($_SESSION['loggeduser'])){
                        echo '<li><a class="page-scroll" href="logout.php">Deconnexion</a></li>';
                    }?>
                    <li>
                        <a class="page-scroll" href="#cart" class="portfolio-link" data-toggle="modal">
                        <img src="img/shopping-cart-512.png" width="25">
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
        
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"></br></br></div>
                <div class="intro-heading"></br></div>
            
            </div>
        </div>
        
    </header>
    
    <!-- Portfolio Grid Section -->
    <section id="Menu">
        <div class="container">
            <div class="fb-like" data-href="https://www.facebook.com/HaFood-226095441074131/?ref=br_rs" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Menu</h2>
                   
                </div>
            </div>
            <div class="row">

                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/roundicons.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Nos Pizza</h4>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/startup-framework.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Nos Sandwich</h4>
                        <p class="text-muted"></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/treehouse.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Nos Hamburger</h4>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <section id="Promotion" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Nos Promotion</h2>
                   
                </div>
            </div>
<?php

$datetime = date("Y-m-d");


$req ="select p.*,pr.* from produit p join promotion pr on p.id_produit=pr.id_prod where pr.date_debut <='".$datetime."'and pr.date_fin >='".$datetime."'";

$liste=$db->query($req);
$l=$liste->fetchAll();

?>

 <div class="row">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                             
                                <br><br>
                                 <div  class="row list-group-10">
                               <?php foreach($l as $v) { 
                                     $req1 = $db->query("SELECT p.`id_prom`,p.`id_prod`,p.`description`,p.`date_debut`,p.`date_fin`,p.`pourcentage`, pro.`prix` FROM promotion p INNER JOIN  produit pro ON pro.`id_produit` = p.`id_prod` where id_prod=".$v[0]);
 $res=$req1->fetch();
?>
                                <div class="item col-lg-3">
                                <div class="thumbnail">
                                    
                                    <div class="caption">
                                        <center><h4 class="list-group-item-heading"> <?php echo $v[1] ?></br></br></h4></center>
                                       <center><p class="list-group-item-text"><?php echo $v[3]; ?></br></br></p></center>

                                        <img src="<?php echo $v[6]; ?>" width="230"/><br><br>
                                         <center><p class="list-group-item-text">Prix :</br><?php echo $res['prix']; ?></br></br><p class="list-group-item-text">Nouveaux Prix :</br><?php echo floatval($res['prix'])-(floatval($res['pourcentage'])*floatval($res['prix']))/100  ; ?></p></center>


                                        



                                    </div>
                                </div>
                            </div>
                                <?php } ?>
                                <br><br>
                                </div>
     </section>
    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Our Restaurant </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2016</h4>
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>La Petite Ariana</h4>
                                    <h4 class="subheading">Our Local</h4>
                                </div>
                                <div class="timeline-body">
                                </div>
                            </div>
                                                </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Family!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Nous contacter </h2>
                    <h3 class="section-subheading text-muted">Any time !! </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/1.jpg" width="100px"  class="img-responsive img-circle" alt="">
                        <h4>Layeb Med Samih</h4>
                        <!--p class="text-muted"> Lead Designer</p-->
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/2.jpg" width="100px"  class="img-responsive img-circle" alt="">
                        <h4>Nejmeddine Khechine</h4>
                        <!--p class="text-muted">Lead Marketer</p-->
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/3.jpg" width="100px"  class="img-responsive img-circle" alt="">
                        <h4>Selim Mattar</h4>
                        <!--p class="text-muted">Lead Arthistique</p-->
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/4.jpg" width="100px"  class="img-responsive img-circle" alt="">
                        <h4>Nacim Gastli</h4>
                        <!--p class="text-muted">Lead Arthistique</p-->
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/5.jpg" width="100px"  class="img-responsive img-circle" alt="">
                        <h4>Yessine Rebhi</h4>
                        <!--p class="text-muted">Lead Arthistique</p-->
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Aside -->
    

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Nous contacter</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form  name="contactForm" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Votre nom *" id="name" name="name" required data-validation-required-message="Please enter your name.>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="votre Email *" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>   
                                                            
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="votre Message *" id="message" name="texte" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="button" onclick="reclamation()" class="btn btn-xl" >Envoyer Reclamation </button>
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->
     <div class="portfolio-modal modal fade" id="compte" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <h2>votre compte</h2>
                        <?php
                         if(isset($_SESSION['loggeduser']))
                        {
                           $id= $_SESSION['loggeduser'];
                          $query=$db->query("select * from users where id_user=".$id);
                           $user=$query->fetch();
                        ?> 
                            <style>
                            table, td, th {    
                                border: 1px solid #ddd;
                                text-align: left;
                                 height: 800;
                            }

                            table {
                                border-collapse: collapse;
                                width: 100%;
                                height: 800;
                            }

                            th, td {
                                padding: 14px;
                                height: 800;
                            }
                            </style>
                            <form  action="/includes/modifier_compte.php" name ="modifier" method="POST">
                           <center> <table style="width:100%" >
                                    <thead>
                                    <tr >
                                        <th >Nom</th>
                                        <th>Prénom</th>
                                        <th>Sexe</th>
                                        <th>Date de naissance</th>
                                        <th>Adresse</th>
                                        <th>CIN</th>
                                        <th>Numéro de téléphone</th>
                                        <th>Email</th>
                                        <th>Nombre de points</th>
                                        <th >Enregistrer les modifications</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="center"> <input type = "text" id="nom" size="10" value="<?php echo $user['nom']; ?>" required>  </td>
                                        <td class="center"> <input type = "text" id="prenom" size="10" value="<?php echo $user['prenom']; ?>" required>   </td>
                                        <td class="center"> <?php echo $user['sexe']; ?>   </td>
                                        <td class="center"> <input type = "text" id="date_naissance" size="10" value="<?php echo $user['date_naissance']; ?>" required>   </td>
                                        <td class="center"> <input type = "text" id="adresse" size="10" value="<?php echo $user['adresse']; ?> " required> </td>
                                        <td class="center"> <?php echo $user['CIN']; ?></td>
                                        <td class="center"> <input type = "text" id="num_tel" size="10" value="<?php echo $user['num_tel']; ?> " required> </td>
                                        <td class="center"> <input type = "text" id="email" size="21" value="<?php echo $user['email']; ?>  " required>  </td>
                                        <td class="center"> <?php echo $user['nbr_point']; ?>   </td>
                                        <td class="center" > <button type = "button"  onclick="modifier_compte()"size="10" > Modifier</button>  </td>
                                    </tr>
                                    </tbody>
                            </table>
                        <?php }?>
                       
                        
                            <div id="chart_div"></div>
 </form>
               </div>
            </div>
        </div>
        </center>
    </div>
    <div class="portfolio-modal modal fade" id="loginarea" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>login</h2>
                                 <form action="/includes/se_connecter.php" name="loginarea" method="POST">
                                  <div>
                                    <label><b>Email</b></label>
                                    <input type="text" placeholder="Entrer votre Email" id="email" name="email" required>
                                </br>
                                    <label><b>Mot de passe</b></label>
                                    <input type="password" placeholder="Mot de passe" id="pwd" name="mdp" required>
                                </br>
                                
                                    <button type="button" onclick="login()">Login</button>
                                    </br>
                                    <div id="logincheck"></div>
                                    </br>
                                    <input type="checkbox" checked="checked"> Remember me
                                  </div>
                                </br>
                                </br>
                                  <div style="background-color:#f1f1f1">
                                    <button type="button" class="cancelbtn">Cancel</button>
                                    <span class="psw"><a href="#">Forgot password?</a></span>
                                  </div>
                                </form>
                                <a class="page-scroll" href="#Registerarea" class="portfolio-link" data-toggle="modal">Creer un compte</a>

                                </br></br>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> fermer </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="Registerarea" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Creer un Compte</h2>
                                 <form action="/includes/se_connecter.php" name="register" method="POST">
                                  <div>
                                <label><b>Nom:</b></label>
                                    <input type="text" placeholder="Entrez votre nom..." name="nom" id="nom" required>
                                </br>
                                <label><b>Prenom:</b></label>
                                    <input type="text" placeholder="Entrez votre prenom..." name="prenom" id="prenom"  required>
                                </br>
                                
                                <label><b>Sexe:</b> </label> 
                                                <label>
                                                    <input type="radio" name="sexe" value="Homme" required>Homme
                                                </label>
                                            <label> </label>
                                            
                                                <label>
                                                    <input type="radio" name="sexe" value="Femme">Femme
                                                </label>
                               </br>
                                <label><b>Date de naissance: </b></label>
                                    <input type="date" placeholder="Entrez votre date de naissance... " name="date_naissance" id="date_naissance"  required>
                                </br>
                                <label><b>CIN: </b></label>
                                    <input type="text" maxlength="8" placeholder="Entrez votre CIN..." name="CIN" id="CIN"  required>
                                </br>
                                 <label><b>Adresse domicile: </b></label>
                                    <input type="text" placeholder="Entrez votre adresse domicile..." name="adresse" id="adresse"  required>
                                </br>
                                    <label><b>Email:</b></label>
                                    <input type="email" placeholder="Entrez votre email..." name="email" id="email" required>
                                </br>

                                <label><b>Numero de téléphone: </b></label>
                                    <input type="text" maxlength="8" placeholder="Entrez votre numéro de téléphone..." name="num_tel" id="num_tel"  required>
                                </br>
                                    <label><b>Mot de passe:</b></label>
                                    <input type="password" minlength="8" placeholder="Entez votre mot de passe..." name="mdp" id="mdp" required>
                                    </br>
                                    <label><b>Confirmez votre mot de passe:</b></label>
                                    <input type="password" minlength="8" placeholder="Confirmez votre mot de passe..." name="mdp2" id="mdp2" required>
                                </br>
                                <!--___________________________________CAPTCHA CODE___________________________________-->


                                <img id="captcha" src="./securimage/securimage_show.php" alt="CAPTCHA Image" /> </br>
                                <input type="text" name="captcha_code" id="captcha_code" size="10" maxlength="6" />
                                <a href="#" onclick="document.getElementById('captcha').src = './securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
                                <!--__________________________________________________________________________________-->
                                
                                    <button type="button" onclick="creer()">valider</button>
                                    </br>
                                    <div id="creercheck"></div>
                                    </br>
                                    <input type="checkbox" checked="checked"> Remember me
                                  </div>
                                </br>
                                </form>
                                </br></br>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> fermer </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="cart" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg" style="height:80%;width:82%">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Panier</h4>
          </div>
          <div class="modal-body">
            <iframe id="FrfameID" frameborder="no" src="includes/viewCart.php"></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    
      </div>
</div>
    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                
                                <h2>Pizza</h2>
								<br><br>
								 <div id="products" class="row list-group-2">
								     <div id="tag-id"></div>
                               <?php foreach($pizza as $pizz) { ?>
                                <div class="item col-lg-6">
                                <div class="thumbnail">
                                    
                                    <div class="caption">
                                        <h4 class="list-group-item-heading"><?php echo $pizz->nom; ?></h4>
                                        <p class="list-group-item-text"><?php echo $pizz->categorie; ?></p>
                                        <img src="<?php echo $pizz->image; ?>" width="230"/>
                                        <div class="row">
                                            <div align="center">
                                                <p class="lead"><?php echo $pizz->prix.' TND'; ?></p>
                                                
                                            </div>
                                            <div align="center">
                                            <iframe  src="star/index.php?productId=<?php echo $pizz->id; ?>" width=500px height=80px frameBorder="0" ></iframe>
                                            </div>
                                            <div class="col-md-8">
                                                <a class="btn btn-success" onclick="addtocart('<?php echo $pizz->id; ?>')">Ajouer au Panier</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                                <?php } ?>
                                <br><br>
                                <div>
                                <?php require_once('Youtube.php'); ?>
                                </div>
                                </div>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Liste des pizza </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Sandwich</h2>
								<br><br>
								 <div id="products" class="row list-group-2">
								     <div id="tag-id"></div>
                               <?php foreach($sandwich as $sand) { ?>
                                <div class="item col-lg-6">
                                <div class="thumbnail">
                                    
                                    <div class="caption">
                                        <h4 class="list-group-item-heading"><?php echo $sand->nom; ?></h4>
                                        <p class="list-group-item-text"><?php echo $sand->categorie; ?></p>
                                        <img src="<?php echo $sand->image; ?>" width="230"/>
                                        <div class="row">
                                            <div align="center">
                                                <p class="lead"><?php echo $sand->prix.' TND'; ?></p>
                                            </div>
                                            <div align="center">
                                            <iframe  src="star/index.php?productId=<?php echo $pizz->id; ?>" width=500px height=80px frameBorder="0" ></iframe>
                                            </div>
                                            <div class="col-md-8">
                                                <a class="btn btn-success" onclick="addtocart('<?php echo $sand->id; ?>')">Ajouer au Panier</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <?php } ?>
                                <br><br>
                                </div>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Liste des pizza </button>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Hamburger</h2>
								<br><br>
								 <div id="products" class="row list-group-2">
								     <div id="tag-id"></div>
                               <?php foreach($hamburger as $ham) { ?>
                                <div class="item col-lg-6">
                                <div class="thumbnail">
                                    
                                    <div class="caption">
                                        <h4 class="list-group-item-heading"><?php echo $ham->nom; ?></h4>
                                        <p class="list-group-item-text"><?php echo $ham->categorie; ?></p>
                                        <img src="<?php echo $ham->image; ?>" width="230"/>
                                        <div class="row">
                                            <div  align="center">
                                                <p class="lead"><?php echo $ham->prix.' TND'; ?></p>
                                            </div>
                                            <div align="center">
                                            <iframe  src="star/index.php?productId=<?php echo $pizz->id; ?>" width=500px height=80px frameBorder="0" ></iframe>
                                            </div>
                                            <div class="col-md-8">
                                                <a class="btn btn-success" onclick="addtocart('<?php echo $ham->id; ?>')">Ajouer au Panier</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <?php } ?>
                                <br><br>
                                </div>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Liste des pizza </button>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="portfolio-modal modal fade" id="ViewArea" tabindex="-1" role="dialog" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2 id="nomproduit"> </h2>
                                 <form action="/action_page.php" method="POST">
								
                                  <img   height="200" width="200" id="imageproduit"/>
								  </br></br>
								<label id="descproduit"></label>
								</br>
								Prix : 
								  <label id="prixproduit"></label>
                                 TND
								  </br>
								  	<div class="form-group">
                                    <input type="number" min='0' class="form-control" placeholder="Qty." id="qty" >
									
                                    <p class="help-block text-danger"></p>
                                  </div>
								  
								  <button type="submit" class="btn btn-xl" data-dismiss="modal">Add to cart</button>
                                </br>
                                </form>
                                </br></br>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> fermer </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>
    


</body>

</html>
