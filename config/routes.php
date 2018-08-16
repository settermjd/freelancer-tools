<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\MiddlewareFactory;

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', FreelancerTools\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', FreelancerTools\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/:id', FreelancerTools\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/:id', FreelancerTools\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/:id', FreelancerTools\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', FreelancerTools\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', FreelancerTools\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     FreelancerTools\Handler\ContactHandler::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
    $app->get('/', FreelancerTools\Handler\HomePageHandler::class, 'home');
    $app->get('/api/ping', FreelancerTools\Handler\PingHandler::class, 'api.ping');
};
