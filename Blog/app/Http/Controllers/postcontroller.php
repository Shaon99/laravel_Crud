<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class postcontroller extends Controller
{
    public function write(){
        $category=DB::table('catagories')->get();
        return view('post.write',compact('category'));
    }
    public function storepost(Request $req){
        $validated = $req->validate([
            'title' => 'required|max:125',
            'details' => 'required|max:400',
            'image' => 'image|mimes:jpeg,png,jpg,JPG,PNG,gif,svg|max:5000',
        ]);
        $data=array();
        $data['title']=$req->title;
        $data['category_id']=$req->category_id;
        $data['details']=$req->details;
        $image=$req->file('image');
        if($image){
              $image_name=hexdec(uniqid());
              $ext=strtolower($image->getClientOriginalExtension());
              $image_fullname=$image_name.'.'.$ext;
              $path='frontend/image/';
              $image_url=$path.$image_fullname;
              $success=$image->move($path,$image_fullname);
              $data['image']= $image_url;
              DB::table('posts')->insert($data);
            $notification=array(
                'messege'=>'Successfully Post Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }else{
            DB::table('posts')->insert($data);
            $notification=array(
                'messege'=>'Successfully Post Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function allpost(){
     // $post=DB::table('posts')->get();
     $post=DB::table('posts')
     ->join('catagories','posts.category_id','catagories.id')
     ->select('posts.*','catagories.name')
     ->get();
      return view('post.allpost',compact('post'));
    }

    public function viewpost($id){
        $post=DB::table('posts')
        ->join('catagories','posts.category_id','catagories.id')
        ->select('posts.*','catagories.name')
        ->where('posts.id',$id)
        ->first();
         return view('post.viewpost',compact('post'));
       }
       public function editpost($id){

        $category=DB::table('catagories')->get();
        $post=DB::table('posts')->where('posts.id',$id)->first();
         return view('post.editpost',compact('category','post'));
       }


       public function updatepost(Request $req,$id)
       {
        $validated = $req->validate([
            'title' => 'required|max:125',
            'details' => 'required|max:400',
            'image' => 'image|mimes:jpeg,png,jpg,JPG,PNG,gif,svg|max:5000',
        ]);
        $data=array();
        $data['title']=$req->title;
        $data['category_id']=$req->category_id;
        $data['details']=$req->details;
        $image=$req->file('image');

        if($image){
              $image_name=hexdec(uniqid());
              $ext=strtolower($image->getClientOriginalExtension());
              $image_fullname=$image_name.'.'.$ext;
              $path='frontend/image/';
              $image_url=$path.$image_fullname;
              $success=$image->move($path,$image_fullname);
              $data['image']= $image_url;
              if($req->old_photo==NULL ){
                DB::table('posts')->where('id',$id)->update($data);
          
              }  
              else{
                unlink($req->old_photo);
                DB::table('posts')->where('id',$id)->update($data);

              }          
              $notification=array(
                'messege'=>'Successfully Post Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }
        
        else{
            
             $data['image']= $req->old_photo;
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Post Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }
       }

       public function deletepost(Request $req,$id){
           
       $post= DB::table('posts')->where('id',$id)->first();
        $image=$post->image;
        $delete= DB::table('posts')->where('id',$id)->delete();
        if($delete){
            unlink($image);
            $notification=array(
                'messege'=>'Successfully Post Deleted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);;

        }else{
            $notification=array(
                'messege'=>'Something wrong',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);;
        }


       }

}
