<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

//route vers le formulaire d'ajout
$app->get('/ajout.phtml', function (Request $request, Response $response, array $args) {
   
    return $this->renderer->render($response, 'ajout.phtml', $args);
});

//route vers mon formulaire modifier

$app->get('/modifier.phtml', function (Request $request, Response $response, array $args) {
//recuperer l'id de la variable a modiffier
   $id = strip_tags($request->getParam('id'));  
   
   $this ->db;
   $article = articles::find($id);


    return $this->renderer->render($response, 'modifier.phtml', ["article"=>$article]);
});

//modifier dans la base de donnee

$app->post('/modifier', function (Request $request, Response $response, array $args) {

   $id = strip_tags($request->getParam('id'));
   $nom = strip_tags($request->getParam('nom'));
   $type = strip_tags($request->getParam('type'));
   $couleur = strip_tags($request->getParam('couleur'));
   $marque = strip_tags($request->getParam('marque'));
 

  $this->db;
// modifier les donnees d'un id
   $article = articles::find($id);
   $article->nom=$nom;
   $article->type=$type;
   $article->couleur=$couleur;
   $article->marque=$marque;
   $article->save();
   echo "modification reussit";


    return $this->renderer->render($response, 'modifier.phtml', ["article"=>$article]);
});
// route pour ajouter un element
$app->post('/ajout', function (Request $request, Response $response, array $args) {
   
   //recuperer un element d'un champs

   $nom = strip_tags($request->getParam('nom'));
   $type = strip_tags($request->getParam('type'));
   $couleur = strip_tags($request->getParam('couleur'));
   $marque = strip_tags($request->getParam('marque'));

  $this->db;

   // insertion de ligne dans ma base
  $article = new articles;
   $article->nom=$nom;
   $article->type=$type;
   $article->couleur=$couleur;
   $article->marque=$marque;
   
   $article->save();
  
  // on reste sur la meme page apres l'ajout
 return $this->renderer->render($response, 'ajout.phtml', $args);
   
});

// route pour creer une table 
$app->get('/article', function (Request $request, Response $response, array $args) {
    
   $capsule = new \Illuminate\Database\Capsule\Manager;
    $this->db;
    $capsule::schema()->dropIfExists('articles');

    $capsule::schema()->create('articles', function (\Illuminate\Database\Schema\Blueprint $table) {
        $table->increments('id');
        $table->string('nom')->default('');
        $table->string('type')->default('');
        $table->string('couleur')->default('');
        $table->string('marque')->default('');
        
       
    });

    // Render index view
    echo "la table articles est cree";
});


// supprimer article -> route vers le formulaire

$app->get('/delete.phtml', function (Request $request, Response $response, array $args) {
 
  $id = strip_tags($request->getParam('id'));  
   
   $this ->db;
   $article = articles::find($id);

    return $this->renderer->render($response, 'delete.phtml', ["article"=>$article]);
});

// supprimer l'id dans la base 

$app->post('/supprimer', function (Request $request, Response $response, array $args) {
   
   //recuperer un element d'un champs

   $id = strip_tags($request->getParam('id'));
   
   $this->db;

   // rechercher id et supprimer
   $article = articles::find($id);
   $article->delete();

return $this->renderer->render($response, 'delete.phtml', ["article"=>$article]);

});

// afficher tout
$app->get('/AfficherTout.phtml', function (Request $request, Response 
  $response, array $args) {
   $this ->db;
   $article = articles::all();

    return $this->renderer->render($response, 'AfficherTout.phtml', ["article"=>$article]); 
});

// show one
$app->get('/AfficherUn.phtml', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'AfficherUn.phtml', $args);
});

$app->post('/AfficherUn', function (Request $request, Response 
  $response) {
  
  $id = strip_tags($request->getParam('id'));
  $this ->db;
  $article = articles::find($id);
  return $this->renderer->render($response, 'Affich1.phtml', ["article"=>$article]);
});

