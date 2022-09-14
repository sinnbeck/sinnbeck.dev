<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\MarkdownConverter;
use Orbit\Concerns\Orbital;
use Torchlight\Commonmark\V2\TorchlightExtension;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements Feedable
{
    use Orbital;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'summary',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'date'
    ];

    public static function schema(Blueprint $table)
    {
        $table->integer('id');
        $table->string('title');
        $table->string('slug');
        $table->string('summary');
        $table->text('content');
        $table->timestamp('published_at');
    }

    public function getMarkdownAttribute()
    {
        $environment = new Environment();

        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new GithubFlavoredMarkdownExtension());
        $environment->addExtension(new TorchlightExtension());

        $converter = new MarkdownConverter($environment);
        return $converter->convertToHtml($this->content);
        return Str::of($this->content)->markdown();

    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->summary)
            ->updated($this->updated_at)
            ->link(url('posts/' . $this->slug))
            ->authorName('René Sinnbeck')
            ->authorEmail('-');
    }
}
