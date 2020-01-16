<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\Category;

class postsController extends Controller
{
    
    public function add_category(){
    	return view('pages.post.add_category');
    }
    //category inserrt
    public function store_category(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:5',
            'slug' => 'required|unique:categories|max:25|min:5',
        ]);

        $categoty = new Category();
        $categoty->name = $request->name;
        $categoty->slug = $request->slug;
        //return response()->json($categoty);
        if ($categoty->save()) {
            $notification = array(
                'message'=>'Successfully Categori Inserted.',
                'alert-type'=>'success'
            );
            return Redirect()->route('view.category')->with($notification);
        }
        else{
            $notification = array(
                'message'=>'Inser Failed..! Something Went Wrong',
                'alert-type'=>'danger'
            );
            return Redirect()->back()->with($notification);
        }

    	// $data = array();
    	// $data['name'] = $request->name;
    	// $data['slug'] = $request->slug;
    	// //return response()->json($data);
    	// $category=DB::table('categories')->insert($data);
    	// if ($category) {
    	// 	$notification = array(
    	// 		'message'=>'Successfully Categori Inserted.',
    	// 		'alert-type'=>'success'
    	// 	);
    	// 	return Redirect()->route('view.category')->with($notification);
    	// }
    	// else{
    	// 	$notification = array(
    	// 		'message'=>'Inser Failed..! Something Went Wrong',
    	// 		'alert-type'=>'danger'
    	// 	);
    	// 	return Redirect()->back()->with($notification);
    	// }
    }


    //category functions start here
    public function view_category(){
        $category = Category::all();
        //$category = DB::table('categories')->get();
        //return response()->json($category);
        return view('pages.post.view_category',compact('category'));
    }

    //view a single or specefic category
    public function view_single_category($id){
        $single_category = Category::findorfail($id);
        //$single_category = DB::table('categories')->where('id',$id)->first();
        //return response()->json($single_category);
        view('pages.post.single_category')->with('single_category',$single_category);
        return view('pages.post.single_category',compact('single_category'));
    }

    public function delete_category($id){
        $delete_category = Category::findorfail($id);
        $delete_category->delete();
        //$delete_category = DB::table('categories')->where('id',$id)->delete();
        $notification = array(
                'message'=>'Successfully Categori Deleted.',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);

    }

    public function edit_category($id){
        $category = Category::findorfail($id);
        //$category = DB::table('categories')->where('id',$id)->first();
        return view('pages.post.edit',compact('category'));
    }

    public function update_category(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:5',
            'slug' => 'required|max:25|min:5',
        ]);

        $data = Category::findorfail($id);
        $data->name = $request->name;
        $data->slug = $request->slug;
        $success=$data->save();
        // $data = array();
        // $data['name'] = $request->name;
        // $data['slug'] = $request->slug;
        //return response()->json($data);
        //$category=DB::table('categories')->where('id',$id)->update($data);
        if ($success) {
            $notification = array(
                'message'=>'Successfully Category Updated.',
                'alert-type'=>'success'
            );
            return Redirect()->route('view.category')->with($notification);
        }
        else{
            $notification = array(
                'message'=>'No update here',
                'alert-type'=>'error'
            );
            return Redirect()->route('view.category')->with($notification);
        }
    }
    //category function end here


    //write post functions start here
    //write post here
    public function write_post(){
        $category = DB::table('categories')->get();
        return view('pages.post.write_post',compact('category'));
    }

    public function create_post(Request $request){
        $validatedData = $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:2',
            'details' => 'required|min:3',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = array();
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $data['category_id'] = $request->category_id;
        $post_image = $request->file('post_image');
        if ($post_image) {
            // $imageName = time().'.'.$request->post_image->extension();  
            // $request->post_image->move(public_path('images'), $imageName);
            $image_name = time();
            $ext = $post_image->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'frontend/post_images/';
            $image_url_for_save = $upload_path.$image_full_name;
            $success=$post_image->move($upload_path,$image_full_name);
            $data['image'] = $image_url_for_save;
            DB::table('posts')->insert($data);
            $notification = array(
                'message'=>'Successfully Post Inserted.',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            DB::table('posts')->insert($data);
            $notification = array(
                'message'=>'Successfully Post Inserted.',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function view_all_post(){
        //$all_post = DB::table('posts')->get();
        $all_post = DB:: table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name')
        ->get();
        return view('pages.post.view_all_post',compact('all_post'));
    }

    public function view_single_post($id){
        $single_post = DB:: table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->where('posts.id',$id)
        ->select('posts.*','categories.name')
        ->first();
        //return response()->json($single_post);
        return view('pages.post.view_single_post',compact('single_post'));
    }

    public function edit_single_post($id){
        $category = DB::table('categories')->get();
        $single_post = DB::table('posts')->where('id',$id)->first();
        return view('pages.post.edit_post',compact('category','single_post'));
    }

    public function update_post(Request $request, $id){
        $validatedData = $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:2',
            'details' => 'required|min:3',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = array();
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $data['category_id'] = $request->category_id;
        $post_image = $request->file('post_image');
        if ($post_image) {
            $image_name = time();
            $ext = $post_image->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'frontend/post_images/';
            $image_url_for_save = $upload_path.$image_full_name;
            $success=$post_image->move($upload_path,$image_full_name);
            $data['image'] = $image_url_for_save;
            unlink($request->old_image);
            DB::table('posts')->where('id',$id)->update($data);
            $notification = array(
                'message'=>'Successfully Post Updated.',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }
        else{
            $data['image'] = $request->old_image;
            DB::table('posts')->where('id',$id)->update($data);
            $notification = array(
                'message'=>'Successfully Post Inserted.',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }
    }

    public function delete_post($id){
        $post = DB::table('posts')->where('id',$id)->first();
        $image_delete = $post->image;
        $delete = DB::table('posts')->where('id',$id)->delete();
        if ($delete) {
            unlink($image_delete);
            $notification = array(
                'message'=>'Successfully Post Deleted.',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'message'=>'Something Went Wrong...!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }


}
