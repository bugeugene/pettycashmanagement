<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function landingpage(){
    $role = Auth::user()->role;

    return match ($role) {
        'Requester' => redirect('/dashboard/requester'),
        'Finance'   => redirect('/dashboard/finance'),
        'Admin'     => redirect('/dashboard/admin'),
        default     => abort(403, 'Unknown role'),
    };
}
}
