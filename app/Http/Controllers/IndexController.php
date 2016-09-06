<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \DB;
use Illuminate\Http\Request;

class IndexController extends CommonController
{
   public $tags = array();


    public function __construct()
    {

        $tags = DB::table('tag')->lists('name','id');
        $this->tags = $tags;
    }

    /**
     * 主页
     *
     * @return Response
     */
    public function getIndex(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
            ->paginate(10);



        return view('index.index')->with('lists', $lists)->with('tags', $this->tags);
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
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
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
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
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
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
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
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
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
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
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
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
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
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
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
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
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
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
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
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
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
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
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




    /**
     * 通过标签id获取列表
     */
    public function getBytag(Request $request)
    {
        $data = $request->input();

        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('image.tag_id', $data['tag_id'])
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
            ->paginate();
        return view('index.index')->with('lists', $lists)->with('tags', $this->tags);

    }



    public function postSearch(Request $request)
    {
        $data = $request->input();

        $lists = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('image.title','like', '%'.$data['keyword'].'%')
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
            ->paginate();
        return view('index.index')->with('lists', $lists)->with('tags', $this->tags);
    }

}