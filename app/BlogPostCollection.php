<?php

namespace App;

use Illuminate\Support\Collection;

/**
 * @method BlogPost|null first()
 */
class BlogPostCollection extends Collection
{
    /**
     * @return BlogPostCollection|BlogPost[]
     */
    public function onlyPublished()
    {
        return $this->filter(function (BlogPost $post) {
            return $post->getPublishedAt() < now();
        });
    }

    public function whereSlug($slug)
    {
        return $this->filter(function (BlogPost $post) use ($slug) {
            return $post->getSlug() == $slug;
        });
    }
}
