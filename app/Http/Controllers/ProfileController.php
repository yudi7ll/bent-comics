<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\User;

class ProfileController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function update(ProfileUpdateRequest $request)
    {
        // dd($request->all());
        \Auth::user()->update($request->validated());

        return response('Profile Updated Successfully', 200);
    }

    public function updatePicture(ProfileUpdateRequest $request)
    {
        $auth = \Auth::user();
        $fileExt = '.'.$request->file('picture')->getClientOriginalExtension();
        $fileName = $auth->idktp;

        // if the photo is not default.png
        // delete the photo
        if ($auth->picture != 'default.png') {
            // delete previous file
            Storage::delete('/public/img/' . $auth->picture);
        }

        // store as a new name
        $request
            ->file('picture')
            ->storePubliclyAs('/public/img', $fileName.$fileExt);

        // update filename on database
        $auth->update([
            'picture' => $fileName.$fileExt
        ]);

        return response('File Uploaded Successfully', 200);
    }
}
