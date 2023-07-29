<?php

	namespace Designbycode\Taggable\Traits;

	use Designbycode\Taggable\Tag;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\MorphToMany;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Collection;
    use Illuminate\Support\Str;

    /**
     * @method morphToMany(string $class, string $string)
     */
    trait TaggableTrait
	{
        use TaggableScopeTrait;


        /**
         * Get all tags for Model
         * @return MorphToMany
         */
        public function tags(): MorphToMany
        {
            return $this->morphToMany(Tag::class, 'taggable');
        }

        /**
         * @param $tags
         * @return void
         */
        public function tag($tags): void
        {
            $this->addTags($this->getWorkableTags($tags));
        }

        /**
         * @param $tags
         * @return void
         */
        public function untag($tags = null): void
        {
            if ($tags === null) {
                $this->removeAllTags();
                return;
            }
            $this->removeTags($this->getWorkableTags($tags));
        }

        /**
         * @param $tags
         * @return void
         */
        public function retag($tags): void
        {
            $this->removeAllTags();

            $this->tag($tags);
        }

        private function getWorkableTags($tags)
        {
            if (is_array($tags)) return $this->getTagModels($tags);

            if ($tags instanceof Model) return $this->getTagModels([$tags->slug]);

            return $this->filterTagsCollection($tags);
        }

        private function getTagModels(array $tags)
        {
            return Tag::whereIn('slug', $this->normalizeTagNames($tags))->get();
        }

        private function normalizeTagNames(array $tags): array
        {
            return array_map(callback: fn($tag) => Str::slug($tag), array: $tags);
        }

        private function filterTagsCollection(Collection $tags): Collection
        {
            return $tags->filter(function($tag) {
                return $tag instanceof Model;
            });
        }

        private function addTags(Collection $tags): void
        {
            $sync = $this->tags()->syncWithoutDetaching($tags->pluck('id')->toArray());

            foreach (Arr::get($sync, 'attached') as $attachedId) {
                $tags->where('id', $attachedId)->first()->increment('count');
            }
        }

        private function removeTags(Collection $tags): void
        {
            $this->tags()->detach($tags);

            foreach ($tags->where('count', '>', 0) as $tag) {
                $tag->decrement('count');
            }
        }

        private function removeAllTags(): void
        {
            $this->removeTags(tags: $this->tags);
        }



    }
