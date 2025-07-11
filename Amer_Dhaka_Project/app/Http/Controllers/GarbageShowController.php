<?php

namespace App\Http\Controllers;
use App\Models\Garbage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GarbageShowController extends Controller
{
    
      public function showlist()
{
    $garbageissue = Garbage::where('user_id', Auth::id())->get(); // fetch only current user's issues

    return view('backend.modules.usershowgarbagelist.showlist', compact('garbageissue'));
}
    

     public function showdetails($id)
                    {
                        $garbageissue = Garbage::findOrFail($id);
                        return view('backend.modules.usershowgarbagelist.showdetails', compact('garbageissue'));
                    }


                      public function useredit($id)        // accept id directly
                {
                    $garbageissue = Garbage::findOrFail($id);
                    return view('backend.modules.usershowgarbagelist.useredit', compact('garbageissue'));
                }


      public function usereditSubmit(Request $req)
            {
                // ----------------- Validate ----------------------------------------------------------
                $req->validate([
                    'id'          => 'required|exists:garbages,id',
                    'address'     => 'required|max:200',
                    'issue_type'  => 'required',
                    'description' => 'required|max:300',
                    'image'       => 'nullable|mimes:jpg,png,jpeg,gif,svg',
                ]);

                //  -----------------------Fetch the record --------------------------------------------------
                $garbageissue = Garbage::findOrFail($req->id);

                // --------------------- Update fields -----------------------------------------------------
                $garbageissue->address     = $req->address;
                $garbageissue->issue_type  = $req->issue_type;
                $garbageissue->description = $req->description;

                // ------------------Handle optional image upload -------------------------------------
                if ($req->hasFile('image')) {
                    $filename = time().'.'.$req->image->extension();
                    $req->image->move(public_path('uploads/garbageissue'), $filename);
                    $garbageissue->image = $filename;
                }

                $garbageissue->save();

                // -----------------------Redirect ----------------------------------------------------------
                return redirect()
                    ->route('usershowgarbagelist.showlist')
                    ->with('success', 'Issue updated successfully');
            }


}
