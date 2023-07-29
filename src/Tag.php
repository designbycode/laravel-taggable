<?php

namespace Designbycode\Taggable;

use Designbycode\Taggable\Traits\TagUsedScopeTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereIn(string $string, array $normalizeTagNames)
 *
 * @property mixed|string $slug
 * @property mixed $name
 */
class Tag extends Model
{
    protected $fillable = ['name', 'slug', 'count'];

    use TagUsedScopeTrait;
}
