<?php

namespace Pentangle\LaravelBackpackImpersonationAddon;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelBackpackImpersonationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-backpack-impersonation-addon');
    }
}
