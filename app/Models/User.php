<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'link',
        'name',
        'email',
        'password',
        'role_id',
        'about',
        'isBan',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function banStatus(User $user)
    {
        return $user->isBan;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function contactInformation()
    {
        return $this->belongsToMany(ContactInformation::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function posts()
    {
        return $this->hasManyThrough(Post::class, Project::class,);
    }

    public function sendPasswordResetNotification($token)
    {
        $url = config('app.url') . '/reset-password/' . $token;
        $this->notify(new ResetPasswordNotification($url));
    }

}
