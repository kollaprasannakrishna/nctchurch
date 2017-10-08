<?php
namespace App\Http\Composers;
use App\Category;
use App\Event;
use App\Post;
use App\Series;
use App\Tag;

/**
 * Created by PhpStorm.
 * User: Prasanna Krishna
 * Date: 2/26/2017
 * Time: 3:10 PM
 */

class ViewComposer
{
    public function toNav($view){
        $events=Event::take(3)->where('active','YES')->orderBy('date','asc')->get();

        $view->with('upcomingEvents',$events);
    }

    public function toCategories($view){
        $categories=Category::take(5)->orderBy('id','desc')->get();

        $view->with('sideCategories',$categories);
    }
    public function toEvents($view){
        $events=Event::take(3)->where('active','YES')->orderBy('date','asc')->get();

        $view->with('sideEvents',$events);
    }
    public function toPosts($view){
        $posts=Post::take(3)->orderBy('id','desc')->get();

        $view->with('sidePosts',$posts);
    }
    public function toSeries($view){
        $series=Series::take(5)->orderBy('id','desc')->get();

        $view->with('sideSeries',$series);
    }
//    public function toSpeaker($view){
//
//    }
    public function toTags($view){
        $tags=Tag::take(16)->orderBy('id','desc')->get();

        $view->with('sideTags',$tags);
    }
}