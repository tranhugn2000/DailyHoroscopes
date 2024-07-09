<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoroscopePost extends Model
{
    use HasFactory;
    protected $fillable = [
        'seo_meta_id', 'locale', 'name', 'content', 
        'love_focus', 'lucky_number', 'lucky_colour'
    ];

    public function seoMeta()
    {
        return $this->belongsTo(SeoMeta::class);
    }

    public function scopeOfLocale($query)
    {
        return $query->where('locale', app()->getLocale());
    }
}
