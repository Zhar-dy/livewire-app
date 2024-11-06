<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'user_id',
        'title'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeSearch($query, $search = null)
    {
        $query->where(function ($query2) use ($search){
            if ($search){
                $query2->where('title' , 'LIKE' , '%' . $search . '%');
            }
            return $query2;
        });
        return $query;
    }
}
