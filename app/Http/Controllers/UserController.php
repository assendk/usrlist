<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Flash;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getAuthUser ()
    {
        return Auth::user();
    }

    public function show()
    {
        $file = new Filesystem();
        $profiles_folder = 'avatars';
        $directory = public_path(). '/' . $profiles_folder;
        if ( $file->isDirectory($directory))
        {
            return view('profile.edit', ['user' => Auth::user()]);
        }
        else
        {
            $file->makeDirectory($directory, 0775, true);

            $oldPath = public_path() . '/img/user.png'; // publc/images/1.jpg
            $newPath = $directory . '/user.png'; // publc/images/2.jpg
//            var_dump($newPath, $oldPath);

            if (File::copy($oldPath , $newPath)) {
                return view('profile.edit', ['user' => Auth::user()]);
//                dd("success");
            }

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
//        $user = Auth::user();
        $user = Auth::user();
        return view('profile.edit', compact('user') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Get current user
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        // Validate the data submitted by user
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:225|'. Rule::unique('users')->ignore($user->id),
            'password' => 'confirmed'
        ]);

        // if fails redirects back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Fill user model
        $user->fill([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Save user to database
        $user->save();

        // Redirect to route
        return redirect()->route('profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function profilePic()
    {
        $user = Auth::user();
        return view('user',compact('user',$user));
    }

    public function updateProfilePic(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

//        $request->avatar->storeAs('avatars',$avatarName);
        $request->avatar->move(public_path('avatars'), $avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }

}
