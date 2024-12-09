<?php

namespace App\Http\Controllers;
use App\Models\Billboard;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    //actions and functions
    // billboard
    public function billboard_post(){
        return view('admin.billboard_post');
    }

    public function billboard_postadd(Request $request){
        //logged in user,l.h.s is variable while r.h.s is from user table
        $user=Auth()->user();
        $userid=$user->id;
        $name=$user->name;
        $user_type=$user->usertype;

        $billboard = new Billboard();
        $billboard->title = $request->title;
        $billboard->description = $request->description;
        $billboard->post_status = 'active';

        // on the l.h.s is from db of billboard table, while r.h.s from user table variables created above.
        $billboard->user_id = $userid;
        $billboard->name = $name;
        $billboard->user_type = $user_type;

        $image= $request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        // move image to public folder
        $request->image->move('billboardimage', $imagename);
        //move image to the db table
        $billboard->image = $imagename;
        }

        $billboard->save();
        toastr()->success('Billboard posted successfully...!');
        // return redirect()->back()->with('message','Billboard posted successfully...!');
        return redirect()->back();
    }

    public function show_billboard(){
        $billboard = Billboard::all();//billboard model used

        return view('admin.show_billboard', compact('billboard'));
    }

    // receive the id
    public function delete_billboard($id){
        $billboard = Billboard::find($id);
        $billboard->delete();
        toastr()->success('Billboard deleted successfully...!');
        // return redirect()->back()->with('message','Billboard deleted successfully...!');
        return redirect()->back();
    }

    public function edit_billboard($id){
        $billboard = Billboard::find($id);

        // send the data of specific id using compact
        return view('admin.edit_billboard',compact('billboard'));
    }

    public function update_billboard($id, Request $request){
        $data = Billboard::find($id);
        // on r.h.s,on right of =, is from db table but on l.h.s,on left of = is from name attribute on the form
        $data->title = $request->title;
        $data->description = $request->description;

        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            // move image to public folder
            $request->image->move('billboardimage', $imagename);
            //move image to the db table,on r.h.s image comes from db table
            $data->image = $imagename;
        }

        $data->save();
        toastr()->success('Billboard updated successfully...!');
        // return redirect()->back()->with('message','Billboard updated successfully...!');
        return redirect()->back();
    }
}    
