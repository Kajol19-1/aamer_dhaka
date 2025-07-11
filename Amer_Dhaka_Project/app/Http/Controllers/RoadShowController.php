<?php

namespace App\Http\Controllers;
use App\Models\Road;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class RoadShowController extends Controller
{
  public function showlist()
{
    $roadissue = Road::where('user_id', Auth::id())->get(); // fetch only current user's issues

    return view('backend.modules.usershowroadlist.showlist', compact('roadissue'));
}
    public function showdetails($id)
                    {
                        $roadissue = Road::findOrFail($id);
                        return view('backend.modules.usershowroadlist.showdetails', compact('roadissue'));
                    }


     public function useredit($id)        // accept id directly
                {
                    $roadissue = Road::findOrFail($id);
                    return view('backend.modules.usershowroadlist.useredit', compact('roadissue'));
                }


      public function usereditSubmit(Request $req)
            {
                // ----------------- Validate ----------------------------------------------------------
                $req->validate([
                    'id'          => 'required|exists:roads,id',
                    'address'     => 'required|max:200',
                    'issue_type'  => 'required',
                    'issue'       => 'required',
                    'description' => 'required|max:300',
                    'image'       => 'nullable|mimes:jpg,png,jpeg,gif,svg',
                ]);

                //  -----------------------Fetch the record --------------------------------------------------
                $roadissue = Road::findOrFail($req->id);

                // --------------------- Update fields -----------------------------------------------------
                $roadissue->address     = $req->address;
                $roadissue->issue_type  = $req->issue_type;
                $roadissue->issue       = $req->issue;
                $roadissue->description = $req->description;

                // ------------------Handle optional image upload -------------------------------------
                if ($req->hasFile('image')) {
                    $filename = time().'.'.$req->image->extension();
                    $req->image->move(public_path('uploads/roadissue'), $filename);
                    $roadissue->image = $filename;
                }

                $roadissue->save();

                // -----------------------Redirect ----------------------------------------------------------
                return redirect()
                    ->route('usershowroadlist.showlist')
                    ->with('success', 'Issue updated successfully');
            }


}
