<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'handphone',
        'birth_date',
        'birth_place',
        'gender',
        'address',
        'profession',
        'photo',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function auctioneer()
    {
        return $this->hasMany(Auctioneer::class, 'id_user');
    }

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'id_kurir');
    }

    public function routeNotificationEmail($notification)
    {
        return $this->email;
    }
}
