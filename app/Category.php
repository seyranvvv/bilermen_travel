<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [
        'id',
    ];
    /*    public $timestamps = false;*/
    public function tehnologies()
    {
        return $this->hasMany(Tehnology::class)
            ->orderBy('id', 'asc');
    }


    public function getName()
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case 'tm':
                return $this->name_tm;
                break;
            case 'ru':
                return $this->name_ru ?: $this->name_tm;
                break;
            case 'en':
                return $this->name_en ?: $this->name_tm;
                break;
            default:
                return $this->name_tm;
        }
    }
}
