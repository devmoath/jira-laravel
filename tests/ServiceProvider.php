<?php

use Illuminate\Config\Repository;
use Jira\Client;
use Jira\Laravel\Exceptions\ConfigIncomplete;
use Jira\Laravel\ServiceProvider;

it('binds the client on the container', function () {
    $app = app();

    $app->bind('config', fn () => new Repository([
        'jira' => [
            'username' => 'USERNAME',
            'password' => 'PASSWORD',
            'host' => 'jira.domain.com',
        ],
    ]));

    (new ServiceProvider($app))->register();

    expect($app->get(Client::class))->toBeInstanceOf(Client::class);
});

it('binds the client on the container as singleton', function () {
    $app = app();

    $app->bind('config', fn () => new Repository([
        'jira' => [
            'username' => 'USERNAME',
            'password' => 'PASSWORD',
            'host' => 'jira.domain.com',
        ],
    ]));

    (new ServiceProvider($app))->register();

    $client = $app->get(Client::class);

    expect($app->get(Client::class))->toBe($client);
});

it('requires complete jira config', function () {
    $app = app();

    $app->bind('config', fn () => new Repository([]));

    (new ServiceProvider($app))->register();
})->throws(
    ConfigIncomplete::class,
    'Jira configuration incomplete. Please publish the [jira.php] configuration file and setup your environment variables.',
);

it('provides', function () {
    $app = app();

    $provides = (new ServiceProvider($app))->provides();

    expect($provides)->toBe([Client::class]);
});
