<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use SoftDeletes;

    protected $table = "market";
    protected $fillable = ['market_adi','slug'];

    const CREATED_AT = 'olusturulma_tarihi';
    const UPDATED_AT = 'guncellenme_tarihi';
    const DELETED_AT = 'silinme_tarihi';


}
