<?php

namespace Designbycode\Taggable;

use Designbycode\Taggable\Observers\TaggableObserver;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TaggableServiceProvider extends PackageServiceProvider
{

    public function boot()
    {
        Tag::observe(classes: TaggableObserver::class);
        return parent::boot();
    }

    public function configurePackage(Package $package): void
    {

        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-tags')
            ->hasConfigFile()
            ->hasMigration('create_tags_table')
            ->hasMigration('create_taggable_table');
//          ->hasViews()
//          ->hasCommand(TagCommand::class);
    }
}
