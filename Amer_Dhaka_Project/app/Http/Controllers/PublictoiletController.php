<?php

namespace App\Http\Controllers;

use App\Models\Publictoilet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublictoiletController extends Controller
{
    public function create()
    {
         return view('backend.modules.publictoiletissue.create');
    }
   public function createSubmit(Request $req)
{
    $req->validate([
        'address'     => 'required|max:200',
        'issue_type'  => 'required',
        'description' => 'required|max:300',
        'image'       => 'required|mimes:jpg,png,jpeg,gif,svg',
    ], [
        'address.required'    => 'Please enter your location',
        'address.max'         => 'Maximum 200 characters',
        'issue_type.required' => 'Please select your issue type',
        'description.required'=> 'Please enter a description',
        'image.mimes'         => 'Please provide a jpg, png, jpeg, gif, or svg file',
    ]);

    $publictoiletissue = new Publictoilet();
    $publictoiletissue->user_id     = Auth::id();
    $publictoiletissue->address     = $req->address;
    $publictoiletissue->issue_type  = $req->issue_type;
    $publictoiletissue->description = $req->description;

    /* Handle image upload */
    if ($req->hasFile('image')) {
        $file      = $req->file('image');
        $filename  = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/publictoiletissue'), $filename);
        $publictoiletissue->image = $filename;
    }

    $publictoiletissue->save();

    return  "Public toilet issue create successfully done!!!";
}


                 public function list()
                    {
                        $publictoiletissue = Publictoilet::all();
                        return view('backend.modules.publictoiletissue.list')->with('publictoiletissue',$publictoiletissue);
                    } 
    
                    public function details($id)
                    {
                        $publictoiletissue = Publictoilet::findOrFail($id);
                        return view('backend.modules.publictoiletissue.details', compact('publictoiletissue'));
                    }
                    public function edit(Request $request){
                                //return $request->id;
                                $id =$request->id;
                            $publictoiletissue = Publictoilet::findOrFail($request->id);

                                //return $student;
                                return view('backend.modules.publictoiletissue.edit')->with('publictoiletissue', $publictoiletissue);
                            
                            }


                   public function editSubmit(Request $req)
                        {
                            // ----------------- Validate ----------------------------------------------------------
                            $req->validate([
                                'id'          => 'required|exists:publictoilets,id',
                                'address'     => 'required|max:200',
                                'issue_type'  => 'required',
                                'description' => 'required|max:300',
                                'status'  => 'required',
                                'image'       => 'nullable|mimes:jpg,png,jpeg,gif,svg',
                                
                            ]);

                //  -----------------------Fetch the record --------------------------------------------------
                $publictoiletissue = Publictoilet::findOrFail($req->id);

                // --------------------- Update fields -----------------------------------------------------
                $publictoiletissue->address     = $req->address;
                $publictoiletissue->issue_type  = $req->issue_type;
                $publictoiletissue->description = $req->description;
                $publictoiletissue->status = $req->status;

                // ------------------Handle optional image upload -------------------------------------
                if ($req->hasFile('image')) {
                    $filename = time().'.'.$req->image->extension();
                    $req->image->move(public_path('uploads/publictoiletissue'), $filename);
                    $publictoiletissue->image = $filename;
                }

                $publictoiletissue->save();

                // -----------------------Redirect ----------------------------------------------------------
                return redirect()
                    ->route('publictoiletissue.list')
                    ->with('success', 'Issue updated successfully');
            }

            
                 public function delete($id)
                   {
                      $publictoiletissue = Publictoilet::findOrFail($id);

                     // Optional: delete image file if it exists
                     if ($publictoiletissue->image && file_exists(public_path('uploads/publictoiletissue/' . $publictoiletissue->image))) {
                                unlink(public_path('uploads/publictoiletissue/' . $publictoiletissue->image));
                        }

                            $publictoiletissue->delete();

                            return redirect()->route('publictoiletissue.list')->with('success', 'Issue deleted successfully.');
                        }

}
