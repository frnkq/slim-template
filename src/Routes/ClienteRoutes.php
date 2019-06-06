<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use \Slim\App;

//what the client can see....
//we have: miPedido, Encuesta
return function(App $app)
{
  $app->get('/miPedido/{id}', function()
  {
    //view mi pedido based on id
  });

  $app->get('/encuesta', function($request, $response, $args)
  {
    //view my encuesta if submitted
  });

  $app->post('/encuesta', function($request, $response, $args)
  {
    //create encuesta if jwt.user.cliente
  });
};
