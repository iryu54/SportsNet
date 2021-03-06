<?php

$app->get('/user/{id:[0-9]+}', 'UserController:profil')->setName('user.profile');

$app->group('', function () {
    $this->map(['GET', 'POST'], '/profil', 'UserController:monCompte')->setName('user.compte');
    $this->get('/mes-epreuves', 'UserController:mesEpreuves')->setName('user.epreuves');
})->add(new App\Middleware\AuthMiddleware($container));

$app->get('/mes-evenements', 'UserController:mesEvenements')->setName('user.events')->add(new App\Middleware\OrganisateurMiddleware($container));
