<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = 'category_post'; // set up the connection to the table manually
    public $timestamps = false; //turn off time stamps
    protected $fillable = ['category_id','post_id']; // allows the column written inside the brackets to accept data from an array

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
