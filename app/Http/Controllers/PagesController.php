<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function loginPage () {
        return view('public.login');
  }

  public function dashboardAdmin () {
    return view('admin.admin_dashboard', ['level' => 'admin']);
}
}
