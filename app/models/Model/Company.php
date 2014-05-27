<?php

namespace Model;

use Fairtrade\Map;
use URL, File;
class Company extends \Eloquent
{
    protected $table = 'companies';
    public $timestamps = true;
    protected $softDelete = true;
    protected $appends = ['image_url', 'thumbnail_url'];
    private $image_path = 'uploads/logos/';

    public static function boot()
    {
        parent::boot();

        Company::saving(function ($company) {

            if (is_null($company->accepted))
            {
                $company->accepted = 0;
            }

            if (!isset($company->lng) && !isset($company->lng)) {
                $coords = Map::convertAddress($company->postal_code, $company->address);
                $company->lat = $coords['lat'];
                $company->lng = $coords['lng'];
            }
        });

        Company::creating(function ($company) {
            if (\Auth::check())
                $company->user_id = \Auth::user()->id;
        });
    }

    public function getIntroAttribute()
    {
        return \Fairtrade\Util::truncate($this->attributes["description"], 200);
    }

    public function categories()
    {
        return $this->belongsToMany('Model\Category', 'companies_categories', 'company_idz', 'category_id');
    }

    public function getImageUrlAttribute()
    {
        return URL::asset( $this->image_path . $this->logo );
    }

    public function getThumbnailUrlAttribute()
    {
        $thumbnail = $this->image_path. 't/'. $this->logo;

        if( File::exists( $thumbnail )){
            return URL::asset($thumbnail);
        }

        return URL::asset( $this->image_path . $this->logo );
    }

    public function linkedCategory(){
        return $this->belongsTo('Model\Category', 'category', 'id');
    }
}