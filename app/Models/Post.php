<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Like;
use App\Models\User;

class Post extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'category_id', 
        'user_id', 
        'title', 
        'slug', 
        'image_url', 
        'summary', 
        'content', 
        'views', 
        'is_active'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function tags() {
        return $this->hasMany(Tag::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
