<?php

namespace App\Models\Admin\District;

use App\Models\Admin\Province\Province;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable=[
        'province_id',
        'name',
        'slug',
        'created_by',
        'updated_by',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function getRules($id='')
    {
        return $rules=[
            'name'=>'required|unique:districts',
            'province'=>'required',
        ];
        if($id!==''){
            $rules['name']='required|unique:districts,name,'.$id;
        }
        return $rules;
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

}
