<?php namespace Bookrr\Product\Models;

use Model;


class Coupons extends Model
{

    public $table = 'bookrr_product_coupons';

    protected $guarded = ['*'];

    protected $dates = ['start','end'];

    #
    #   Accessor/Attribute
    #
    public function getStartFormatAttribute()
    {
        return $this->start->diffForHumans();
    }

    public function getEndFormatAttribute()
    {
        return $this->end->diffForHumans();
    }

}
