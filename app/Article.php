<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'excrept', 'categories_id', 'user_id'];

    public function setTitleAttribute ($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
    public function setSlugAttribute ($value) {
        $this->attributes['slug'] = str_slug($value);
    }
    public function setExcreptAttribute ($value) {
        $this->attributes['excrept'] = $value;
    }
    public function setContentAttribute ($value) {
        $this->attributes['content'] = $value;
    }

    public function category() {
        return $this->belongsTo('App\Category', 'categories_id');
    }
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }



}