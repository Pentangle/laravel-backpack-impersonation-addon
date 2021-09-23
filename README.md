# Backpack for Laravel Addon allows backpack users to impersonate other users

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pentangle/laravel-backpack-impersonation-addon.svg?style=flat-square)](https://packagist.org/packages/pentangle/laravel-backpack-impersonation-addon)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/pentangle/laravel-backpack-impersonation-addon/run-tests?label=tests)](https://github.com/pentangle/laravel-backpack-impersonation-addon/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/pentangle/laravel-backpack-impersonation-addon/Check%20&%20fix%20styling?label=code%20style)](https://github.com/pentangle/laravel-backpack-impersonation-addon/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/pentangle/laravel-backpack-impersonation-addon.svg?style=flat-square)](https://packagist.org/packages/pentangle/laravel-backpack-impersonation-addon)



## Installation

You can install the package via composer:

```bash
composer require pentangle/laravel-backpack-impersonation-addon
```

## Setup

add the trait to the desired user model

````
use UserImpersonationTrait;
````

override the existing functions by adding them to the model

````
    /**
     * @return bool
     */
    public function canImpersonate()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function canBeImpersonated()
    {
        return true;
    }

    public function impersonateButton($crud = false)
    {
        return '<a href="'.route("impersonate", $this->id).'">Impersonate this user</a>';
    }
````

add the following code to the ModelCrudController

````
$this->crud->addButton('line', 'impersonateButton', 'model_function', 'impersonateButton');
````

Publish the config file to configure custom routes
````
php artisan vendor:publish --tag=impersonate
````


config/laravel-impersonate.php

````

    /**
     * The session key used to store the original user id.
     */
    'session_key' => 'impersonated_by',

    /**
     * The session key used to stored the original user guard.
     */
    'session_guard' => 'impersonator_guard',

    /**
     * The session key used to stored what guard is impersonator using.
     */
    'session_guard_using' => 'impersonator_guard_using',

    /**
     * The default impersonator guard used.
     */
    'default_impersonator_guard' => 'web',

    /**
     * The URI to redirect after taking an impersonation.
     *
     * Only used in the built-in controller.
     * * Use 'back' to redirect to the previous page
     */
    'take_redirect_to' => '/',

    /**
     * The URI to redirect after leaving an impersonation.
     *
     * Only used in the built-in controller.
     * Use 'back' to redirect to the previous page
     */
    'leave_redirect_to' => '/',
````

[comment]: <> (## Testing)

[comment]: <> (```bash)

[comment]: <> (composer test)

[comment]: <> (```)

[comment]: <> (## Changelog)

[comment]: <> (Please see [CHANGELOG]&#40;CHANGELOG.md&#41; for more information on what has changed recently.)

[comment]: <> (## Contributing)

[comment]: <> (Please see [CONTRIBUTING]&#40;.github/CONTRIBUTING.md&#41; for details.)

[comment]: <> (## Security Vulnerabilities)

[comment]: <> (Please review [our security policy]&#40;../../security/policy&#41; on how to report security vulnerabilities.)

## Credits

- [Séan Poynter-Smith](https://github.com/Pentangle)

[comment]: <> (- [Spatie]&#40;../../contributors&#41;)
[comment]: <> (- [404]&#40;../../contributors&#41;)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
