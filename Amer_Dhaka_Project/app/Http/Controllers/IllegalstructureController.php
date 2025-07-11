<?php

namespace App\Http\Controllers;

use App\Models\Illegalstructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IllegalstructureController extends Controller
{
    public function create()
    {
         return view('backend.modules.illegalstructureissue.create');
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
                        
                        $illegalstructureissue = new Illegalstructure();
                        $illegalstructureissue->user_id    = Auth::id(); 
                        $illegalstructureissue->address = $req->address;
                        $illegalstructureissue->issue_type = $req->issue_type;
                        $illegalstructureissue->description = $req->description;
                        $illegalstructureissue->image = $req->image;

        // Handle image upload
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension(); // Get file extension
            $filename = time() . '.' . $extension; // Create a unique filename
            $file->move('uploads/illegalstructureissue/', $filename); // Move the file to the uploads directory
            $illegalstructureissue->image = $filename; // Save the filename in the database
                    }

                    $illegalstructureissue->save();
                                return "Illegal Structure issue create successfully done!!!";
                }

             public function list()
                    {
                        $illegalstructureissue = Illegalstructure::all();
                        return view('backend.modules.illegalstructureissue.list')->with('illegalstructureissue',$illegalstructureissue);
                    } 
    
                    public function details($id)
                    {
                        $illegalstructureissue = Illegalstructure::findOrFail($id);
                        return view('backend.modules.illegalstructureissue.details', compact('illegalstructureissue'));
                    }
                    public function edit(Request $request){
                                //return $request->id;
                                $id =$request->id;
                            $illegalstructureissue = Illegalstructure::findOrFail($request->id);

                                //return $student;
                                return view('backend.modules.illegalstructureissue.edit')->with('illegalstructureissue', $illegalstructureissue);
                            
                            }


                            public function editSubmit(Request $req)
            {
                // ----------------- Validate ----------------------------------------------------------
                $req->validate([
                    'id'          => 'required|exists:illegalstructures,id',
                    'address'     => 'required|max:200',
                    'issue_type'  => 'required',
                    'description' => 'required|max:300',
                    'status'  => 'required',
                    'image'       => 'nullable|mimes:jpg,png,jpeg,gif,svg',
                ]);

                //  -----------------------Fetch the record --------------------------------------------------
                $illegalstructureissue = Illegalstructure::findOrFail($req->id);

                // --------------------- Update fields -----------------------------------------------------
                $illegalstructureissue->address     = $req->address;
                $illegalstructureissue->issue_type  = $req->issue_type;
                $illegalstructureissue->description = $req->description;
                 $illegalstructureissue->status = $req->status;

                // ------------------Handle optional image upload -------------------------------------
                if ($req->hasFile('image')) {
                    $filename = time().'.'.$req->image->extension();
                    $req->image->move(public_path('uploads/illegalstructureissue'), $filename);
                    $illegalstructureissue->image = $filename;
                }

                $illegalstructureissue->save();

                // -----------------------Redirect ----------------------------------------------------------
                return redirect()
                    ->route('illegalstructureissue.list')
                    ->with('success', 'Issue updated successfully');
            }

            
                 public function delete($id)
                   {
                      $illegalstructureissue = Illegalstructure::findOrFail($id);

                     // Optional: delete image file if it exists
                     if ($illegalstructureissue->image && file_exists(public_path('uploads/illegalstructureissue/' . $illegalstructureissue->image))) {
                                unlink(public_path('uploads/illegalstructureissue/' . $illegalstructureissue->image));
                        }

                            $illegalstructureissue->delete();

                            return redirect()->route('illegalstructureissue.list')->with('success', 'Issue deleted successfully.');
                        }

}
