<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // function index($page=1){
    //     echo $page;
    //     echo "<br>";
    //     echo "Hello Controller";
    // }
    // function index(Request $req){
    //     // dd($req);
    //     echo $req->page;
    // }

    function detail(){
        echo "Detail page";
    }


    function index(Request $req){
        $page = $req->page;
        $name = "KPT";
        $nickName = "<i>Tí</i>";
        $arraySubject = [
            'PHP',
            'Nodejs',
            'Angular',
            'iOS',
            'MySQL'
        ];
        return view('home', compact('page','name','nickName','arraySubject'));

        // return view('home',[
        //     'page'=>$page,
        //     'name'=>$name
        // ]);

    }

    function callView(){
        return view('form-get');
    }

    function receiveData(Request $request){
        
        echo $request->fullname;
        echo '<br>';
        echo $request->email;
        echo '<br>';
        echo $request->password;

        dd($request->all());
        
    }

}
