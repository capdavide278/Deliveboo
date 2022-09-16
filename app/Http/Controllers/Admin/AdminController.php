<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    protected $perPage= 10;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $restaurants = Auth::user()->restaurant()->paginate($this->perPage);
        return view('admin.home', compact('restaurants'));
    }
}
