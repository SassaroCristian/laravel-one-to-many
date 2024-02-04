<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\LaravelAuthModelController;
use Illuminate\Http\Request;
use App\Models\LaravelAuthModel;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class DashboardController extends Controller
{
    public function index()
    {

        $projects = LaravelAuthModel::all();
        return view('admin.admin');
    }
}
