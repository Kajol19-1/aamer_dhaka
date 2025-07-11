<?php

namespace App\Http\Controllers;
use App\Models\Mosquito;

use Illuminate\Http\Request;

class MosquitoShowController extends Controller
{
      public function showlist()
    {
        $mosquitoissue = Mosquito::all();
        return view('backend.modules.usershowmosquitolist.showlist')->with('mosquitoissue',$mosquitoissue);
    } 

      public function showdetails($id)
                    {
                        $mosquitoissue = Mosquito::findOrFail($id);
                        return view('backend.modules.usershowmosquitolist.showdetails', compact('mosquitoissue'));
                    }


    public function useredit($id)        // accept id directly
                {
                    $mosquitoissue = Mosquito::findOrFail($id);
                    return view('backend.modules.usershowmosquitolist.useredit', compact('mosquitoissue'));
                }


      public function usereditSubmit(Request $req)
            {
                // ----------------- Validate ----------------------------------------------------------
                $req->validate([
                    'id'          => 'required|exists:mosquitos,id',
                    'address'     => 'required|max:200',
                    'issue_type'  => 'required',
                    'description' => 'required|max:300',
                    'image'       => 'nullable|mimes:jpg,png,jpeg,gif,svg',
                ]);

                //  -----------------------Fetch the record --------------------------------------------------
                $mosquitoissue = Mosquito::findOrFail($req->id);

                // --------------------- Update fields -----------------------------------------------------
                $mosquitoissue->address     = $req->address;
                $mosquitoissue->issue_type  = $req->issue_type;
                $mosquitoissue->description = $req->description;

                // ------------------Handle optional image upload -------------------------------------
                if ($req->hasFile('image')) {
                    $filename = time().'.'.$req->image->extension();
                    $req->image->move(public_path('uploads/mosquitoissue'), $filename);
                    $mosquitoissue->image = $filename;
                }

                $mosquitoissue->save();

                // -----------------------Redirect ----------------------------------------------------------
                return redirect()
                    ->route('usershowmosquitolist.showlist')
                    ->with('success', 'Issue updated successfully');
            }


}
