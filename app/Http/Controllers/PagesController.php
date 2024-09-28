<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublishersModel as Publishers;

class PagesController extends Controller
{
    public function loginPage () {
        return view('public.login');
    }

    public function dashboardAdmin () {
        return view('admin.admin_dashboard', ['level' => 'admin']);
    }
    
    

    public function viewPublisher() {
        $data = Publishers::readPublishers();
        return view('admin.admin_publishers_view', ['level' => 'admin'])->with('publishers', $data);
    }
}
