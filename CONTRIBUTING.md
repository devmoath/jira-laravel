# CONTRIBUTING

Contributions are welcome, and are accepted via pull requests.
Please review these guidelines before submitting any pull requests.

## Process

1. Fork the project
2. Create a new branch
3. Code, test, commit and push
4. Open a pull request detailing your changes.

## Guidelines

* Please ensure the coding style running `composer lint`.
* Send a coherent commit history, making sure each individual commit in your pull request is meaningful.
* You may need to [rebase](https://git-scm.com/book/en/v2/Git-Branching-Rebasing) to avoid merge conflicts.
* Please remember that we follow [SemVer](http://semver.org/).

## Setup

Clone your fork, then install the dev dependencies:

```bash
composer install
```

## Refactor

Refactor your code:

```bash
composer refactor
```

## Lint

Lint your code:

```bash
composer lint
```

## Tests

Run all tests:

```bash
composer test
```

Check code quality:

```bash
composer test:refactor
```

Check types:

```bash
composer test:types
```

Unit tests:

```bash
composer test:unit
```

## Simplified setup using Docker

If you have Docker installed, you can quickly get all dependencies for jira-laravel in place using Docker files. Assuming you have the repository cloned, you may run the following
commands:

1. `docker compose build` to build the Docker image
2. `docker compose run --rm composer install` to install Composer dependencies
3. `docker compose run --rm composer test` to run the project tests and analysis tools

If you want to check things work against a specific version of PHP, you may include the `PHP` build argument when building the image:

```bash
docker compose build --build-arg PHP=8.2
```

The default PHP version will always be the lowest version of PHP supported by jira-laravel.
