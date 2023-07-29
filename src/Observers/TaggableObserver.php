<?php
    namespace Designbycode\Taggable\Observers;
    use Designbycode\Taggable\Tag;
    use Illuminate\Support\Str;

    class TaggableObserver
    {

        public function creating(Tag $tag): void
        {
            $tag->name = Str::headline($tag->name);
            $tag->slug = Str::slug($tag->name);
        }

        public function updating(Tag $tag): void
        {
            $tag->name = Str::headline($tag->name);
            $tag->slug = Str::slug($tag->name);
        }

    }
