<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

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

    function getUpload(){
        return view('file.upload');
    }

    function postUpload(Request $req){
        /*
            if($req->hasFile('avatar')){
                $file = $req->file('avatar');
                $name = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                if($size>2*1024*1024){
                    return redirect()->back()->with('error','File too large.');
                }  
                //png, jpg , gif 
                $arrExt = ['png','jpg','gif'];
                if(!in_array($ext,$arrExt)){
                    return redirect()->back()->with('error','File not allow.');
                }   
                $newName = str_random(10).'-'.$name;
                $file->move('images',$newName);
            }
            else{
                return redirect()->back()->with('error','Flz choose a file');   
            }
        */

        if($req->hasFile('avatar')){
            $file = $req->file('avatar');
            foreach($file as $image){
                $name = $image->getClientOriginalName();
                // validate
                $newName = str_random(10).'-'.$name;
                $image->move('images',$newName);
            }
        }
        else{
            //thong bao loi
        }
    }
    function getHomePage(){
        return view('pages.index');
    }

    function getDetailPage(){
        return view('pages.detail');
    }
    function getTypePage(){
        return view('pages.type');
    }

    function queryBuilder(){
        // DB::table('type')->insert([
        //     'name'=>'Loai 1',
        //     'detail'=>"Mo ta cho loai 1"
        // ]);
        // $id = DB::table('type')->insertGetId([
        //     'name'=>'Loai 2',
        //     'detail'=>"Mo ta cho loai 2"
        // ]);
        // return $id;

        // DB::table('type')->where('id',3)
        //                 ->update([
        //                     'name'=>'Loai 3',
        //                     'detail'=> "Mo ta cho l3"
        //                 ]);
    
        // DB::table('type')->whereIn('id',[1,3])
        //                 ->update([
        //                     'created_at'=>date('Y-m-d H:i:s',time())
        //                 ]);

        // DB::table('type')->where('id','>=',3)
        //                 ->update([
        //                     'created_at'=>date('Y-m-d H:i:s',time())
        //                 ]);
        
        DB::table('type')->where('id','>',3)->delete();
        echo "thanh cong";
    }
}

