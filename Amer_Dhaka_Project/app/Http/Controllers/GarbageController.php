<?php

namespace App\Http\Controllers;

use App\Models\Garbage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GarbageController extends Controller
{
    
     public function create()
    {
         return view('backend.modules.garbageissue.create');
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
                        
                        $garbageissue = new Garbage();
                         $garbageissue->user_id    = Auth::id(); 
                        $garbageissue->address = $req->address;
                        $garbageissue->issue_type = $req->issue_type;
                        $garbageissue->description = $req->description;
                        $garbageissue->image = $req->image;

        // Handle image upload
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension(); // Get file extension
            $filename = time() . '.' . $extension; // Create a unique filename
            $file->move('uploads/garbageissue/', $filename); // Move the file to the uploads directory
            $garbageissue->image = $filename; // Save the filename in the database
        }

         $garbageissue->save();
                       return "Garbage issue create successfully done!!!";
    }


     public function list()
    {
        $garbageissue = Garbage::all();
        return view('backend.modules.garbageissue.list')->with('garbageissue',$garbageissue);
    } 
    
                    public function details($id)
                    {
                        $garbageissue = Garbage::findOrFail($id);
                        return view('backend.modules.garbageissue.details', compact('garbageissue'));
                    }


            public function edit(Request $request){
                                //return $request->id;
                                $id =$request->id;
                            $garbageissue = Garbage::findOrFail($request->id);

                                //return $student;
                                return view('backend.modules.garbageissue.edit')->with('garbageissue', $garbageissue);
                            
                            }


                            public function editSubmit(Request $req)
            {
                // ----------------- Validate ----------------------------------------------------------
                $req->validate([
                    'id'          => 'required|exists:garbages,id',
                    'address'     => 'required|max:200',
                    'issue_type'  => 'required',
                    'description' => 'required|max:300',
                    'status'  => 'required',
                    'image'       => 'nullable|mimes:jpg,png,jpeg,gif,svg',
                ]);

                //  -----------------------Fetch the record --------------------------------------------------
                $garbageissue = Garbage::findOrFail($req->id);

                // --------------------- Update fields -----------------------------------------------------
                $garbageissue->address     = $req->address;
                $garbageissue->issue_type  = $req->issue_type;
                $garbageissue->description = $req->description;
                $garbageissue->status = $req->status;

                // ------------------Handle optional image upload -------------------------------------
                if ($req->hasFile('image')) {
                    $filename = time().'.'.$req->image->extension();
                    $req->image->move(public_path('uploads/garbageissue'), $filename);
                    $garbageissue->image = $filename;
                }

                $garbageissue->save();

                // -----------------------Redirect ----------------------------------------------------------
                return redirect()
                    ->route('garbageissue.list')
                    ->with('success', 'Issue updated successfully');
            }

            
                 public function delete($id)
                   {
                      $garbageissue = Garbage::findOrFail($id);

                     // Optional: delete image file if it exists
                     if ($garbageissue->image && file_exists(public_path('uploads/garbageissue/' . $garbageissue->image))) {
                                unlink(public_path('uploads/garbageissue/' . $garbageissue->image));
                        }

                            $garbageissue->delete();

                            return redirect()->route('garbageissue.list')->with('success', 'Issue deleted successfully.');
                        }





}
