<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use App\Http\Requests\TaskRegisterPostRequest;
use App\Models\Task as TaskModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * タスク一覧を を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function list()
    {
        return view('task.list');
    }
    
     public function register(TaskRegisterPostRequest $request)
    {
        // validate済みのデータの取得
        $datum = $request->validated();
        //
        //$user = Auth::user();
        //$id = Auth::id();
        //var_dump($datum, $user, $id); exit;

        // user_id の追加
        $datum['user_id'] = Auth::id();

        // テーブルへのINSERT
 // テーブルへのINSERT
        try {
            $r = TaskModel::create($datum);
            // var_dump($r); exit;
        } catch(\Throwable $e) {
            // XXX 本当はログに書く等の処理をする。今回は一端「出力する」だけ
            echo $e->getMessage();
            exit;
        }
        
        $request->session()->flash('front.task_register_success', true);
        return redirect('/task/list');
    }
}