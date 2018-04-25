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
        'title',
        'dev_id',
    ];

    protected $appends = ['user_id', 'category_id'];

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
        'categories' => 'required',
        'platform' => 'required',
        'title' => 'required'
    ];

    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'idea_categories')->withTimestamps();
    }

    public function users(){
        return $this->belongsToMany('App\User', 'ideas_users')->withTimestamps();
    }
    public function assignCategory($category_id){
        $this->categories()->attach($category_id);
    }
    public function scopeDreamer(){
        return $this->users()->where('type', 'Dreamer');
    }
    public function scopeCreator(){
        return $this->users()->where('type', 'Creator');
    }
    public function devs(){
        return $this->belongsTo('App\User', 'dev_id');
    }
    public function getUserIdsAttribute(){
        return $this->users->pluck('id')->all();
    }
    public function getCategoryIdsAttribute(){
        return $this->categories->pluck('id')->all();
    }

}
