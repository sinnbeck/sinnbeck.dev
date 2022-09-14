<?php
namespace App;

use App\Models\Post;


class NewsFeed
{
    public static function getFeedItems()
    {
       return Post::orderByDesc('created_at')->get();
    }
}