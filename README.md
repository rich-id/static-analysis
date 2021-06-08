# Static analysis

[![Package version](https://img.shields.io/packagist/v/richcongress/static-analysis)](https://packagist.org/packages/richcongress/static-analysis)
[![Contributions Welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/richcongress/static-analysis/issues)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE.md)

The static analysis checks if the code fits the configured. In this repository, you'll find a default configuration, and a script to easily execute the static analysis.


## Installation

Execute the following command using composer: `composer require richcongress/static-analysis --dev`


## Configuration

#### Files

Create symlinks in the project folder that points to the configuration files:

```bash
ln -sr ./vendor/richcongress/static-analysis/configs/phpstan.neon ./
ln -sr ./vendor/richcongress/static-analysis/configs/phpinsights.php ./
ln -sr ./vendor/richcongress/static-analysis/configs/php-cs-fixer.dist.php ./.php-cs-fixer.dist.php
```

If you want rather copying files instead of creating a symlink, juste change `ln` by `cp`:

```bash
cp ./vendor/richcongress/static-analysis/configs/phpstan.neon ./
cp ./vendor/richcongress/static-analysis/configs/phpinsights.php ./
cp ./vendor/richcongress/static-analysis/configs/php-cs-fixer.dist.php ./.php-cs-fixer.dist.php
```

#### Git Hook

To easily add a hook that execute the static analysis on `pre-push`, add the following code to your `composer.json` file:

```
{
    "scripts": {
        "post-install-cmd": [
            "cghooks add --ignore-lock"
        ],
        "post-update-cmd": [
            "cghooks update"
        ]
    },

    "extra": {
        "hooks": {
            "pre-commit": [
                "./bin/php-cs-fixer fix"
            ],
            "pre-push": [
                "./bin/php-cs-fixer fix --dry-run",
                "./bin/static_analysis"
            ]
        }
    }
}
```

Note that if commit outside your docker container if you use one, it will be executed outside your container.


### PHP CS Fixer File Watcher

You can setup a file watcher to run php-cs-fixer automatically on file save. For PhpStorm the config `configs/watcherTasks.xml` can be used as an example or if you don't have other watchers in your config, directly copy it to your `.idea/` folder:

```bash
cp ./vendor/richcongress/static-analysis/configs/watcherTasks.xml .idea/
```

## Versioning

static-analysis follows [semantic versioning](https://semver.org/). In short the scheme is MAJOR.MINOR.PATCH where
1. MAJOR is bumped when there is a breaking change,
2. MINOR is bumped when a new feature is added in a backward-compatible way,
3. PATCH is bumped when a bug is fixed in a backward-compatible way.

Versions bellow 1.0.0 are considered experimental and breaking changes may occur at any time.


## Contributing

Contributions are welcomed! There are many ways to contribute, and we appreciate all of them. Here are some of the major ones:

* [Bug Reports](https://github.com/richcongress/static-analysis/issues): While we strive for quality software, bugs can happen and we can't fix issues we're not aware of. So please report even if you're not sure about it or just want to ask a question. If anything the issue might indicate that the documentation can still be improved!
* [Feature Request](https://github.com/richcongress/static-analysis/issues): You have a use case not covered by the current api? Want to suggest a change or add something? We'd be glad to read about it and start a discussion to try to find the best possible solution.
* [Pull Request](https://github.com/richcongress/static-analysis/merge_requests): Want to contribute code or documentation? We'd love that! If you need help to get started, GitHub as [documentation](https://help.github.com/articles/about-pull-requests/) on pull requests. We use the ["fork and pull model"](https://help.github.com/articles/about-collaborative-development-models/) were contributors push changes to their personnal fork and then create pull requests to the main repository. Please make your pull requests against the `master` branch.

As a reminder, all contributors are expected to follow our [Code of Conduct](CODE_OF_CONDUCT.md).


## License

static-analysis is distributed under the terms of the MIT license.

See [LICENSE](LICENSE) for details.
