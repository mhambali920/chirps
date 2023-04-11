<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'image', 'excerpt', 'body', 'published_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id', 'id');
    }

    public function getReadTimeAttribute()
    {
        $words_per_minute = 200;
        $word_count = str_word_count(strip_tags($this->body));
        $read_time = ceil($word_count / $words_per_minute);
        return $read_time;
    }
}
