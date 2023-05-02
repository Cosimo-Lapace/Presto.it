<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['path'];

    protected $casts = [
        'labels' => 'array'     //automaticamente label verrà catsato in un array
    ];


    public function article(){
        return $this->belongsTo(Article::class);
    }
    public static function getUrlBypath($filePath , $w = null ,$h= null ){
        if(!$w && !$h){
            return Storage::url($filePath);
        }
        $path = dirname($filePath);
        
        $filename = basename($filePath);

        $file = "{$path}/crop_{$w}x{$h}_{$filename}";

        return Storage::url($file);
    }
    public function getUrl($w = null , $h= null){
        return Image::getUrlBypath($this->path , $w , $h); 
    }
}
