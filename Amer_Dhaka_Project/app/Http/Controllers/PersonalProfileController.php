<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\PersonalProfile;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Thana;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PersonalProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions=Division::pluck('name','id');

        $personalprofile=PersonalProfile::where('user_id', Auth::id())->first();
        return view('backend.modules.personalprofile.personalprofile', compact('divisions','personalprofile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'phone'=>'required',
            'gender'=>'required',
            'division_id'=>'required',
            'district_id'=>'required',
            'thana_id'=>'required',
        ]);
        $personalprofile_data = $request->all();
        $personalprofile_data['user_id']= Auth::id();
        $existing_personalprofile = PersonalProfile::where('user_id', Auth::id())->first();
        if ($existing_personalprofile){
            $existing_personalprofile->update($personalprofile_data);
        }
        else{
             PersonalProfile::create($personalprofile_data);
        }
       
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalProfile $personalProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalProfile $personalProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonalProfile $personalProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalProfile $personalProfile)
    {
        //
    }

            public function getDistrict(int $division_id)
            {
                $districts = District::select('id', 'name')->where('division_id', $division_id)->get(); // ✅ Fix here
                return response()->json($districts);
            }


             public function getThana(int $district_id)
            {
                $thanas = Thana::select('id', 'name')->where('district_id', $district_id)->get(); // ✅ Fix here
                return response()->json($thanas);
            }

          final  public function upload_photo(Request $request)
            {
            

                 $file = $request->input('photo');
                $name = Str::slug(Auth::user()->name.Carbon::now());
                $height =200;
                $width =200;
                $path ='image/user/';
               $image_name = PhotoUploadController::imageUpload($name, $height, $width, $path, $file);
                
               $personalprofile_data['photo'] = $image_name;


                $personalprofile=PersonalProfile::where('user_id', Auth::id())->first();
                if($personalprofile){
                    $personalprofile->update($personalprofile_data);
                    // return response()->json([
                    //     'msg'=>'Porfile photo uploaded successfully',
                    //     'cls'=>'success',
                    //     'photo'=>url($path.$personalprofile->photo)

                    // ]);
                    //   return response()->json([
                    //     'msg'=>'Please Update profile first',
                    //     'cls'=>'warning',
                    //     'photo'=>url($path.$personalprofile->photo)

                    // ]);
                    
                }
               
               
            }

      

}