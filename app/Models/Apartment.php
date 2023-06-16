<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $guarded = ['slug', 'longitude', 'latitude', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class)->withTimestamps();
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withTimestamps();
    }
}
