<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itm extends Model
{
    use HasFactory;

    protected $table = 'itms';

    protected $primaryKey = 'id';

    protected $fillable = [
        'internalId', 'itemid', 'displayname'
    ];
}
