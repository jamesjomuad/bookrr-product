<?php namespace Bookrr\Product\Models;

use Model;
use Config;


class Products extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    public $table = 'bookrr_products';

    protected $guarded = ['*'];

    protected $hidden = ['status','hash','created_at','updated_at','deleted_at'];

    protected $jsonable = ['options','features'];

    protected $rules = [
        'name' => 'required|',
        'price' => 'required'
    ];

    public $attachMany = [
        'images' => 'System\Models\File'
    ];

    public $belongsToMany = [
        'category' => [
            'Bookrr\Product\Models\Category',
            'table' => 'bookrr_product_category_pivot',
            'key' => 'product_id',
            'otherKey' => 'category_id', 
        ],
        'orders' => [
            'Bookrr\Product\Models\Orders'
        ]
    ];

    #
    #   Options
    #
    public function getIconOptions()
    {
        return Config::get('bookrr.product::icons');
    }

    #
    #   Accessor/Attribute
    #
    public function getSummaryAttribute()
    {
        if($this->description)
        {
            return str_limit(\Html::strip($this->description).'...', 200); 
        }
    }

    public function getThumbAttribute()
    {
        if($this->images->first())
        {
            return  $this->images->first()->getThumb(80,80);
        }
        return null;
    }

    public function getSmallThumbAttribute()
    {
        if($this->images->first())
        {
            return  $this->images->first()->getThumb(100,100);
        }
        return null;
    }

    public function getMediumThumbAttribute()
    {
        if($this->images->first())
        {
            return  $this->images->first()->getThumb(350,350);
        }
        return null;
    }

    public function getLargeThumbAttribute()
    {
        if($this->images->first())
        {
            return  $this->images->first()->getThumb(600,600);
        }
        return null;
    }

    public function getFullThumbAttribute()
    {
        if($this->images->first())
        {
            return  $this->images->first()->path;
        }

        return null;
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (float)$value;
    }

}
