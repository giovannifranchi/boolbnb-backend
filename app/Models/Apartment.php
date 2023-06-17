<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function latestPlan()
    {
        return $this->belongsToMany(Plan::class)
        ->withTimestamps()
        ->orderBy('expire_date', 'desc')
        ->take(1); 
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withTimestamps();
    }

    protected function thumb(): Attribute
    {
        return Attribute::make(
            get: fn(string|null $value) => $value !== null ? asset($value) : null,
        );
    }
}
