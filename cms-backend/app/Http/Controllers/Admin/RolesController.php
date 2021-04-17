<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
class RolesController extends Controller
{
    //
    public function index(){
        Role::all();
    }
}
