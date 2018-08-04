<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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
        $rules = [
            'fullname' => "required|min:10|max:50",
            'email' => 'required|email',
            'age' => 'required|numeric',
            'password' => "required|min:6",
            're_password' => 'same:password',
            'image' => 'required|image'
        ];
        $trans = [
            'fullname.required' => "Họ tên không được rỗng",
            'fullname.min' => "Họ tên ít nhất :min kí tự",
            'fullname.max' => 'Họ tên không quá :max kí tự',
            're_password.same' => "Mật khẩu không giống nhau",
            //....
        ];
        $validator = Validator::make($request->all(),$rules,$trans);
        if($validator->fails()){
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        // echo $request->fullname;
        // echo '<br>';
        // echo $request->email;
        // echo '<br>';
        // echo $request->password;

        dd($request->all());
        
    }

}
