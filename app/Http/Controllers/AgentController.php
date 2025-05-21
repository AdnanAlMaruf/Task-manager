<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Task;

class AgentController extends Controller
{
    public function dashboard()
    {
    $tasks = Task::all();
    return view('client.dashboard', compact('tasks'));
    }
}
