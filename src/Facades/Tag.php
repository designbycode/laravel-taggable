<?php

namespace Designbycode\Taggable\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Designbycode\Taggable\Tag
 */
class Tag extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Designbycode\Taggable\Tag::class;
    }
}
