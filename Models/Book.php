<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable =[];

    protected $visible =[];
    
    protected $hiddlen= [];

    protected $cast = [];

    public function getName(){

    }

    public function setName(){

    }


    public static function createBook($data) {
    
    }

    public function scopeHasReleaseDate($query, $year = null){
        if($year){
            return $query->where('release_date',$year);

        }
        return $query;
    }
}
