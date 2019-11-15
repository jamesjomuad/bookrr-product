<?php namespace Bookrr\Product\Models;

use Model;

/**
 * Category Model
 */
class Category extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'bookrr_product_categories';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    #
    #   Filters
    #
    public function filterFields($fields, $context = null)
    {
        $fields->slug->value = str_slug($fields->name->value,'-');
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

}
