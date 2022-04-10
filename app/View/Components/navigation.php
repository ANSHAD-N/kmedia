<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navigation extends Component
{
    
   public $show_navigation= True;
   public $show_panel= True;
   public $admin_sidebar=array(
       array("name"=>"Home","url"=>"/admin","icon"=>"home"),
       array("name"=>"Upload Content","url"=>"/upload","icon"=>"upload"),
       array("name"=>"Advertisment","url"=>"/ad","icon"=>"ad")
   );
   public $user_sidebar=array(
    array("name"=>"Home","url"=>"/","icon"=>"home"),
    array("name"=>"Trending","url"=>"/trending","icon"=>"fire"),
    array("name"=>"video","url"=>"/video","icon"=>"video")
);
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $navigation ,$panel )
    {
            $this-> show_navigation = $navigation;
            $this-> show_panel = $panel;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navigation');
    }
}
