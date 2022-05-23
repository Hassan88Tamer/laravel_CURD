<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Mail\SampleMail;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\WellcomeMail;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
//use Alert;


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
        return redirect("add")->Alert::success('HI ', 'user is added successfully');
        

    }
    function show(){                     //show database 
        $data= Member::all();
        return view("list",["members"=>$data]);
    }
    function delete($id){
        $data =Member::find($id);        //delete user from database
        $data->delete();
        Alert::success('HI', 'Member deleted succefully');
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
       Alert::success('HI', 'Member updated succefully');
       return redirect("list");
    }
    function search(Request $req){          //search by name or email or address
        
        $member = new Member;
        $search_text=$req->search;
        $data=Member::WHERE("name","LIKE","%".$search_text."%")->orWHERE("email","LIKE","%".$search_text."%")
        ->orWhere("address","LIKE","%".$search_text."%")->get();

        return view("list",["members"=>$data]);

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
    public function exportIntoExcel(){
        return Excel::download(new EmployeeExport,"MembersList.xlsx");
    }
    public function exportIntoCSV(){
        return Excel::download(new EmployeeExport,"MembersList.csv");
    }
    public function importForm(){
        return view("import-form");
    }
    public function import(Request $req){
        $req->validate([
            "file"=>"required",
        ]);
        Excel::import(new EmployeeImport,$req->file);
        return "imports are decorded succefully";


    }
    public function email(){
        Mail::to("hh3733468@gmail.com")->send(new WellcomeMail());  //route for mailing             
        return new WellcomeMail();
    }
    public function alert(){
        Alert::success('Title', 'Message');
        return view("welcome");

        
    }


}

   

