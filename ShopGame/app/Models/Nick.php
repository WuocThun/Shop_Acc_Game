<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nick extends Model
{

    use HasFactory;

    public $timestamps = false;
    protected $table = 'nick';
    protected $fillable
        = [
            'title',
            'attribute',
            'category_id',
            'price',
            'status',
            'description',
            'image',
            'ms',
        ];

    public
    function Category()
    {
        return $this->belongsTo(Category::class);
    }

}
