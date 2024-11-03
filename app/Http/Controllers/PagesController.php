<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublishersModel as Publishers;

class PagesController extends Controller
{
    public function loginPage () {
        return view('login');
    }

    public function dashboardAdmin () {
        return view('admin.admin_dashboard', ['level' => 'admin']);
    }
    public function registerUser () {
        return view('user.register');
    }
    public function viewPublisher() {
        $data = Publishers::readPublishers();
        return view('admin.admin_publishers_view', ['level' => 'admin'])->with('publishers', $data);
    }

    public function update_publishers ($id) {
        $publishers = Publishers::readPublisherById($id);
    
        return view('admin.admin_update_publishers', ['level' => 'admin'])->with('publishers', $publishers);
    }
}
