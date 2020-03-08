<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UsersRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\ForgotPasswordController;

class ProfileController extends Controller
{
    public function edit(Request $request, $name){
        User::where('name', $name)->firstOrFail();
        return view('pages.profile');
    }
    public function update(UsersRequest $request,$name)
    {
        
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/user', 'public'
        );
        $data['password'] = Hash::make($data['password']);
        $request->user()->update($data);

        return redirect()->back();
    }
}
