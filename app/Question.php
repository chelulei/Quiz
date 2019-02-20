<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    use VotableTrait;

    protected $fillable = ['category_id','title','body','user_id'];

    protected  $perPage =5;


    public function user (){
        return $this->belongsTo(User::class);
    }
    public function category (){
        return $this->belongsTo(Category::class);
    }

    public function setTitleAttribute ($value){

        $this->attributes['title']=$value;
        $this->attributes['slug']=str_slug($value);

    }



    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function getUrlAttribute (){

      return route("questions.show",$this->slug);

    }

    public function getDateAttribute (){

        return   $this->created_at->diffForHumans();

    }

    public function getStatusAttribute (){

        if( $this->answers_count > 0){

            if($this->best_answer_id){

                return "answered-accepted";

            }

          return "answered";

        }
        return "unanswered";
    }

    public function getBodyHtmlAttribute()
    {
        return $this->bodyHtml();
    }

    public function answers (){
        return $this->hasMany(Answer::class);
    }

    public function BestAnswer(Answer $answer){

        $this->best_answer_id = $answer->id;

        $this->save();
    }

    public function favorites (){

        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function isFavorited (){

        return $this->favorites()->where('user_id', auth()->id())->count() > 0;
    }
    public function getIsFavoritedAttribute (){

        return $this->isFavorited ();
    }

    public function getFavoritesCountAttribute (){

        return $this->favorites->count();
    }

    public function getExcerptAttribute (){

        return str_limit( strip_tags($this->bodyHtml()),250);
    }

    public function bodyHtml(){

        return \Parsedown::instance()->text($this->body);
    }


    public function scopeFilter($query, $term)
    {
    // check if any term entered
        if ($term)
        {
        $query->where(function($q) use ($term) {
//                      $q->WhereHas('user', function($qr) use ($term) {
//                           $qr->orWhere( 'name', 'LIKE', "%{$term}%");
//                               });
//                        $q->WhereHas('category', function($qr) use ($term) {
//                            $qr->orWhere( 'title', 'LIKE', "%{$term}%");
//                        });
                        $q->orWhere('title', 'LIKE', "%{$term}%");
                        $q->orWhere('body', 'LIKE', "%{$term}%");
                    });
                }

            }


}
