<?php

declare(strict_types=1);

namespace Jira\Laravel;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Jira;
use Jira\Client;
use Jira\Laravel\Exceptions\ConfigIncomplete;

/**
 * @internal
 */
final class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Client::class, static function (): Client {
            $username = config('jira.username');
            $password = config('jira.password');
            $host = config('jira.host');

            if (! is_string($username) || ! is_string($password) || ! is_string($host)) {
                throw ConfigIncomplete::create();
            }

            return Jira::client($username, $password, $host);
        });

        $this->app->alias(Client::class, 'jira');
    }

    /**
     * Bootstrap any application services.
     *
     * @codeCoverageIgnore
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/jira.php' => config_path('jira.php'),
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            Client::class,
        ];
    }
}
