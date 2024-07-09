<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    use HasFactory;

    protected $fillable = ['slug'];

    public function translations()
    {
        return $this->hasMany(SeoMetaTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(SeoMetaTranslation::class)->where('locale', app()->getLocale());
    }
}
