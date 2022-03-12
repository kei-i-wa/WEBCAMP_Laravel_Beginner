<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterPost;
use App\Models\User as UserModel;

class UserController extends Controller
{
    /**
     * トップページ を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * ログイン処理
     * 
     */
    public function register(UserRegisterPost $request)
    {
        $datum = $request->validated();
        try{
            $r= UserModel::create($datum);
            // var_dump($r); exit;
        }catch(\Throwable $e){
            echo $e->getMessage();
            exit;
        }
        
        

        // // 認証
        // if (Auth::attempt($datum) === false) {
        //     return back()
        //           ->withInput() // 入力値の保持
        //           ->withErrors(['auth' => 'emailかパスワードに誤りがあります。',]) // エラーメッセージの出力
        //           ;
        // }

        // //
        // $request->session()->regenerate();
        // return redirect()->intended('/task/list');
    }

    /**
     * ログアウト処理
     * 
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();  // CSRFトークンの再生成
        $request->session()->regenerate();  // セッションIDの再生成
        return redirect(route('front.index'));
    }
}