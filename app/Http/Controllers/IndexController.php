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
        $lists = DB::table('image')->paginate();

        return view('index.index')->with('lists', $lists);
    }


    /**
     * 搞笑
     *
     * @return Response
     */
    public function getFun(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('type.code', 'fun')
            ->paginate();
        return view('index.index')->with('lists', $lists);
    }

    /**
     * 风景
     *
     * @return Response
     */
    public function getScenery(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('type.code', 'scenery')
            ->paginate();
        return view('index.index')->with('lists', $lists);
    }


    /**
     * 科技
     *
     * @return Response
     */
    public function getTech(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('type.code', 'tech')
            ->paginate();
        return view('index.index')->with('lists', $lists);
    }

    /**
     * 猎奇
     *
     * @return Response
     */
    public function getStrange(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('type.code', 'strange')
            ->paginate();
        return view('index.index')->with('lists', $lists);
    }


    /**
     * 小动物
     *
     * @return Response
     */
    public function getPuppy(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('type.code', 'puppy')
            ->paginate();
        return view('index.index')->with('lists', $lists);
    }

    /**
     * 表情
     *
     * @return Response
     */
    public function getBiaoqing(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('type.code', 'biaoqing')
            ->paginate();
        return view('index.index')->with('lists', $lists);
    }



    /**
     * 妹子
     *
     * @return Response
     */
    public function getGirls(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('type.code', 'girls')
            ->paginate();
        return view('index.index')->with('lists', $lists);
    }


    /**
     * 美食
     *
     * @return Response
     */
    public function getFood(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('type.code', 'food')
            ->paginate();
        return view('index.index')->with('lists', $lists);
    }



    /**
     * 汉子
     *
     * @return Response
     */
    public function getMan(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('type.code', 'man')
            ->paginate();
        return view('index.index')->with('lists', $lists);
    }




    /**
     * 名画
     *
     * @return Response
     */
    public function getPainting(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('type.code', 'painting')
            ->paginate();
        return view('index.index')->with('lists', $lists);
    }



    /**
     * 体育
     *
     * @return Response
     */
    public function getSport(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('type.code', 'sport')
            ->paginate();
        return view('index.index')->with('lists', $lists);
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