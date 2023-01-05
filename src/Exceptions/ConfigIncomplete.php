<?php

declare(strict_types=1);

namespace Jira\Laravel\Exceptions;

use InvalidArgumentException;

/**
 * @internal
 */
final class ConfigIncomplete extends InvalidArgumentException
{
    /**
     * Create a new exception instance.
     */
    public static function create(): self
    {
        return new self('Jira configuration incomplete. Please publish the [jira.php] configuration file and setup your environment variables.');
    }
}
