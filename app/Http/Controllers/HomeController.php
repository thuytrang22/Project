<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;
use App\Models\Bill;
use App\Models\Home;
use DateTime;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index () {
        $appetizer = DB::table('menus')->where('id_category', '=', 1)->get();
        $mainDishes = DB::table('menus')->where('id_category', '=', 2)->get();
        $dessert = DB::table('menus')->where('id_category', '=', 3)->get();
        $categorys = DB::table('categories')->get();
        return view ('pages.index', compact('categorys', 'appetizer', 'mainDishes', 'dessert'));
    }

    public function home ($table)
    {
        return view('homes.index',  [
            'table' => $table
        ]);
    }

    public function infor(HomeRequest $request)
    {
        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'table_number' => $request->input('table_number'),
        ];
        $record = Home::create($data);
        $table = $data["table_number"];
        return redirect()->route('order', ['table' => $table])->with('infor_id', $record->id);
    }

    public function order()
    {
        $dishs = DB::table('menus')->where('id_category', '=', 1)->get();
        $drinks = DB::table('menus')->where('id_category', '=', 2)->get();
        $allMores = DB::table('menus')->get();
        return view('homes.order', compact('dishs', 'drinks', 'allMores'));
    }

    public function getMenu (Request $request, $table, $option)
    {
        $menus = DB::table('menus')->where('option', '=', $option)->get();

        return response()->json($menus);
    }

    public function dashboards(Request $request)
    {
        $startDate = $this->_formatDate($request->query('startDate'));
        $endDate = $this->_formatDate($request->query('endDate'));
        $revenues = []; //Doanh thu
        $expenses = []; //Chi phí
        $interest = []; //Tiền lãi

        $bills = DB::table('bills')
            ->select(DB::raw('DATE(created_at) AS created_at, sum(total_order) as total'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->where('created_at', '>', $startDate)
            ->where('created_at', '<=', $endDate)
            ->whereNull('deleted_at')
            ->get();

        foreach ($bills as $bill) {
            $revenues[$bill->created_at] = $bill->total;
        }

        $maintenanceCosts = DB::table('maintenance_costs')
            ->select(DB::raw('DATE(created_at) AS created_at, sum(expense) as total'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->where('created_at', '>', $startDate)
            ->where('created_at', '<=', $endDate)
            ->whereNull('deleted_at')
            ->get();

        $ingredientCosts = DB::table('warehouses')
            ->select(DB::raw('DATE(created_at) AS created_at, sum(quantity * price) as total'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->where('created_at', '>', $startDate)
            ->where('created_at', '<=', $endDate)
            ->whereNull('deleted_at')
            ->get();

        foreach ($maintenanceCosts as $maintenanceCost) {
            $expenses[$maintenanceCost->created_at] = $maintenanceCost->total;
        }

        foreach ($ingredientCosts as $ingredientCost) {
            if (isset($expenses[$ingredientCost->created_at])) {
                $expenses[$ingredientCost->created_at] += $ingredientCost->total;
            } else {
                $expenses[$ingredientCost->created_at] = $ingredientCost->total;
            }
        }
        $startDate = new DateTime($startDate);
        $endDate = new DateTime($endDate);
        $rangeDate = $startDate->diff($endDate)->days;
        for ($i = 0; $i <= $rangeDate; $i++) {
            $date = $startDate->format('Y-m-d');
            $revenues[$date] = $revenues[$date] ?? 0;
            $expenses[$date] = $expenses[$date] ?? 0;
            $interest[$date] = $revenues[$date] - $expenses[$date];
            $startDate->modify('+1 day');
        }

        ksort($revenues);
        ksort($expenses);
        ksort($interest);

        $data = [
            'revenues' => $revenues,
            'expenses' => $expenses,
            'interest' => $interest,
        ];
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    /**
     * @param string $dateString
     * 
     * @return string
     */
    private function _formatDate(string $dateString): string
    {
        $date = DateTime::createFromFormat('d/m/Y', $dateString);
        return $date->format('Y-m-d');
    }
}
