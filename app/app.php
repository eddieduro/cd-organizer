<?php
  require_once __DIR__.'/../vendor/autoload.php';
  require_once __DIR__.'/../src/Cd.php';

  session_start();

  if(empty($_SESSION['list_of_cds'])){
    $_SESSION['list_of_cds'] = array();
  }

  $app = new Silex\Application();
  $app->register(new Silex\Provider\TwigServiceProvider, array(
    'twig.path'=> __DIR__.'/../views'
  ));



  $app->get('/', function() use ($app) {
    return $app['twig']->render('cd_organizer.html.twig', array('cds' => Cd::getAll()));
  });

  $app->get('/new_cd', function() use ($app) {
    return $app['twig']->render('create_cd.html.twig');
  });

  $app->post('/create_cd', function() use ($app){
    $album = new Cd($_POST['newCd'], $_POST['newArtist'] );
    $album->save();
    return $app['twig']->render('new_cd.html.twig', array('newcd' => $album));
  });

  $app->get('/delete_cds', function() use ($app){
    Cd::deleteAll();
    return $app['twig']->render('delete_cds.html.twig');
  });

  $app->get('/search_by_artist', function() use ($app) {
    return $app['twig']->render('search_by_artist.html.twig');
  });

  $app->post('/results', function() use ($app) {
    $current_cd_list = Cd::getAll();
    return $app['twig']->render('results.html.twig', array('artist_list' => $current_cd_list));
  });
  $app['debug'] = true;
  return $app;
?>
