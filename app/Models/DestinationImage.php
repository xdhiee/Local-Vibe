<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'image_path',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke model Destination
     */
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    /**
     * Accessor untuk mendapatkan URL lengkap gambar
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }

    /**
     * Scope untuk gambar yang valid
     */
    public function scopeValid($query)
    {
        return $query->whereNotNull('image_path')
                    ->where('image_path', '!=', '');
    }

    /**
     * Boot method untuk event handling
     */
//     protected static function boot()
//     {
//         parent::boot();

//         // Event ketika menghapus gambar, hapus file fisiknya juga
//         static::deleting(function ($image) {
//             if ($image->image_path && \Storage::exists('public/' . $image->image_path)) {
//                 \Storage::delete('public/' . $image->image_path);
//             }
//         });
//     }
}