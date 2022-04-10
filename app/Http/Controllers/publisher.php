<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\content;
use app\Models\polling;
use app\Models\polling_options;

class publisher extends Controller
{
    public $content_id;
    public $question_id;
    
    
    //
   public function insertion(Request $req )
    {   
            
        //    $content= new ;
        //    $content->title=$req->title;
        //    $content->tumbnail=$req->thumbnail;
        //     $content->url=$req->url;
        //     $content->content_text=$req->content;
        //     $content->save();
    //         $content_id = DB::getPdo()->lastInsertId();
    //         $this->content_id=$content_id;

    //        $polling= new polling;
    //        $polling->question= $req->question;
    //        $polling->content_id= $content_id;
    //        $polling->save();
    //         $question_id = DB::getPdo()->lastInsertId();
    //         $this->question_id=$question_id;
    //     for($i = 1;$i<=$req->polling_question_count;$i++){
    //             $polling_options= new polling_options;
    //             $polling_options->option_text= $req->polling_option;
    //             $polling_options->polling_id= $req->$question_id;
    //             $polling_options->save();
        
            
    //     }
    //     echo "Record inserted successfully.<br/>";
    // echo '<a href = "/insert">Click Here</a> to go back.';
    }
    
    
    public function show(){
        $users = DB::select('select * from content');
        return view('index',['contents'=>$users]);
        }
}

