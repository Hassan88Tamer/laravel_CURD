<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Mail\SampleMail;

class MemberController extends Controller
{
    function addData(Request $req){            //add user  (login)
        $req->validate([
            "name"=>"required",
            "email"=>"required",
            "address"=>"required"
        ]);
        $member = new Member;
        $member->name =$req->name;
        $member->email =$req->email;
        $member->address =$req->address;
        $member->save();
        return redirect("add");

    }
    function show(){                     //show database 
        $data= Member::all();
        return view("list",["members"=>$data]);
    }
    function delete($id){
        $data =Member::find($id);        //delete user from database
        $data->delete();
        return redirect("list");

    }
    function showdata($id){             //edit user data
        $data= Member::find($id);
        return view("edit",["data"=>$data]);
    }
    function update(Request $req){       //update user data
       $data=Member::find($req->id);

       $data->name=$req->name;
       $data->email=$req->email;
       $data->address=$req->address;
       $req->validate([
        "name"=>"required",
        "email"=>"required",
        "address"=>"required"
    ]);
       $data->save();
       return redirect("list");
    }
    function search(Request $req){          //search by name or email or address
        
        $member = new Member;
        $search_text=$req->search;
        $data=Member::WHERE("name","LIKE","%".$search_text."%")->orWHERE("email","LIKE","%".$search_text."%")
        ->orWhere("address","LIKE","%".$search_text."%")->get();

        return view("search_result",["members"=>$data]);

    }
    public function filter(Request $req){          //filtering
        $member = new Member;
        $name=$req->name;
        $address=$req->address;
        
        if($address="null"&&$name!="null"){               //filter with name
            $data=Member::WHERE("name","LIKE","%".$name."%")->get();
        }
        if($address!="null"&&$name="null"){               //filter with address
            $data=Member::WHERE("address","LIKE","%".$address."%")->get();
        }
        return view("filter",["members"=>$data]);
        echo $name;  
    }

}

   

