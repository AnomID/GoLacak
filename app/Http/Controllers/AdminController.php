<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        return Inertia::render('AdminDashboard'); // render halaman AdminDashboard.jsx
    }
}

