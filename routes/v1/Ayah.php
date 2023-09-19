<?php

use Http\Controllers;
use Slim\Routing\RouteCollectorProxy;

$app->group('/v1', function(RouteCollectorProxy $group) {

    // $group->get('/surah',[Controllers\Surah::class, 'get']);
    $group->get('/ayah', [Ayah::class, 'getOneRandom']);    
    $group->get('/surah/{number}', [Controllers\Surah::class, 'getByNumber']);
    $group->get('/surah/{number}/{edition}', [Controllers\Surah::class, 'getOneByNumberAndEdition']);
    $group->get('/surah/{number}/editions/{editions}', [Controllers\Surah::class, 'getManyByNumberAndEdition']);
});