<?php

	namespace Designbycode\Taggable\Traits;

	trait TaggableScopeTrait
	{
        /**
         * @param $query
         * @param array $tags
         * @return mixed
         */
        public function scopeWithAnyTag($query, array $tags)
        {
            return $query->hasTags($tags);
        }

        /**
         * @param $query
         * @param array $tags
         * @return mixed
         */
        public function scopeWithAllTags($query, array $tags): mixed
        {
            foreach ($tags as $tag) {
                $query->hasTags([$tag]);
            }
            return $query;
        }

        /**
         * @param $query
         * @param array $tags
         * @return mixed
         */
        public function scopeHasTags($query, array $tags)
        {
            return $query->whereHas('tags', function($query) use ($tags) {
                return $query->whereIn('slug', $tags);
            });
        }

	}
