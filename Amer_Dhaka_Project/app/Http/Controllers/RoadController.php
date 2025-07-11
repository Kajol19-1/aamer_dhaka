<?php

namespace App\Http\Controllers;

use App\Models\Road;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PersonalProfile;
use App\Models\User;

class RoadController extends Controller
{
   
    public function create()
    {
         return view('backend.modules.roadissue.create');
    }


    function createSubmit(Request $req)
    {
        @$this->validate($req,
                        [
                            "address"=>"required|max:200",
                            "issue_type"=>"required",
                            "issue"=>"required",
                            "description"=>"required|max:300",
                            "image"=>"required|mimes:jpg,png,jpeg,gif,svg"
                
                        ],
                        [
                            "address.required"=> "Please enter your location",
                            "address.max"=> "Maximum 200 characters",
                            "issue_type.required"=>"Please enter your issue type",
                            "issue.required"=>"Please enter your issue",
                            "description.required"=>"Please enter description",
                            "image.mimes"=> "Please provide jpg,png,jpeg, gif, svg file"
                        ]
                        );
                        
                        $roadissue = new Road();
                         $roadissue->user_id    = Auth::id(); 
                        $roadissue->address = $req->address;
                        $roadissue->issue_type = $req->issue_type;
                        $roadissue->issue = $req->issue;
                        $roadissue->description = $req->description;
                        $roadissue->image = $req->image;

        // Handle image upload
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension(); // Get file extension
            $filename = time() . '.' . $extension; // Create a unique filename
            $file->move('uploads/roadissue/', $filename); // Move the file to the uploads directory
            $roadissue->image = $filename; // Save the filename in the database
        }

         $roadissue->save();
                       return "Road issue create successfully done!!!";
    }


    public function list()
    {
        $roadissue = Road::all();
        return view('backend.modules.roadissue.list')->with('roadissue',$roadissue);
    } 

public function details($id)
{
    $roadissue = Road::findOrFail($id);
    return view('backend.modules.roadissue.details', compact('roadissue'));
}


        public function edit($id)        // accept id directly
{
    $roadissue = Road::findOrFail($id);
    return view('backend.modules.roadissue.edit', compact('roadissue'));
}


        public function editSubmit(Request $req)
            {
                // ----------------- Validate ----------------------------------------------------------
                $req->validate([
                    'id'          => 'required|exists:roads,id',
                    'address'     => 'required|max:200',
                    'issue_type'  => 'required',
                    'issue'       => 'required',
                    'description' => 'required|max:300',
                    'image'       => 'nullable|mimes:jpg,png,jpeg,gif,svg',
                    'status'      => 'required|in:Pending,In Process,Solved,Rejected',
                ]);

                //  -----------------------Fetch the record --------------------------------------------------
                $roadissue = Road::findOrFail($req->id);

                // --------------------- Update fields -----------------------------------------------------
                $roadissue->address     = $req->address;
                $roadissue->issue_type  = $req->issue_type;
                $roadissue->issue       = $req->issue;
                $roadissue->description = $req->description;
                $roadissue->status      = $req->status;

                // ------------------Handle optional image upload -------------------------------------
                if ($req->hasFile('image')) {
                    $filename = time().'.'.$req->image->extension();
                    $req->image->move(public_path('uploads/roadissue'), $filename);
                    $roadissue->image = $filename;
                }

                $roadissue->save();

                // -----------------------Redirect ----------------------------------------------------------
                return redirect()
                    ->route('roadissue.list')
                    ->with('success', 'Issue updated successfully');
            }

                 public function delete($id)
                   {
                      $roadissue = Road::findOrFail($id);

                     // Optional: delete image file if it exists
                     if ($roadissue->image && file_exists(public_path('uploads/roadissue/' . $roadissue->image))) {
                                unlink(public_path('uploads/roadissue/' . $roadissue->image));
                        }

                            $roadissue->delete();

                            return redirect()->route('roadissue.list')->with('success', 'Issue deleted successfully.');
                        }


                        



}
