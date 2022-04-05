<?php

namespace App\Http\Controllers;

use App\Models\content;
use App\Models\polling;
use App\Models\polling_options;
use App\Models\text_content;
use App\Models\ad;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class content_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $content=content::latest()->paginate(15);
     return view('news.index',compact('content'))
     ->with('i',(request()->input('page',1)-1)* 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $now= Carbon::now();
        $content = new content();
        $content->title = $request->input("title");
        if($request->hasFile('thumbnail'))
        {
            $file= $request-> file('thumbnail');
            $extension= $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('img/news/',$filename);
            $content->thumbnail = $filename;
        }
        $content->url = $request->input("url");
        if($request->status=='off'){
            $content->poll=1;
        }
        $content->created_at = $now;
        $content->updated_at = $now;
        $content->save();
        $val1 = request()->get('text_content');
            for ($i=0; $i < $val1 ; $i++) { 
                $text_content = new text_content();
                $items1 = (string)$i."content_title";
                $items = (string)$i."content_text";
                $text_content->content_title=$request->input($items1 );
                $text_content->content_text=$request->input($items );
                $text_content->content_id= $content->id;
                $text_content->save();
            }
        if($request->status=='off'){
            $polling = new polling();
            $polling->question = $request->input("polling_question");
            $polling->content_id = $content->id;
            $polling->created_at = $now;
            $polling->updated_at = $now;
            $polling->save();
            $val2 = request()->get('polling_option');
            for ($i=0; $i < $val2 ; $i++) { 
                $polling_options = new polling_options();
                $items2 = (string)$i."op";
                $polling_options->option=$request->input($items2 );
                $polling_options->vote=0;
                $polling_options->polling_id= $polling->id;
                $polling_options->save();
            }
        }
        $ad = new ad();
        $ad->adtitle = $request->input("adurl");
        if($request->hasFile('adthumbnail'))
        {
            $file= $request-> file('adthumbnail');
            $extension= $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('img/ad/',$filename);
            $ad->adthumbnail = $filename;
        }
        $ad->content_id = $content->id;
        $ad->save();
       return redirect()->to('/admin');
    }
    public function storead(Request $request)
    {
       
        $ad = new ad();
        $ad->adtitle = $request->input("adurl");
        if($request->hasFile('adthumbnail'))
        {
            $file= $request-> file('adthumbnail');
            $extension= $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('img/ad/',$filename);
            $ad->adthumbnail = $filename;
        }
        $ad->save();
       return redirect()->to('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\content  $content
     * @return \Illuminate\Http\Response
     */
    
    public function show()
    {
        // $data=content::orderBy('id', 'DESC')->get();
        // // return $data;
        // return  view('news.index', compact('data'));
        $data=content::latest()->paginate(16);
     return view('news.index',compact('data'))
     ->with('i',(request()->input('page',1)-1)* 16);
    }
    public function adminshow()
    {
        $data=content::latest()->paginate(16);
        return view('news.admin',compact('data'))
        ->with('i',(request()->input('page',1)-1)* 16);
        
    }
    
    public function showv()
    {
        $data=content::orderBy('id', 'DESC')->paginate(16);
        // return $data;
        return  view('news.video', compact('data'))
        ->with('i',(request()->input('page',1)-1)* 16);;
        
    }
    public function showtrending()
    {
        $data=content::orderBy('view', 'DESC')->paginate(16);
        // return $data;
        return  view('news.trending', compact('data'))
        ->with('i',(request()->input('page',1)-1)* 16);;
        
    }
    public function show_detail($id)
    {
        $contents = content::with(['polling.polling_options','text_content','ad'])->where('id',$id)->first();
        $content = content::find($id);
        $content->view++;
        $content->save();
        $data=content::latest()->paginate(9);  
        return  view('news.detail')
        ->with('contents', $contents)
        ->with('data', $data);
        
    }
    public function show_detailadmin($id)
    {
        $contents = content::with('polling.polling_options')->where('id',$id)->first();
        $data=content::latest()->paginate(9);  
        return  view('news.admin_detail')
        ->with('contents', $contents)
        ->with('data', $data);
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $now= Carbon::now();
        $content = content::find($id);
        $content->title = $request->input("title");
        if($request->hasFile('thumbnail'))
        {
            $file= $request-> file('thumbnail');
            $extension= $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('img/news/',$filename);
            $content->thumbnail = $filename;
        }
        $content->url = $request->input("url");
        $content->updated_at = $now;
        $content->save();
        
        
        $content->where('id','=',$id)->first();
        if($request->status=='off'){
            $polling = polling::where('content_id','=',$id)->get();
            $polling->question = $request->input("polling_question");
            $polling->content_id = $content->id;
            $polling->created_at = $now;
            $polling->updated_at = $now;
            $polling->save();
            echo"$polling";
            $polling_options = polling_options::where('polling_id','=','$polling')->get();
            foreach($polling_options as $poll) { 
                $polling_options->option=$request->input('polling_options' );
                $polling_options->save();
                echo"$polling_options";
            }
        }
       return view('news.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
       {
          DB::delete('DELETE FROM content WHERE id = ?', [$id]);
          return redirect()->route('admin');
        }

    function check(Request $request)
    {
       
    }
    public function addview($id)
    {
        $content = content::find($id);
        $content->view++;
        $content->save();
        return redirect()->route('admin_detail/'.$id);

    }
    public function addvote($id)
    {
        $polling_options = polling_options::find($id);
        $polling_options->vote++;
        $polling_options->save();
        return redirect()->back();
        
    }
    public function search(Request $request)
    {
        $data=$request->key;
        $content = content::where('title','=',$data)->get();
        return  view('news.index', compact('content'))
        ->with('i',(request()->input('page',1)-1)* 16);

    }
}
