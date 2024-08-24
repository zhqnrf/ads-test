<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.user.index', ['users' => $users]);
    }

    public function changeRole(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('status', 'error')->with('message', 'User not found');
        }

        if ($user->role == 'user') {
            $user->update(['role' => 'admin']);
        } else {
            $user->update(['role' => 'user']);
        }

        return back()->with('status', 'success')->with('message', 'Role berhasil diubah');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with('status', 'success')->with('message', 'Data berhasil dihapus');
    }
}
