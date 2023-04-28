<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Category;
use App\Models\User;
use App\Models\country;
use App\Models\city;

class Order extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->hasMany(Service::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(country::class);
    }

    public function city()
    {
        return $this->belongsTo(city::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'comments');
    }

}
