<?php

declare(strict_types=1);

namespace Jira\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Jira\Resources\Attachments;
use Jira\Resources\Customers;
use Jira\Resources\Groups;
use Jira\Resources\Issues;
use Jira\Resources\Requests;
use Jira\Resources\Users;

/**
 * @method static Attachments attachments()
 * @method static Customers customers()
 * @method static Groups groups()
 * @method static Issues issues()
 * @method static Requests requests()
 * @method static Users users()
 */
class Jira extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'jira';
    }
}
