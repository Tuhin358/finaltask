<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\images;


class BlogController extends Controller
{
 public function AllCat(){

    $categories=Category::latest()->paginate();

    $trashCat = Category::onlyTrashed()->latest()->paginate();

    return View('admin.category.index', compact('categories','trashCat'));
 }
 public function AddCat(Request $request ){

    $request->validate([
        'blog_name' => 'required|max:255',

    ],
    [
        'blog_name.required' => 'Plese Enter Blog Name',

    ]);

    Category::insert([
        'title'=> $request->blog_name,
        'slug'=> $request->blog_slug,
        'description'=> $request->blog_description,
        'created_at' => Carbon::now()

    ]);

    // return ('All Blog Inserted');
    return Redirect()->back()->with('success','Category Deleted Successfully');




 }
//  Edit method
public function Edit($id){
    $categories = Category::find($id);
    return view ('admin.category.edit',compact('categories'));


}

//update

public function update(Request $request,$id){

    $update=Category::find($id)->update([
        'title'=>$request->blog_title,
        'slug'=>$request->blog_slug,
        'description'=>$request->blog_description,

    ]);
    return"update successfull";



}

// SoftDelete


public function SoftDelete($id){
       $delete=Category::find($id)->delete();
      return Redirect()->back()->with('success','Category Deleted Successfully');



// Category::findOrFail($id)->delete();
// return Redirect()->back()->with('delete','Category Deleted Successfully');



}


// Comment


public function Store(Request $request ){

    $request->validate([
        'comment_body' => 'required|max:2550',

    ],
    [
         'comment_body' => 'Plese Enter comments',

    ]);

    Comment::insert([
        'comment_body'=> $request->comment_body,
        // 'user_id'=>Auth::user()->id(),

      
        'created_at' => Carbon::now()


    ]);


  return ('All comments Successful Post');
    // return Redirect()->back()->with('success','Category Deleted Successfully');




 }

 public function Allimg(){
    return view('images.Allimg');

 }


}
