<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;
use \stdClass;
use Response;
use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use DB;
use Auth;
use App\Model\Admin\Config;
use App\Model\Admin\Product;
use App\Model\Admin\Post;
use App\Model\Common\User;

use Spatie\Analytics\Period;
use Analytics;
use App\Libraries\GoogleAnalytics;
use App\Model\Admin\OrderDetail;
use App\Model\Admin\Order;

class DashboardController extends Controller
{
	protected $view = 'admin.dashboard';

	public function index()
	{
		$data = [];
		$g7_ids = [];
		$data['orders'] = Order::whereDate('created_at',Carbon::now())->count();
		$data['total_price'] = Order::whereDate('created_at',Carbon::today())
								->sum('total_after_discount');

		$sales = $this->getOrderByDay();

        $weekly = Order::select(
            DB::raw("DATE(created_at) as period"),
            DB::raw("COUNT(*) as order_count"),
            DB::raw("SUM(total_after_discount) as revenue")
        )
            ->where('created_at', '>=', Carbon::now()->subDays(6)->startOfDay())
            ->groupBy('period')
            ->orderBy('period')
            ->get();

        $monthly = Order::select(
            DB::raw("DATE(created_at) as period"),
            DB::raw("COUNT(*) as order_count"),
            DB::raw("SUM(total_after_discount) as revenue")
        )
            ->where('created_at', '>=', Carbon::now()->subDays(29)->startOfDay())
            ->groupBy('period')
            ->orderBy('period')
            ->get();

        $totalOrdersWeek    = $weekly->sum('order_count');
        $totalRevenueWeek   = $weekly->sum('revenue');
        $avgOrdersPerDayWeek  = $weekly->avg('order_count');
        $avgRevenuePerDayWeek = $weekly->avg('revenue');

        $totalOrdersMonth   = $monthly->sum('order_count');
        $totalRevenueMonth  = $monthly->sum('revenue');
        $avgOrdersPerDayMonth  = $monthly->avg('order_count');
        $avgRevenuePerDayMonth = $monthly->avg('revenue');

		return view($this->view.'.dash', compact('data','sales', 'weekly'
            , 'monthly', 'totalOrdersWeek','totalRevenueWeek','avgOrdersPerDayWeek','avgRevenuePerDayWeek',
            'totalOrdersMonth','totalRevenueMonth','avgOrdersPerDayMonth','avgRevenuePerDayMonth'));
	}

	public function getOrderByDay()
		{
			$select = [
				DB::raw("SUM(total_after_discount) as total_price"),
				DB::raw("DATE(created_at) as day"),
			];
			$result = Order::select($select)->whereDate('created_at', '>',
					Carbon::now()->subDays(10))->groupBy([DB::raw('DATE(created_at)')])->get();

			return $result;
		}
}
