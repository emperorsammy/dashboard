<?php

namespace App\Models\Admin\Province;

use App\Models\Admin\District\District;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable=[
        'created_by',
        'upated_by',
        'number',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function districts()
    {
        return $this->hasMany(District::class, 'province_id');
    }

}
