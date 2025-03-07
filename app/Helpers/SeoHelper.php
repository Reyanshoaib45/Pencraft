<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class SeoHelper
{
    protected $title;
    protected $description;
    protected $keywords;
    protected $type = 'website';
    protected $image;
    protected $url;

    public function __construct()
    {
        $this->title = config('seo.default_title');
        $this->description = config('seo.default_description');
        $this->keywords = config('seo.default_keywords');
        $this->image = config('seo.default_image');
        $this->url = url()->current();
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function render()
    {
        // We need to make sure we're passing data to the view
        return [
            'title' => $this->title,
            'description' => $this->description,
            'keywords' => $this->keywords,
            'type' => $this->type,
            'image' => $this->image,
            'url' => $this->url
        ];
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Generate SEO meta tags for blog posts
     */
    public function forPost($post)
    {
        $this->setTitle($post->title)
            ->setDescription(Str::limit(strip_tags($post->content), 160))
            ->setKeywords($post->tags ?? config('seo.default_keywords'))
            ->setType('article')
            ->setImage($post->featured_image ?? config('seo.default_image'))
            ->setUrl(route('blog.show', $post->slug));

        return $this;
    }
}
