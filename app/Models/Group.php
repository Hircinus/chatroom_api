<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Group extends Model
{
    use HasFactory;
	//public $timestamps = false;
    /**
     * Explicit table name example
     * Otherwise it assumes that the table name is the plural form 
     * of the model name and in this case for Item model the table name should be items. 
     */
    //protected $table = 'tbl_items'; in case your table name convention is different
    protected $fillable=[
        'user_1_id',
        'user_2_id'
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}