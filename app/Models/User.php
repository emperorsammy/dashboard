<?php

namespace App\Models;

use App\Models\Admin\Province\Province;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function users_roles(){
        return $this->hasOne(UserRole::class, 'user_id');
    }


    public function provinceCreated()
    {
        return $this->hasMany(Province::class, 'created_by');
    }
    public function provinceUpdated()
    {
        return $this->hasMany(Province::class, 'updated_by');
    }

    public function districtCreated()
    {
        return $this->hasMany(Province::class, 'created_by');
    }
    public function districtUpdated()
    {
        return $this->hasMany(Province::class, 'updated_by');
    }

}
