<?php

use Illuminate\Config\Repository;
use Jira\Laravel\Facades\Jira;
use Jira\Laravel\ServiceProvider;
use Jira\Resources\Issues;

it('resolves resources', function () {
    $app = app();

    $app->bind('config', fn () => new Repository([
        'jira' => [
            'username' => 'USERNAME',
            'password' => 'PASSWORD',
            'host' => 'jira.domain.com',
        ],
    ]));

    (new ServiceProvider($app))->register();

    Jira::setFacadeApplication($app);

    $issues = Jira::issues();

    expect($issues)->toBeInstanceOf(Issues::class);
});
