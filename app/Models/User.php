<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * 一括代入を許可する属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'icon_image',
    ];

    /**
     * 配列・JSON変換時に非表示にする属性
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 自分が行っているフォロー
     */
    public function followings(): HasMany
    {
        return $this->hasMany(Follow::class, 'following_id');
    }

    /**
     * 自分に対するフォロー
     */
    public function followers(): HasMany
    {
        return $this->hasMany(Follow::class, 'followed_id');
    }

    /**
     * ユーザーの投稿
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function getIconImageUrlAttribute(): string
{
    // アイコン未設定ならデフォルト画像
    if (empty($this->icon_image)) {
        return asset('images/no-image.png');
    }

    // アップロード済み画像
    if (str_starts_with($this->icon_image, '/storage/')) {
        return $this->icon_image;
    }

    // public/images 内の画像
    return asset('images/' . $this->icon_image);
}
}
