<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    function addData(Request $req){
        $member = new Member;
        $member->name =$req->name;
        $member->email =$req->email;
        $member->address =$req->address;
        $member->save();
        return redirect("add");


    }
    function show(){
        $data= Member::all();
        return view("list",["members"=>$data]);
    }
    function delete($id){
        $data =Member::find($id);
        $data->delete();
        return redirect("list");

    }
    function showdata($id){
        $data= Member::find($id);
        return view("edit",["data"=>$data]);
    }
    function update(Request $req){
       $data=Member::find($req->id);
       $data->name=$req->name;
       $data->email=$req->email;
       $data->address=$req->address;
       $data->save();
       return redirect("list");
    }
    function search(){
        
        $member = new Member;
        $search_text=$_GET["query"];
        $data=Member::WHERE("name","LIKE","%".$search_text."%")->get();
        return view("search_result",["members"=>$data]);
    }
}
