<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    use HasFactory;
    protected $fillable =['title', 'user_id' , 'category','category_id','price','body','image','image2','image3','type'];

    public function category(){

        return $this->belongsTo(Category::class);

    }
    public function user(){
      return  $this->belongsTo(User::class);
    }
    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
    public function acceptArticle($value){
//questo metodo lo richiamiamo nel controller per prendere l'elemento $check e passare il valore che abbiamo inserito true ;

        $this->is_accepted = $value;
        $this->save();  //salvo l'elemnto
        return true;



    }
    public static function countRevisioned(){   //con questo metodo statico posso prendere tutti is_accepted nella tabella article e mostrarlo nella navbar e utilizzare il count
        $revisore = Auth::user()->id;
        return Article::where('is_accepted' , null)->where('user_id' , '!=' , $revisore)->count();
    }
    public function images(){
        return $this->hasMany(Image::class);
    }

}
