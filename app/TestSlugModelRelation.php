<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Padosoft\Sluggable\HasSlug;
use Padosoft\Sluggable\SlugOptions;

class TestSlugModelRelation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'titolo', 'descr',
    ];

    public function testslugmodel()
    {
        return $this->hasMany('App\TestSlugModel','testslugmodelrelation_ID', 'id');
    }
}