<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presensi extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';

    protected $fillable = [
        'date', 'date_in', 'time_in', 'latitude_in','longitude_in', 'date_out','time_out','latitude_in','longitude_out'
    ];

    public static function boot()
     {
        parent::boot();
        static::creating(function($model)
        {
            $user = Auth::user();           
            $model->created_by = $user->id;
            $model->updated_by = $user->id;
        });
        static::updating(function($model)
        {
            $user = Auth::user();
            $model->updated_by = $user->id;
        });  
        
        static::deleting(function($model)
        {
            $user = Auth::user();
            $model->deleted_by = $user->id;
            $model->save();
        }); 
    }

    public function created_by() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function updated_by() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function deleted_by() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
