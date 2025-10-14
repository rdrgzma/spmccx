<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '=','Associado(a)')->paginate(25);

        return view('users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $dataForm = $request->all();


        $users = User::where('name', 'LIKE', "%{$dataForm['search']}%")
            ->where('role', '=','Associado(a)')
            ->orWhere('email', 'LIKE', "%{$dataForm['search']}%")
            ->paginate(25);
        $redirect =true;

        return view('users.index', compact('users','redirect'));
    }
}