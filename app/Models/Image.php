<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }

    protected function path(): Attribute
    {
        return Attribute::make(
            get: fn (string|null $value) => $value !== null ? asset($value) : null,
        );
    }
}
