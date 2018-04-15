<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Idea
 * @package App\Models
 * @version April 15, 2018, 4:36 am UTC
 *
 * @property string platform
 * @property string title
 */
class Idea extends Model
{
    use SoftDeletes;

    public $table = 'ideas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'platform',
        'title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'platform' => 'string',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'platform' => 'required',
        'title' => 'required'
    ];

    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'idea_categories')->withTimestamps();
    }

    public function assignCategory($category_id){
        $this->categories()->attach($category_id);
    }
}
