<?php
namespace App\Http\Controllers;

use App\Models\MyMessage;

use App\Models\Maker;

use App\Models\MakerUser;

use App\Http\Libs\Helper_Huanxin;
use App\Http\Controllers\Controller;
use \DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AboutController extends CommonController
{

    /**
     * 意见反馈
     *
     * @return Response
     */
    public function getFeed(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
            ->paginate(10);


        $tags = DB::table('tag')->get();

        return view('index.index')->with('lists', $lists)->with('tags', $tags);
    }



    /**
     * 关于我们
     *
     * @return Response
     */
    public function getAbout(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
            ->paginate(10);


        $tags = DB::table('tag')->get();

        return view('index.index')->with('lists', $lists)->with('tags', $tags);
    }



    /**
     * 联系我们
     *
     * @return Response
     */
    public function getContact(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
            ->paginate(10);


        $tags = DB::table('tag')->get();

        return view('index.index')->with('lists', $lists)->with('tags', $tags);
    }



    /**
     * 联系我们
     *
     * @return Response
     */
    public function getState(Request $request)
    {
        $lists = DB::table('image')
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
            ->paginate(10);


        $tags = DB::table('tag')->get();

        return view('index.index')->with('lists', $lists)->with('tags', $tags);
    }


}