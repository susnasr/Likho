<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'location',
        'phone_number',
        'bio',
        'slug',
        'facebook_url',
        'twitter_url',
        'github_url',
        'linkedin_url'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the URL for the user's profile photo.
     *
     * @return string
     */
    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_image) {
            $timestamp = $this->updated_at ? $this->updated_at->timestamp : time();
            $url = asset('/storage/' . $this->profile_image . '?t=' . $timestamp);
            \Log::info('Generated URL: ' . $url);
            return $url;
        }
        \Log::info('Falling back to Gravatar, Profile Image: ' . $this->profile_image);
        return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email))) . '?s=150&d=identicon';
    }

    /**
     * Get the posts for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            if (!$user->slug) {
                $user->slug = Str::slug($user->name); // Auto-generate slug from name
            }
        });
    }
}
