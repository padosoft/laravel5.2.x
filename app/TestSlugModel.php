<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Padosoft\Sluggable\HasSlug;
use Padosoft\Sluggable\SlugOptions;

class TestSlugModel extends Model
{
    use HasSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom([
                ['testslugmodelrelation.name','name'],
                'titolo',
            ])
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(255);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'titolo', 'descr', 'testslugmodelrelation_ID',
    ];

    public function testslugmodelrelation()
    {
        return $this->belongsTo('App\TestSlugModelRelation', 'testslugmodelrelation_ID');
    }
}