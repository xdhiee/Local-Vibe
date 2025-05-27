<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'destination';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'location',
        'region_id',
        'category_id',
        'featured_image',
        'opening_hours',
        'ticket_price',
        'price_domestic',
        'price_foreign',
        'is_featured',
        'views'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function images()
    {
        return $this->hasMany(DestinationImage::class);
    }
}
