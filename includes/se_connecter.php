<?php  
include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';

include_once("config.php");
$action = $_REQUEST['controller'];

session_start();
$db = Db::getInstance();
if($action=='connection'){
$email = $_REQUEST['email'];
$pwd = $_REQUEST['pwd'];
$req = $db->query("SELECT * FROM users WHERE email='$email'");
$user=$req->fetch();
if ($user['email']==NULL){
    echo('email');
}
else if ($user['status']=='pending'){
    echo "status";
}
else if ($user['email']==$email && $pwd == $user['password']) {
     $_SESSION['loggeduser'] = $user['id_user'];
     echo "pwd1";
}
else if ($user['privilege']=='1') {
    echo "admin";
    $_SESSION['isAdmin']=1;
}
else {
    	echo "pwd";
}
}
else if($action =='creer'){
    $nom = $_REQUEST['nom'];
    $prenom = $_REQUEST['prenom'];
    $email = $_REQUEST['email'];
    $mdp = $_REQUEST['mdp'];
    $mdp2 = $_REQUEST['mdp2'];
    $date_naissance=$_REQUEST['date_naissance'];
    $adresse=$_REQUEST['adresse'];
    $CIN=$_REQUEST['CIN'];
    $num_tel=$_REQUEST['num_tel'];
    $sexe=$_REQUEST['sexe'];
    $captcha_code=$_REQUEST['captcha_code'];
    $securimage = new Securimage();

    $req = $db->query("SELECT * FROM users WHERE email='$email' OR CIN='$CIN'");
    $user=$req->fetch();
    if (strlen($nom) < 3){
        echo "nom";
    }
    else if (strlen($prenom) < 3){
        echo "prenom";
    }
    else if (strlen($mdp) < 8){
        echo "mdpm";
    }
    else if ($user['email']!=NULL){
        echo 'email';
    }
    else if ($mdp!=$mdp2){
        echo "mdp";
    }
    else if ($securimage->check($captcha_code) == false) {
      // the code was incorrect
      // you should handle the error so that the form processor doesn't continue
      // or you can use the following code if there is no validation or you do not know how
      echo "captcha_code";
      exit;

    }


    else{
        $query="INSERT INTO users (prenom,nom,email,username,password,date_naissance,adresse,CIN,num_tel,sexe) VALUES ('".$prenom."','".$nom."','".$email."','".$email."','".$mdp."','".$date_naissance."','".$adresse."','".$CIN."','".$num_tel."','".$sexe."')";
        $req=$db->query($query);
        $lastID = $db->lastInsertId();
        require_once "../phpmailer/class.phpmailer.php";
        $message = '<html><head>
                <title>Email Verification</title>
                </head>
                <body>';
        $message .= '<h1>Welcome to Ha Food ' . $nom . $prenom.'!</h1>';
        $message .= '<img src="https://scontent.ftun2-1.fna.fbcdn.net/v/t1.0-9/1958565_226114034405605_2195247987884929940_n.jpg?oh=1341b061776e2610e2309625dc0cd4b2&oe=59B82E3F"/>';
        $message .= "<p>
        Thank you for signing up! 
        Please click this link to activate your account: ";
        $message .= '<p><a href="https://projet-web-esprit-arij.c9users.io/activate.php?id=' . base64_encode($lastID) . '">CLICK TO ACTIVATE YOUR ACCOUNT</a>';
        $message .= "</body></html>";
        

        // php mailer code starts
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP

        $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port = 465;                   // set the SMTP port for the GMAIL server

        $mail->Username = 'hafood.tunisie@gmail.com';
        $mail->Password = 'hafoodtunisie';

        $mail->SetFrom('hafood.tunisie@gmail.com', "Ha'Food");
        $mail->AddAddress($email);

        $mail->Subject = trim("Email Verifcation ");
        $mail->MsgHTML($message);

        try {
          $mail->send();
          $msg = "An email has been sent for verfication.";
          $msgType = "success";
        } catch (Exception $ex) {
          $msg = $ex->getMessage();
          $msgType = "warning";
        }
       

        echo 'ok';
    }
}
?>