<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \View;
use App\Models\AdmController;

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $prefix;

    protected $uploadDir;

    protected $gameDir;

    protected $imgUrl;

    protected $wjtrUrl;

    protected $_apiurl = "http://wj3t.wjtr.com/api";//测试

    protected $_appurl = "http://wj3t.wjtr.com/webapp";//测试

    protected $_baseurl = "http://wj3t.wjtr.com";//测试

    protected $actions = array();

    function __construct(){
        //debug 开启
//        \Debugbar::enable();
        //debug 关闭
        //\Debugbar::disable();
        date_default_timezone_set('Asia/Shanghai');
        $this->prefix = config('database.connections.mysql.prefix');

        $this->uploadDir = config('upload.uploadDir');

        $this->gameDir = config('upload.gameDir');

        $this->wjtrUrl = config('system.wjtrUrl');

        $this->imgUrl= config('app.imgUrl');

        View::composer('layouts._nav', function($view)
        {
            $submodules = User::getPermissionNav(1);

            $view->with('submodules', $submodules);
        });
        View::composer('layouts._menu', function($view)
        {
            $submodule_id = Request::input('submodule_id');
            if(!empty($submodule_id)){
                session(['submodule_id' => $submodule_id]);
            }
            if(session('submodule_id')){
                $submodule_id = session('submodule_id');
            }
            $controller_id = Request::input('controller_id');
            if(!empty($controller_id)){
                session(['controller_id' => $controller_id]);
            }
            if(session('controller_id')){
                $controller_id = session('controller_id');
            }
            $controllers = User::getPermissionMenu($submodule_id,1);
            $nowController = AdmController::where('id', $controller_id)->first();
//            dd($controllers);
            $view->with('controllers', $controllers)->with('nowController', $nowController);
        });
        if(Request::has("controller_id") || !empty(session('controller_id'))){
            $controller_id = Request::input("controller_id");
            if(!empty($controller_id)){
                session(['controller_id' => $controller_id]);
            }
            if(session('controller_id')){
                $controller_id = session('controller_id');
            }
            $actions = User::getPermissionAction($controller_id,1);
            $this->actions = $actions;
        }
    }

    function tip($message = '', $jumpUrl = '', $status = false) {

        return view('tip.index')->with('message',$message)->with('jumpUrl',$jumpUrl)->with('status',$status);
    }

    /**编辑的公共方法
     *
     * @param Request $request
     * @param unknown_type $model 模型
     * @param unknown_type $primary 主键
     * @param unknown_type $uid	主键值
     * @param unknown_type $list    修改的字段
     * @return boolean
     */
    static function editList(Request $request,$model,$primary,$uid,$list){
        $data=array();
        foreach($list as $k=>$v){
            if($request->has($v)){
                $data[$v]=$request->input($v);
            }
        }
        if(count($data)){
            $model::where($primary,$uid)->update($data);
        }
        return true;
    }
}
