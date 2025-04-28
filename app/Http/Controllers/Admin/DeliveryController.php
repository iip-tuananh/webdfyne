<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\About;
use App\Model\Admin\Category;
use App\Model\Admin\Delivery;
use Illuminate\Http\Request;
use App\Model\Admin\Delivery as ThisModel;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use \stdClass;

use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Helpers\FileHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Common\Customer;

class DeliveryController extends Controller
{
    protected $view = 'admin.delivery';
    protected $route = 'delivery';

    public function edit()
    {
        $object = Delivery::query()->find(1);

        return view($this->view.'.edit', compact(['object']));
    }

    public function update(Request $request)
    {

        $validate = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'body' => 'required',
            ]
        );
        $json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Thao tác thất bại!";
            return Response::json($json);
        }

        DB::beginTransaction();
        try {
            $object = ThisModel::findOrFail(1);
            $object->title = $request->title;
            $object->body = $request->body;

            $object->save();

            DB::commit();
            $json->success = true;
            $json->message = "Thao tác thành công!";
            $json->data = $object;
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

}
