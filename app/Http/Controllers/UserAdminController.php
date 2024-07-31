<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
class UserAdminController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return Inertia::render('Admin/Users/Index',[
            'users' => $users,
        ]);
    }
}
