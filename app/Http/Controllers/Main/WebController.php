<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Library\PublicController;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class WebController extends Controller
{
    public function home()
    {
        $data = [
            'title' => 'Dashboard',
            'page' => 'dash',
            'total_user' => User::count(),
            'total_materi' => Materi::count(),
            'users' => User::orderBy('username', 'ASC')->get(),
        ];

        return view('main.index', $data);
    }

    public function manage_users()
    {

        $data = [
            'title' => "Manage Users",
            'page' => 'mu',
            'users' => User::all(),
        ];

        return view('main.manage_users', $data);
    }

    public function addUser(Request $request)
    {
        if ($request->nis == true && $request->username == true && $request->role == true) {
            $data = new User();

            $data->nis = $request->nis;
            $data->username = $request->username;
            $data->role = $request->role;
            $data->gambar = 'default.png';
            $data->password = Hash::make($request->nis);

            $data->save();
        } else {
            return back()->with('gagal', 'Inputan tidak boleh kosong');
        }

        return back()->with('success', 'Berhasil menambahkan 1 user');
    }

    public function deleteUser($id)
    {
        $data = User::find($id);
        $data->delete();

        return back()->with('success', 'Perhatian! satu user berhasil di hapus!');
    }

    public function editUser(Request $request, $id)
    {
        $data = User::find($id);

        $data->nis = $request->nis;
        $data->username = $request->username;
        $data->role = $request->role;

        $data->save();

        return back()->with('success', 'Satu user berhasil di update');
    }

    public function myProfil()
    {
        $data = [
            'title' => 'My Profil',
            'page' => 'mp',
        ];
        return view('main.profil', $data);
    }

    public function updateProfil(Request $request)
    {
        $request->validate(
            ['username' => 'required']
        );

        if ($request->username == true) {
            Auth::user()->update(['username' => $request->username]);
            return back()->with('success', 'Profil berhasil di update');
        }
    }

    public function changePassword()
    {
        $data = [
            'title' => 'Ganti Password',
            'page' => 'cp',
        ];

        return view('main.update_pw', $data);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:5', 'confirmed']
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            Auth::user()->update(['password' => Hash::make($request->password)]);
            return redirect(route('home'))->with('success', 'Password berhasil diubah');
        }

        throw ValidationException::withMessages([
            'current_password' => 'Your password does not match with our record'
        ]);
    }
}
