<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\Products;
use App\Categories;
use PHPUnit\Runner\Exception;
use App\User;
use Hash;
use App\Slide;

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
        
        // DB::table('type')->where('id','>',3)->delete();
        // echo "thanh cong";

        // $types = DB::table('type')->get();
        // $types = DB::table('categories')->where('id','>=',6)->get();
        // foreach($types as $type){
        //     echo $type->name;
        //     echo "<br>";
        // }
        // $types = DB::table('categories')->where('id','=',6)->first();
        // echo $types->name;
        // dd($types);

        //echo DB::table('categories')->where('id','=',6)->value('name');
        // $data = DB::table('categories')
        //         ->select('name','id')
        //         ->where('id','=',6)
        //         ->first();
        // dd($data);
        
        // $data =  DB::table('products')->max('price');

        // $data = DB::table('products')
        //             ->orderBy('price','DESC')
        //             // ->limit(10)
        //             ->skip(6)
        //             ->take(10)
        //             ->get();
        
        // $data = DB::table('products as p')
        //         ->select('p.id as idsp','c.name as tenloai','p.name as tensp')
        //         // ->join('categories as c','c.id','=','p.id_type')
        //         ->join('categories as c',function($join){
        //             $join->on('c.id','=','p.id_type');
        //         })
        //         ->where([
        //             ['p.id','=',3],
        //             ['p.name','like','%iPhone 8%']
        //         ])
        //         // ->orWhere('p.id',2)
        //         // ->orWhere('p.id',3)
        //         ->get();
    
        // $data = DB::table('products as p')
        //         ->select('p.id as idsp','c.name as tenloai','p.name as tensp')
        //         ->join('categories as c',function($join){
        //             $join->on('c.id','=','p.id_type');
        //             $join->where([
        //                 ['p.id','=',3],
        //                 ['p.name','like','%iPhone 8%']
        //             ]);
        //         })
        //         ->get();
    
        // $data = DB::table('products as p')
        //         ->selectRaw('c.name, count(p.id) as soluong')
        //         ->join('categories as c','c.id','=','p.id_type')
        //         ->groupBy('c.name')
        //         ->get();

        $data = DB::select('select id, name, price from products where id=2 or id=4');
        dd($data);
    }

    function eloquentModel(){
        // $cate = Categories::get();  //select * from products
        // $cate = Categories::where('id','>',10)->get();
        // foreach($cate as $c){
        //     echo $c->id;
        //     echo "<br>";
        // }
        // try{

        //     // User::whereIn('id',[6,7])->delete();
        //     // echo "success";
        //     // $users = User::whereIn('id',[5,1])->get();
        //     // dd($users);
        //     // if(!empty($users->toArray())){
        //     //     //dung lenh xoa user
        //     //     foreach($users as $u){
        //     //         $u->delete();
        //     //     }
        //     // }
        //     // else{
        //     //     echo 'user rong';
        //     // }

        //     $user = User::where('id',7)->first();
        //     // dd($user);
        //     if($user){
        //         //xoa
        //         $user->delete();
        //     }
        //     else{
        //         echo "khong ton tai";
        //     }

        // }
        // catch(Exception $e){
        //     echo $e->getMessage();
        // }

        // $user = new User;
        // $user->username = "huong01";
        // $user->password = Hash::make('123456'); 
        // $user->fullname = "Huong 01";
        // $user->email = "huong01@gmail.comm";
        // $user->save();

        // Slide::create([
        //     'image'=>'hinh1.png',
        //     'link'=>'http://....',
        //     'title'=>'Hing 1',
        //     'status'=>1
        // ]);

        // $id = 8;
        // // $user = User::findOrFail($id);
        // $user = User::where('id',$id)->first();
        // if($user){
        //     $user->username = "huong03";
        //     $user->save();
        // }
        // else{
        //     echo "khong tim thay user";
        // }

        // $data = \App\PageUrl::with('product')
        //         ->where('id','>',110)
        //         ->get();

        // foreach($data as $page){
        //     echo $page->url;
        //     echo "****";
        //     echo $page->product->name;
        //     echo "<br>";
        // }
       
        // $data = \App\Products::with('pageUrl')
        //         ->where('id','>',90)
        //         ->get();
        // foreach($data as $product){
        //     echo $product->pageUrl->url;
        //     echo "****";
        //     echo $product->name;
        //     echo "<br>";
        // }

        //SELECT ...
        //FROM cate
        //INNER JOIN products
        //ON ..
        //GROUP BY cate.id

        // $cate = Categories::with('products')
        //         ->limit(5)->get();

        // foreach($cate as $loai){
        //     echo $loai->name;
        //     echo "<br>";
        //     foreach($loai->products as $product){
        //         echo "<li>".$product->name."</li>";
        //     }
        //     echo "<hr>";
            
        // }

        // $products = Products::with('category')->limit(10)->get();
        // foreach($products as $product){
        //     echo "<p>".$product->name;
        //     echo " - ";
        //     echo $product->category->name."</p>";
        // }
        // dd($products);

        //


        // $cate = Categories::with('pageUrlCategory','products','products.pageUrl')
        //         ->limit(5)->get();

        // // dd($cate);
        // foreach($cate as $loai){
        //     echo "<b>".$loai->name .'</b>: <i>'. $loai->pageUrlCategory->url."</i>";
        //     echo "<br>";
        //     foreach($loai->products as $product){
        //         echo "<li>".$product->name." : ".$product->pageUrl->url."</li>";
        //     }
        //     echo "<hr>";
        // }

        // $users = \App\User::with('roles')->get();

        // foreach($users as $u){
        //     echo $u->username;
        //     echo "<br>";
        //     foreach($u->roles as $r){
        //         echo "<li>".$r->role."</li>";
        //     }
        //     echo "<hr>";
        // }
        // dd($users);

        $customer = \App\Customers::with('billDetail','billDetail.product','billDetail.product.category')
                    ->whereIn('id',[20,21])
                    ->get();
        //dd($customer);
        foreach($customer as $c){
            echo $c->name;
            echo "<br>";
            foreach($c->billDetail as $bd){
                echo "<li>".$bd->product->category->name.": ";
                echo $bd->product->name." - SL: ";
                echo $bd->quantity." - Thanh tien: " .$bd->price."</li>";
            }
            echo "<hr>";
        }
        
    }
}

