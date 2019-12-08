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
            return $post->published_at < now();
        });
    }

    public function whereSlug($slug)
    {
        return $this->filter(function (BlogPost $post) use ($slug) {
            return $post->slug == $slug;
        });
    }

    public function whereId($id)
    {
        return $this->filter(function (BlogPost $post) use ($id) {
            return $post->id == $id;
        });
    }
}
