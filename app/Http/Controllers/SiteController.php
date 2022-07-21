<?php

namespace App\Http\Controllers;

use App\Repositories\MenusRepository;
use Illuminate\Http\Request;
use Menu;

class SiteController extends Controller
{
    protected $p_rep; //xranenie logiki po rabote portfolio
    protected $s_rep; // rabota so sliderom
    protected $a_rep; // article
    protected $m_rep; // rabota s punktom menyu

    protected $template; //shablon
    protected $vars = [];

    protected $contentRightBar = FALSE;
    protected $contentLeftBar = FALSE;
    protected $bar = FALSE;

    public function __construct(MenusRepository $m_rep) //opredelenie bvshix svoystv
    {
        $this->m_rep = $m_rep;
    }

    protected function renderOutput()//koncretniy otrabottaniy vid vozvrashaet
    {
        $menu = $this->getMenu();
        $navigation = view('pink.parts.navigation')->with('menu',$menu)->render();
        $this->vars = \Arr::add($this->vars,'navigation',$navigation);
        return view('pink.index')->with($this->vars);
    }

    protected function getMenu(){
        $menu = $this->m_rep->get();


        $mBuilder = Menu::make('MyNav', function ($m) use ($menu){
            foreach ($menu as $item){
                if($item->parent == 0){
                    $m->add($item->title,$item->path)->id($item->id);
                }
                else{
                    if ($m->find($item->parent)){
                        $m->find($item->parent)->add($item->title,$item->path)->id($item->id);
                    }
                }
            }
        });
        //dd($mBuilder);
        return $mBuilder;
    }

}
