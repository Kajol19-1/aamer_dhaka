<?php

namespace App\Http\Controllers;
use App\Models\Publictoilet;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PublictoiletShowController extends Controller
{
   
      public function showlist()
            {
                $publictoiletissue = Publictoilet::where('user_id', Auth::id())->get(); // fetch only current user's issues

                return view('backend.modules.usershowpublictoiletlist.showlist', compact('publictoiletissue'));
            }
     public function showdetails($id)
                    {
                        $publictoiletissue = Publictoilet::findOrFail($id);
                        return view('backend.modules.usershowpublictoiletlist.showdetails', compact('publictoiletissue'));
                    }


                     public function useredit($id)        // accept id directly
                {
                    $publictoiletissue = Publictoilet::findOrFail($id);
                    return view('backend.modules.usershowpublictoiletlist.useredit', compact('publictoiletissue'));
                }


      public function usereditSubmit(Request $req)
            {
                // ----------------- Validate ----------------------------------------------------------
                $req->validate([
                    'id'          => 'required|exists:publictoilets,id',
                    'address'     => 'required|max:200',
                    'issue_type'  => 'required',
                    'description' => 'required|max:300',
                    'image'       => 'nullable|mimes:jpg,png,jpeg,gif,svg',
                ]);

                //  -----------------------Fetch the record --------------------------------------------------
                $publictoiletissue = Publictoilet::findOrFail($req->id);

                // --------------------- Update fields -----------------------------------------------------
                $publictoiletissue->address     = $req->address;
                $publictoiletissue->issue_type  = $req->issue_type;
                $publictoiletissue->description = $req->description;

                // ------------------Handle optional image upload -------------------------------------
                if ($req->hasFile('image')) {
                    $filename = time().'.'.$req->image->extension();
                    $req->image->move(public_path('uploads/publictoiletissue'), $filename);
                    $publictoiletissue->image = $filename;
                }

                $publictoiletissue->save();

                // -----------------------Redirect ----------------------------------------------------------
                return redirect()
                    ->route('usershowpublictoiletlist.showlist')
                    ->with('success', 'Issue updated successfully');
            }


}
