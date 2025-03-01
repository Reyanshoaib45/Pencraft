
<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture',
        'bio',
        'twitter',
        'facebook',
        'linkedin',
        'instagram',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the posts for the user.
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }
    
    /**
     * Get published posts for the user.
     */
    public function publishedPosts()
    {
        return $this->posts()->where('is_published', true);
    }
    
    /**
     * Get draft posts for the user.
     */
    public function draftPosts()
    {
        return $this->posts()->where('is_published', false);
    }
    
    /**
     * Get total views count for all user's posts.
     */
    public function getTotalViewsAttribute()
    {
        return $this->posts()->sum('views');
    }
    
    /**
     * Get total likes count for all user's posts.
     */
    public function getTotalLikesAttribute()
    {
        return $this->posts()->sum('likes');
    }
}
