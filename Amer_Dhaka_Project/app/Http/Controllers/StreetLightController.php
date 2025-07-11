<?php

namespace App\Http\Controllers;

use App\Models\StreetLight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StreetLightController extends Controller
{
   
    public function create()
    {
         return view('backend.modules.streetlightissue.create');
    }


    
   function createSubmit(Request $req)
    {
        @$this->validate($req,
                        [
                            "address"=>"required|max:200",
                            "issue_type"=>"required",
                            "description"=>"required|max:300",
                            "image"=>"required|mimes:jpg,png,jpeg,gif,svg"
                
                        ],
                        [
                            "address.required"=> "Please enter your location",
                            "address.max"=> "Maximum 200 characters",
                            "issue_type.required"=>"Please enter your issue type",
                            "description.required"=>"Please enter description",
                            "image.mimes"=> "Please provide jpg,png,jpeg, gif, svg file"
                        ]
                        );
                        
                        $streetlightissue = new StreetLight();
                         $streetlightissue->user_id    = Auth::id(); 
                        $streetlightissue->address = $req->address;
                        $streetlightissue->issue_type = $req->issue_type;
                        $streetlightissue->description = $req->description;
                        $streetlightissue->image = $req->image;

        // Handle image upload
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension(); // Get file extension
            $filename = time() . '.' . $extension; // Create a unique filename
            $file->move('uploads/streetlightissue/', $filename); // Move the file to the uploads directory
            $streetlightissue->image = $filename; // Save the filename in the database
                    }

                    $streetlightissue->save();
                                return "Street Light issue create successfully done!!!";
                }

             public function list()
                    {
                        $streetlightissue = StreetLight::all();
                        return view('backend.modules.streetlightissue.list')->with('streetlightissue',$streetlightissue);
                    } 
    
                    public function details($id)
                    {
                        $streetlightissue = StreetLight::findOrFail($id);
                        return view('backend.modules.streetlightissue.details', compact('streetlightissue'));
                    }
                    public function edit(Request $request){
                                //return $request->id;
                                $id =$request->id;
                            $streetlightissue = StreetLight::findOrFail($request->id);

                                //return $student;
                                return view('backend.modules.streetlightissue.edit')->with('streetlightissue', $streetlightissue);
                            
                            }


                           public function editSubmit(Request $req)
{
    $req->validate([
        'id'          => 'required|exists:street_lights,id', // use correct table name
        'address'     => 'required|max:200',
        'issue_type'  => 'required',
        'description' => 'required|max:300',
        'status'      => 'required|in:Pending,In Process,Solved,Rejected',
        'image'       => 'nullable|mimes:jpg,png,jpeg,gif,svg',
    ]);

    $issue = StreetLight::findOrFail($req->id);
    $issue->address     = $req->address;
    $issue->issue_type  = $req->issue_type;
    $issue->description = $req->description;
    $issue->status      = $req->status;

    if ($req->hasFile('image')) {
        $filename = time().'.'.$req->image->extension();
        $req->image->move(public_path('uploads/streetlightissue'), $filename);
        $issue->image = $filename;
    }

    $issue->save();

    return redirect()->route('streetlightissue.list')->with('success', 'Issue updated successfully.');
}


            
                 public function delete($id)
                   {
                      $streetlightissue = StreetLight::findOrFail($id);

                     // Optional: delete image file if it exists
                     if ($streetlightissue->image && file_exists(public_path('uploads/streetlightissue/' . $streetlightissue->image))) {
                                unlink(public_path('uploads/streetlightissue/' . $streetlightissue->image));
                        }

                            $streetlightissue->delete();

                            return redirect()->route('streetlightissue.list')->with('success', 'Issue deleted successfully.');
                        }




   
}
