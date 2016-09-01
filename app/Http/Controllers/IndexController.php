<?php
namespace App\Http\Controllers;

use App\Models\MyMessage;

use App\Models\Maker;

use App\Models\MakerUser;

use App\Http\Libs\Helper_Huanxin;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserInfoRequest;
use App\Models\RoleApply;
use App\Models\MakerApply;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\UserCategory;
use App\Models\UserInfo;
use App\Models\UserInvestCategory;
use App\Models\UserProject;
use \DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Query\Builder;
use App\Models\Zone;
use App\Models\Category;
use App\Models\Notice;
use App\Models\Type;
use Maatwebsite\Excel\Excel;
use Mockery\CountValidator\Exact;

class IndexController extends CommonController
{

    /**
     * 主页
     *
     * @return Response
     */
    public function getIndex(Request $request)
    {
        return view('index.index');
    }



    /**
     * 搞笑
     *
     * @return Response
     */
    public function getFun(Request $request)
    {
        dd(1);
        return view('index.fun');
    }

    /**
     * 风景
     *
     * @return Response
     */
    public function getScenery(Request $request)
    {
        return view('index.scenery');
    }


    /**
     * 科技
     *
     * @return Response
     */
    public function getTech(Request $request)
    {
        return view('index.tech');
    }

    /**
     * 猎奇
     *
     * @return Response
     */
    public function getStrange(Request $request)
    {
        return view('index.strange');
    }


    /**
     * 小动物
     *
     * @return Response
     */
    public function getPuppy(Request $request)
    {
        return view('index.puppy');
    }

    /**
     * 表情
     *
     * @return Response
     */
    public function getBiaoqing(Request $request)
    {
        return view('index.biaoqing');
    }



    /**
     * 妹子
     *
     * @return Response
     */
    public function getGirls(Request $request)
    {
        return view('index.girls');
    }


    /**
     * 详情页
     */
    public function getDetail(Request $request)
    {
        $data = $request->input();

        return view('index.detail');
    }

}