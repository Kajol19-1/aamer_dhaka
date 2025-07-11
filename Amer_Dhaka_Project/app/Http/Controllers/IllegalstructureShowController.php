<?php

namespace App\Http\Controllers;
use App\Models\Illegalstructure;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class IllegalstructureShowController extends Controller
{
    
      public function showlist()
            {
                $illegalstructureissue = Illegalstructure::where('user_id', Auth::id())->get(); // fetch only current user's issues

                return view('backend.modules.usershowillegalstructurelist.showlist', compact('illegalstructureissue'));
            }

       public function showdetails($id)
                    {
                        $illegalstructureissue = Illegalstructure::findOrFail($id);
                        return view('backend.modules.usershowillegalstructurelist.showdetails', compact('illegalstructureissue'));
                    }
             public function useredit($id)        // accept id directly
                {
                    $illegalstructureissue = Illegalstructure::findOrFail($id);
                    return view('backend.modules.usershowillegalstructurelist.useredit', compact('illegalstructureissue'));
                }


      public function usereditSubmit(Request $req)
            {
                // ----------------- Validate ----------------------------------------------------------
                $req->validate([
                    'id'          => 'required|exists:illegalstructures,id',
                    'address'     => 'required|max:200',
                    'issue_type'  => 'required',
                    'description' => 'required|max:300',
                    'image'       => 'nullable|mimes:jpg,png,jpeg,gif,svg',
                ]);

                //  -----------------------Fetch the record --------------------------------------------------
                $illegalstructureissue = Illegalstructure::findOrFail($req->id);

                // --------------------- Update fields -----------------------------------------------------
                $illegalstructureissue->address     = $req->address;
                $illegalstructureissue->issue_type  = $req->issue_type;
                $illegalstructureissue->description = $req->description;

                // ------------------Handle optional image upload -------------------------------------
                if ($req->hasFile('image')) {
                    $filename = time().'.'.$req->image->extension();
                    $req->image->move(public_path('uploads/illegalstructureissue'), $filename);
                    $illegalstructureissue->image = $filename;
                }

                $illegalstructureissue->save();

                // -----------------------Redirect ----------------------------------------------------------
                return redirect()
                    ->route('usershowillegalstructurelist.showlist')
                    ->with('success', 'Issue updated successfully');
            }


}
