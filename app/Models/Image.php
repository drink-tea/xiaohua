<?php
/**
 * 图片
 *
 * @author Administrator
 *
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \DB;

class Image extends Model
{
    protected $table = 'image';

    protected $guarded = [''];

    protected function getDateFormat()
    {
        return 'U';
    }


    public static function getRow($where)
    {
        $result = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title', 'image.path', 'publisher.path as p_path', 'publisher.name')
            ->where($where)
            ->first();

        return $result;
    }



    public static function getRows($where)
    {
        $result = DB::table('image')
            ->leftJoin('type', 'type.id', '=', 'image.type')
            ->leftJoin('publisher', 'publisher.id', '=', 'image.publisher_id')
            ->select('image.title','image.id', 'image.path', 'publisher.path as p_path', 'publisher.name')
            ->where($where)
            ->orderBy('image.created_at','desc')
            ->get();

        return $result;
    }


}
