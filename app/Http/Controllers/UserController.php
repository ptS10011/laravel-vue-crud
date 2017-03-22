<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function index()
    {
        return User::orderBy('updated_at', 'desc')->get();
    }

    public function single($id)
    {
        $user = User::findOrFail($id);

        return $user;
    }

    public function store(Request $request)
    {
        $user = new User();

        $this->save($request, $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->save($request, $user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
    }

    private function save($request, $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;

        $user->save();
    }

}
