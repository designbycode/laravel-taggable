<?php namespace Designbycode\Tag\Database\Factories;

use Designbycode\Taggable\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition()
    {
        $name = $this->faker->unique()->colorName();
        return [
            'name' => $name,
            'slug' => Str::slug($name)
        ];
    }
}

