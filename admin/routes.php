<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'produits':
        // we need the model to query the database later in the controller
        require_once('models/produit.php');
        $controller = new produitsController();
      break;
       case 'reclamation':
        // we need the model to query the database later in the controller
        require_once('models/reclamation.php');
        $controller = new reclamationController();
      break;
      case 'mail':
        // we need the model to query the database later in the controller
    
        $controller = new mailController();
      break;
       case 'Users':
        // we need the model to query the database later in the controller
        require_once('models/User.php');
        $controller = new UsersController();
      break;
             case 'commande':
        // we need the model to query the database later in the controller
        require_once('models/commande.php');
        $controller = new commandesController();
      break;
      case'promotions':
			require_once('models/promotion.php');
			$controller =new PromotionController();
			break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' => ['home', 'error'],
                       'produits' => ['index', 'show','modifier','supprimer','ajouter','formulaire'],
                       'reclamation' => ['index', 'show','supprimer'],
                        'mail' => ['reply','show'],
                        'Users' => ['index', 'show','modifier','ajouter','formulaire'],
                        'commande' => ['index','status'],
                        'promotions'=>['index','add','save','search','edit','update','delete','remove','stat']
                        );

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>