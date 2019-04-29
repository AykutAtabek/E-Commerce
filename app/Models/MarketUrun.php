<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketUrun extends Model
{
    use SoftDeletes;
    protected $table = "market_urun";

    protected $guarded = [];

    const CREATED_AT = 'olusturulma_tarihi';
    const UPDATED_AT = 'guncellenme_tarihi';
    const DELETED_AT = 'silinme_tarihi';


    public function marketler()
    {
        return $this->belongsToMany('App\Models\Market','market_urun');
    }
}