<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $user;

    /**
     * Create a new controller instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $user = $this->user->find(auth()->id());

        if ($user->isAdmin()) {
            $users = $this->user->withTrashed()->paginate(3);

            return view('home', [
                'users' => $users
            ]);
        }
        if ($user->isUser()) {
            return view('home', [
                'userInfo' => $user
            ]);
        }
        return view('home');
    }

    public function deleteUser($id)
    {
        $this->user->where('id', $id)->delete();
        return redirect()->route('home');
    }
}
