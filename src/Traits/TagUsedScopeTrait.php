<?php

namespace Designbycode\Taggable\Traits;

trait TagUsedScopeTrait
{
    public function scopeUsedGreaterOrEqual($query, $count)
    {
        return $query->where('count', '>=', $count);
    }

    public function scopeUsedGreaterThan($query, $count)
    {
        return $query->where('count', '>', $count);
    }

    public function scopeUsedLessOrEqual($query, $count)
    {
        return $query->where('count', '<=', $count);
    }

    public function scopeUsedLessThan($query, $count)
    {
        return $query->where('count', '<', $count);
    }
}
