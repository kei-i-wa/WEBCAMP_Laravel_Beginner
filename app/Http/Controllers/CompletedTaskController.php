<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Task as TaskModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CompletedTask as CompletedTaskModel;


class CompletedTaskController extends Controller
{
     //完了タスク一覧
     public function list()
     {
         $per_page = 20;
         $list = CompletedTaskModel::where('user_id', Auth::id())
                          ->orderBy('period')
                          ->orderBy('created_at')
                          ->paginate($per_page);
           return view('completed.list', ['list' => $list]);
     }
 }