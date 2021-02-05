<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\category;
use DB;

class HomeController extends Controller
{
    public function index(){
        
        $post=DB::table('posts')
        ->join('catagories','posts.category_id','catagories.id')
        ->select('posts.*','catagories.name','catagories.slug')->simplepaginate(2);
        return view('pages.index',compact('post'));
}

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function addca(){

        return view('post.addcategory');
    }
    public function store(Request $req){
//using model 
       // $validated = $req->validate([
            //         'name' => 'required|unique:catagories|max:25|min:4',
            //         'slug' => 'required|unique:catagories|max:25|min:4',
            //     ]);
            
            //   $s= new category();
            //   $s->name=$req->name;
            //   $s->slug=$req->slug;
            //   $s->save();
            //   $notification=array(
            //     'messege'=>'Successfully Category Inserted',
            //     'alert-type'=>'success'
            // );
            //   return Redirect()->route('all.category')->with($notification);
        



        $validated = $req->validate([
            'name' => 'required|unique:catagories|max:25|min:4',
            'slug' => 'required|unique:catagories|max:25|min:4',
        ]);
    
       $data=array();
       $data['name']=$req->name;
       $data['slug']=$req->slug;
       $category=DB::table('catagories')->insert($data);
       if($category){
           $notification=array(
               'messege'=>'Successfully Category Inserted',
               'alert-type'=>'success'
           );
           return Redirect()->route('all.category')->with($notification);
       }else{
        $notification=array(
            'messege'=>'Successfully Wrong',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
       }
    }
    public function all(){
        $category=DB::table('catagories')->get();
        return view('post.allcategory',compact('category'));

    }
    public function view($id){
        $category=DB::table('catagories')->where ('id',$id)->first();
        return view('post.viewcategory',compact('category'));
    }
    public function delete($id){
        $category=DB::table('catagories')->where ('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully Category Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);;
    }
    public function edit($id){
        $category=DB::table('catagories')->where ('id',$id)->first();
        return view('post.editcategory',compact('category'));

    }

    public function updateca(Request $req,$id){
        $validated = $req->validate([
            'name' => 'required|max:25|min:4',
            'slug' => 'required|max:25|min:4',
        ]);
    
       $data=array();
       $data['name']=$req->name;
       $data['slug']=$req->slug;
       $category=DB::table('catagories')->where('id',$id)->update($data);
       if($category){
           $notification=array(
               'messege'=>'Successfully Category Updated',
               'alert-type'=>'success'
           );
           return Redirect()->route('all.category')->with($notification);
       }else{
        $notification=array(
            'messege'=>'Nothing to Update',
            'alert-type'=>'error'
        );
        return Redirect()->route('all.category')->with($notification);
       }
    }
    

}
