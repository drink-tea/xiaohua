<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use \DB;
use Illuminate\Http\Request;

class IndexController extends CommonController
{
    public $tags = array();
    public $sides = array();

    public function __construct()
    {
        $tags = DB::table('tag')->lists('name', 'id');
        $this->tags = $tags;
        $fun = Image::getRows(['type.code'=>'fun']);
        $scenery =Image::getRows(['type.code'=>'scenery']);
        $tech = Image::getRows(['type.code'=>'tech']);
        $strange = Image::getRows(['type.code'=>'strange']);
        $puppy = Image::getRows(['type.code'=>'puppy']);
        $biaoqing = Image::getRows(['type.code'=>'biaoqing']);
        $girls = Image::getRows(['type.code'=>'girls']);
        $food = Image::getRows(['type.code'=>'food']);
        $man = Image::getRows(['type.code'=>'man']);
        $painting = Image::getRows(['type.code'=>'painting']);
        $sport = Image::getRows(['type.code'=>'sport']);
        if(isset($fun[0])){
            $this->sides[] = $fun[0];
        }

        if(isset($scenery[0])){
            $this->sides[] = $scenery[0];
        }

        if(isset($tech[0])){
            $this->sides[] = $tech[0];
        }

        if(isset($strange[0])){
            $this->sides[] = $strange[0];
        }

        if(isset($puppy[0])){
            $this->sides[] = $puppy[0];
        }

        if(isset($biaoqing[0])){
            $this->sides[] = $biaoqing[0];
        }

        if(isset($girls[0])){
            $this->sides[] = $girls[0];
        }

        if(isset($food[0])){
            $this->sides[] = $food[0];
        }

        if(isset($man[0])){
            $this->sides[] = $man[0];
        }

        if(isset($painting[0])){
            $this->sides[] = $painting[0];
        }

        if(isset($sport[0])){
            $this->sides[] = $sport[0];
        }

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

        return view('index.index')->with('lists', $lists)->with('tags', $this->tags)->with('sides', $this->sides);
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
        $list = Image::getRow(['image.id'=> $data['id']]);

        $recs = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->where('type.id','<>', $data['id'])
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
            ->take(9)->get();
//        dd($recs);exit;

        return view('index.detail')->with('list', $list)->with('recs', $recs)
            ->with('tags', $this->tags)->with('sides', $this->sides);
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
            ->where('image.title', 'like', '%' . $data['keyword'] . '%')
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
            ->paginate();

        return view('index.index')->with('lists', $lists)->with('tags', $this->tags);
    }

}