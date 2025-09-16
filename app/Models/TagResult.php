<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagResult extends Model
{
    use HasFactory;
    protected $table = 'tagcheck';

    public static function getTagCheck($data)
    {
        $tag                =   TagResult::where('chipcode', $data['chipcode'])->first() ?? new TagResult ;
        $tag->bib           =   $data['bib'] ;
        $tag->lastName      =   $data['lastName'] ;
        $tag->firstName     =   $data['firstName'] ;
        $tag->gender        =   $data['gender'] ;
        $tag->type          =   $data['type'] ;
        $tag->dob           =   $data['dob'] ;
        $tag->age           =   $data['age'] ;
        $tag->contest       =   $data['contest'] ;
        $tag->category      =   $data['category'] ;
        $tag->race          =   $data['race'] ;
        $tag->chipcode      =   $data['chipcode'] ;
        $tag->finishtime    =   $data['finishtime'] ;
        $tag->chiptime      =   $data['chiptime'] ;
        $tag->pace          =   $data['pace'] ;
        $tag->save();
    }
}
