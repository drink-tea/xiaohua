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
     * 显示前台用户列表
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('index.index');
    }











}