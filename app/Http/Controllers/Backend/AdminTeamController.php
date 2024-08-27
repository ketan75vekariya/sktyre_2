<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Tbl_team;

class AdminTeamController extends Controller
{
    //This method for view Members
    public function index(){
        $team = Tbl_team::orderBy('created_at', 'DESC')->get();
        return view('backend.team',[
            'teams' =>$team
        ]);
    }
    
    //This method for store members
    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'position'=>'required',
            'about'=>'required'
        ];

        if($request->image != ""){
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('team.index')->withInput()->withErrors($validator);
        }

        //here we insert the data in the db
        $team = new Tbl_team();
        $team->name = $request->name;
        $team->position = $request->position;
        $team->about = $request->about;
        $team->save();

        if($request->image != ""){
        //Here we store the image
        $image = $request->image;
        $ext= $image->getClientOriginalExtension();
        $imageName =time().'.'.$ext; //unique image name

        //save image in public directory
        $image->move(public_path('uploads/team'),$imageName);

        //save image name in database
        $team->image = $imageName;
        $team->save();
        }
        return redirect()->route('team.index')->with('success','Member added successfully');

    }

    //This method for edit memebrs
    public function edit($id){
        $team = Tbl_team::findOrFail($id);
        return response()->json([
            'status'=>200,
            'team'=>$team,
        ]);
        
    }
    //This method for update Memebers
    public function update(Request $request){
        $rules = [
            'name' => 'required',
            'position'=>'required',
            'about'=>'required'
        ];

        if($request->image != ""){
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('team.index')->withInput()->withErrors($validator);
        }

        //here we insert the data in the db
        $team_id = $request->team_id;
        $team = Tbl_team::findOrFail($team_id);
        $team->name = $request->name;
        $team->position = $request->position;
        $team->about = $request->about;
        $team->update();

        if($request->image != ""){

        //Delete old image
        File::delete(public_path('uploads/team/'.$team->image));
        
        //Here we store the image
        $image = $request->image;
        $ext= $image->getClientOriginalExtension();
        $imageName =time().'.'.$ext; //unique image name

        //save image in public directory
        $image->move(public_path('uploads/team'),$imageName);

        //save image name in database
        $team->image = $imageName;
        $team->save();
        }
        return redirect()->route('team.index')->with('success','Member updated successfully');        
    }
    //This method for destroy Members
    public function destroy(Request $request){
        $id = $request->team_id;
        $team = Tbl_team::findOrFail($id);

         //Delete old image
         File::delete(public_path('uploads/team/'.$team->image));

         //Member delete
         $team->delete();

         return redirect()->route('team.index')->with('success', 'Memeber deleted sucessfully');
    }
}
