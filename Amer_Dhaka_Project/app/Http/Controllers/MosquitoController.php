<?php

namespace App\Http\Controllers;

use App\Models\Mosquito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MosquitoController extends Controller
{
   public function create()
    {
         return view('backend.modules.mosquitoissue.create');
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
                        
                        $mosquitoissue = new Mosquito();
                        $mosquitoissue->user_id    = Auth::id(); 
                        $mosquitoissue->address = $req->address;
                        $mosquitoissue->issue_type = $req->issue_type;
                        $mosquitoissue->description = $req->description;
                        $mosquitoissue->image = $req->image;

        // Handle image upload
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension(); // Get file extension
            $filename = time() . '.' . $extension; // Create a unique filename
            $file->move('uploads/mosquitoissue/', $filename); // Move the file to the uploads directory
            $mosquitoissue->image = $filename; // Save the filename in the database
                    }

                    $mosquitoissue->save();
                                return "Mosquito issue create successfully done!!!";
                }

             public function list()
                    {
                        $mosquitoissue = Mosquito::all();
                        return view('backend.modules.mosquitoissue.list')->with('mosquitoissue',$mosquitoissue);
                    } 
    
                    public function details($id)
                    {
                        $mosquitoissue = Mosquito::findOrFail($id);
                        return view('backend.modules.mosquitoissue.details', compact('mosquitoissue'));
                    }
                    public function edit(Request $request){
                                //return $request->id;
                                $id =$request->id;
                            $mosquitoissue = Mosquito::findOrFail($request->id);

                                //return $student;
                                return view('backend.modules.mosquitoissue.edit')->with('mosquitoissue', $mosquitoissue);
                            
                            }


                            public function editSubmit(Request $req)
            {
                // ----------------- Validate ----------------------------------------------------------
                $req->validate([
                    'id'          => 'required|exists:mosquitos,id',
                    'address'     => 'required|max:200',
                    'issue_type'  => 'required',
                    'description' => 'required|max:300',
                     'status'      => 'required',
                    'image'       => 'nullable|mimes:jpg,png,jpeg,gif,svg',
                ]);

                //  -----------------------Fetch the record --------------------------------------------------
                $mosquitoissue = Mosquito::findOrFail($req->id);

                // --------------------- Update fields -----------------------------------------------------
                $mosquitoissue->address     = $req->address;
                $mosquitoissue->issue_type  = $req->issue_type;
                $mosquitoissue->description = $req->description;
                $mosquitoissue->status = $req->status;

                // ------------------Handle optional image upload -------------------------------------
                if ($req->hasFile('image')) {
                    $filename = time().'.'.$req->image->extension();
                    $req->image->move(public_path('uploads/mosquitoissue'), $filename);
                    $mosquitoissue->image = $filename;
                }

                $mosquitoissue->save();

                // -----------------------Redirect ----------------------------------------------------------
                return redirect()
                    ->route('mosquitoissue.list')
                    ->with('success', 'Issue updated successfully');
            }

            
                 public function delete($id)
                   {
                      $mosquitoissue = Mosquito::findOrFail($id);

                     // Optional: delete image file if it exists
                     if ($mosquitoissue->image && file_exists(public_path('uploads/mosquitoissue/' . $mosquitoissue->image))) {
                                unlink(public_path('uploads/mosquitoissue/' . $mosquitoissue->image));
                        }

                            $mosquitoissue->delete();

                            return redirect()->route('mosquitoissue.list')->with('success', 'Issue deleted successfully.');
                        }




   
}


