<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactWith extends Model
{
    public function getTitle()
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case 'tm':
                return $this->title_tm;
                break;
            case 'ru':
                return $this->title_ru ?: $this->title_tm;
                break;
            case 'en':
                return $this->title_en ?: $this->title_tm;
                break;
            default:
                return $this->title_tm;
        }
    }


    public function getBody(){
        $locale = app()->getLocale();
        switch ($locale) {
            case 'tm':
                return $this->body_tm;
                break;
            case 'ru':
                return $this->body_ru ?: $this->body_tm;
                break;
            case 'en':
                return $this->body_en ?: $this->body_tm;
                break;
            default:
                return $this->body_tm;
        }
    }
}
