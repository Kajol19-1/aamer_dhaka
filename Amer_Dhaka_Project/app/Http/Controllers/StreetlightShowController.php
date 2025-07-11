<?php

namespace App\Http\Controllers;

use App\Models\StreetLight;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StreetlightShowController extends Controller
{

            public function showlist()
            {
                $streetlightissue = StreetLight::where('user_id', Auth::id())->get(); // fetch only current user's issues

                return view('backend.modules.usershowstreetlightlist.showlist', compact('streetlightissue'));
            }
     public function showdetails($id)
                    {
                        $streetlightissue = StreetLight::findOrFail($id);
                        return view('backend.modules.usershowstreetlightlist.showdetails', compact('streetlightissue'));
                    }


                public function useredit($id)        // accept id directly
                {
                    $streetlightissue = StreetLight::findOrFail($id);
                    return view('backend.modules.usershowstreetlightlist.useredit', compact('streetlightissue'));
                }


      public function usereditSubmit(Request $req)
            {
                // ----------------- Validate ----------------------------------------------------------
                $req->validate([
                    'id'          => 'required|exists:street_lights,id',
                    'address'     => 'required|max:200',
                    'issue_type'  => 'required',
                    'description' => 'required|max:300',
                    'image'       => 'nullable|mimes:jpg,png,jpeg,gif,svg',
                ]);

                //  -----------------------Fetch the record --------------------------------------------------
                $streetlightissue = StreetLight::findOrFail($req->id);

                // --------------------- Update fields -----------------------------------------------------
                $streetlightissue->address     = $req->address;
                $streetlightissue->issue_type  = $req->issue_type;
                $streetlightissue->description = $req->description;

                // ------------------Handle optional image upload -------------------------------------
                if ($req->hasFile('image')) {
                    $filename = time().'.'.$req->image->extension();
                    $req->image->move(public_path('uploads/streetlightissue'), $filename);
                    $streetlightissue->image = $filename;
                }

                $streetlightissue->save();

                // -----------------------Redirect ----------------------------------------------------------
                return redirect()
                    ->route('usershowstreetlightlist.showlist')
                    ->with('success', 'Issue updated successfully');
            }

}
