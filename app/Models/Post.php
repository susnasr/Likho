<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'views', 'likes', 'image_url', 'tags', 'read_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count(); // Use relationship count
    }

    public function isLikedByUser($user = null)
    {
        $user = $user ?? auth()->user();
        return $user ? $this->likes()->where('user_id', $user->id)->exists() : false;
    }

    public function calculateReadTime()
    {
        $wordCount = str_word_count($this->content ?? '');
        $seconds = max(ceil($wordCount * (60 / 200)), 1); // 1 second minimum, 3.33 words per second
        return $seconds;
    }

    public function getFormattedReadTimeAttribute()
    {
        $seconds = $this->calculateReadTime();
        if ($seconds < 60) {
            return "$seconds second" . ($seconds == 1 ? '' : 's') . " to read";
        }
        $minutes = floor($seconds / 60);
        $remainingSeconds = $seconds % 60;
        return "$minutes minute" . ($minutes == 1 ? '' : 's') .
            ($remainingSeconds > 0 ? " $remainingSeconds second" . ($remainingSeconds == 1 ? '' : 's') : '') . " to read";
    }
}
