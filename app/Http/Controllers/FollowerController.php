<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{

    public function store(User $user)
    {
        // Attach para relaciones Many to Many
        $user->followers()->attach(auth()->user()->id);
        return back();
    }

    public function destroy(User $user)
    {
        // Attach para relaciones Many to Many
        $user->followers()->detach(auth()->user()->id);
        return back();
    }
}
