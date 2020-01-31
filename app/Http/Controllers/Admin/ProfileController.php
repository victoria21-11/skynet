<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\Profile\{
    Update,
    Index,
    ResetPassword,
};

class ProfileController extends Controller
{
    public function index(Index $request)
    {
        $user = auth()->user();
        return view('admin.profile.index', [
            'user' => $user,
            'media' => $user->prepareMedia(['avatar'])
        ]);
    }

    public function update(Update $request)
    {
        auth()->user()->update($request->validated());
        auth()->user()->syncMedia(['avatar']);
        return response([]);
    }

    public function resetPassword(ResetPassword $request)
    {
        auth()->user()->update([
            'password' => Hash::make($request->password),
            'email_verified_at' => Str::random(60)
        ]);
        return response([]);
    }
}
