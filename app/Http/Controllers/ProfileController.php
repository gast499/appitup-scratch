<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Image;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    /**
     * Add auth middleware upon initialisation.
     *
     * @author Kyle Essex
     */
    public function __construct()
    {
        // Allow access to only authenticated users
        $this->middleware('web');
        $this->middleware('auth'); // Some reason adding both middleware is the only way to go!
    }

    /**
     * Get the current user profile.
     *
     * @return View
     * @author Kyle Essex
     */
    public function viewCurrentUserProfile(Request $request)
    {
        // Get the current authenticated user object
        $user = User::find($request->user()->id);
        return view('profiles.view', ['user' => $user]) ;
    }

    public function viewEditCurrentUserProfile(Request $request)
    {
        // Get the current authenticated user object
        $user = User::find($request->user()->id);
        return view('profiles.edit', ['user' => $user]) ;
    }

    /**
     * Validate any alterations and save them.
     *
     * @param Request $request
     * @return back with errors
     * @author Kyle Essex
     */
    public function editCurrentUserProfile(Request $request)
    {
        // Find the current authenticated user object
        $user = User::find($request->user()->id);

        // if input name exists in the request replace name in the user object
        if ($request["first_name"]) {
            $this->validate($request, [
                'first_name' => 'max:255|required'
            ]);
            $user->first_name = $request["first_name"];
        }
        if ($request["last_name"]) {
            $this->validate($request, [
                'last_name' => 'max:255|required'
            ]);
            $user->last_name = $request["last_name"];
        }
        if ($request["email"]) {
            $this->validate($request, [
                'email' => 'email|max:255|required'
            ]);
            $user->email = $request["email"];
        }
        if ($request["location"]) {
            $this->validate($request, [
                'location' => 'max:255'
            ]);
            $user->location = $request["location"];
        }
        if($request['platform']){
            $this->validate($request, [
                'platform' => Rule::in(['Android', 'iOS', 'Web'])
            ]);
            $user->platform = $request['platform'];
        }
        if($request['avatar']){
            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            //Image::make($avatar)->resize(150, 150);
            $img = Image::make($avatar->getRealPath());
            $img->resize(150,150, function ($constraint){
                $constraint->aspectRatio();
            });
            $img->stream();
            $tmp = 'public/avatars/'.$user->id.'/';
            if(!in_array($user->id, Storage::directories('public/avatars'))){
                //mkdir('storage/app/public/avatars/'.$user->id.'/');
                Storage::makeDirectory($tmp);
            }
            Storage::put($tmp.$filename,$img );
            $user->avatar= $filename;
        }
        // if input password exists in the request replace password in the user object

        $user->save();

        Session::flash('message', "Profile Successfully Updated!");
        return view('profiles.view', ['user' => $user]) ;
;
    }
}
