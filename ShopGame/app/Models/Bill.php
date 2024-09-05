<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nick;

class Bill extends Model
{

    use HasFactory;
    use HasFactory;

    public $timestamps = false;
    protected $table = 'bill';
    protected $fillable
        = [
            'title',
            'customer_id',
            'nick_id',
            'total',
            'status',
        ];

    function Nick()
    {
        return $this->belongsTo(Nick::class);
    }



}
