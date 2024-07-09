<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMetaTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['seo_meta_id', 'locale', 'title', 'description'];

    public function seoMeta()
    {
        return $this->belongsTo(SeoMeta::class);
    }
}
