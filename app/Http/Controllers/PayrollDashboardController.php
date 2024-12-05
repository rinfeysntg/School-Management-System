<?php

namespace App\Http\Controllers;


use App\Models\Payroll;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\select;

class PayrollDashboardController extends Controller
{
    //
    
    public function index()
    {
        $data = Payroll::orderBy('payrolls.id', 'ASC')
                ->join('users', 'users.id', '=', 'payrolls.user_id')
                ->join('roles', 'roles.id', '=', 'users.role_id')
                ->join('positions', 'positions.role_id', '=', 'roles.id')
                ->join('departments', 'departments.id', '=', 'roles.department_id')
                ->join('attendance', 'attendance.user_id', '=', 'payrolls.user_id')
                ->select(
                    'users.id as user_id',
                    'users.address as address',
                    'users.age as age',
                    'users.name as user_name',
                    'users.username as user_username',
                    'users.email as email',
                    'roles.name as role',
                    'departments.name as department',
                    'payrolls.date_end',
                    'positions.name as position',
                    'payrolls.date_start as date_start',
                    'payrolls.date_end as date_end',
                    'positions.rate as rate',
                    'payrolls.amount as amount',
                    'payrolls.deductions as deductions',
                    'payrolls.id as payroll_id',
                    DB::raw('COUNT(attendance.id) as attendances')
                )
                ->groupBy(
                    'payrolls.user_id', 
                    'users.id',
                    'users.address',
                    'users.age',
                    'users.name',
                    'users.username',
                    'users.email',
                    'roles.name',
                    'departments.name',
                    'payrolls.date_end',
                    'positions.name',
                    'payrolls.date_start',
                    'payrolls.date_end',
                    'positions.rate',
                    'payrolls.amount',
                    'payrolls.deductions',
                    'payrolls.id'
                )
                ->get();

        Log::info($data);
        return view('payroll.payroll_dashboard')->with('data', $data);
    }

    public function create()
    {
        return view('payroll.payroll_create');
    }

    public function store(Request $request)
    {

        // Validate the request
        $validated = $request->validate([
            'user_id_create' => 'required|integer|unique:payrolls,user_id',
        ]);

        Payroll::create([
            'user_id' => $request->get('user_id_create'),
            'date_start' => $request->get('date_start_create'),
            'date_end' => $request->get('date_end_create'),
            'deductions' => $request->get('deductions_create'),
            'amount' => $request->get('salary_create')
        ]);
        return redirect()->route('payrollDashboard');
    }

    public function edit(Request $request, $id)
    {
        $data = DB::table('payrolls')
                ->join('users', 'users.id', '=', 'payrolls.user_id')
                ->join('roles', 'roles.id', '=', 'users.role_id')
                ->join('positions', 'positions.role_id', '=', 'roles.id')
                ->join('departments', 'departments.id', '=', 'roles.department_id')
                ->join('attendance', 'attendance.user_id', '=', 'payrolls.user_id')
                ->where('payrolls.id', $id)
                ->select(
                    'users.id as user_id',
                    'users.address as address',
                    'users.age as age',
                    'users.name as user_name',
                    'users.username as user_username',
                    'users.email as email',
                    'roles.name as role',
                    'departments.name as department',
                    'payrolls.date_end',
                    'positions.name as position',
                    'payrolls.date_start as date_start',
                    'payrolls.date_end as date_end',
                    'positions.rate as rate',
                    'payrolls.amount as amount',
                    'payrolls.deductions as deductions',
                    'payrolls.id as payroll_id',
                    DB::raw('COUNT(attendance.id) as attendances')
                )
                ->groupBy(
                    'payrolls.user_id',
                    'users.id',
                    'users.address',
                    'users.age',
                    'users.name',
                    'users.username',
                    'users.email',
                    'roles.name',
                    'departments.name',
                    'payrolls.date_end',
                    'positions.name',
                    'payrolls.date_start',
                    'payrolls.date_end',
                    'positions.rate',
                    'payrolls.amount',
                    'payrolls.deductions',
                    'payrolls.id'
                )
                ->get();

                

        return view('payroll.payroll_edit', compact('data'));
    }

    public function update(Request $request)
    {

        Payroll::where('id', $request->get('payroll_id_update'))->update([
            'user_id' => $request->get('user_id_update'),
            'date_start' => $request->get('date_start_update'),
            'date_end' => $request->get('date_end_update'),
            'deductions' => $request->get('deductions_update'),
            'amount' => $request->get('salary_update')
        ]);

        return redirect()->route('payrollDashboard');

    }

    public function destroy($id)
    {
        $payroll = Payroll::find($id);
        $payroll->delete();
        return redirect()->route('payrollDashboard');
    }
    public function pay(Request $request, $id)
    {

        $data = DB::table('payrolls')
                ->join('users', 'users.id', '=', 'payrolls.user_id')
                ->join('roles', 'roles.id', '=', 'users.role_id')
                ->join('positions', 'positions.role_id', '=', 'roles.id')
                ->join('departments', 'departments.id', '=', 'roles.department_id')
                ->join('attendance', 'attendance.user_id', '=', 'payrolls.user_id')
                ->where('payrolls.id', $id)
                ->select(
                    'users.id as user_id',
                    'users.address as address',
                    'users.age as age',
                    'users.name as user_name',
                    'users.username as user_username',
                    'users.email as email',
                    'roles.name as role',
                    'departments.name as department',
                    'payrolls.date_end',
                    'positions.name as position',
                    'payrolls.date_start as date_start',
                    'payrolls.date_end as date_end',
                    'positions.rate as rate',
                    'payrolls.amount as amount',
                    'payrolls.deductions as deductions',
                    'payrolls.id as payroll_id',
                    DB::raw('COUNT(attendance.id) as attendances')
                )
                ->groupBy(
                    'payrolls.user_id', 
                    'users.id',
                    'users.address',
                    'users.age',
                    'users.name',
                    'users.username',
                    'users.email',
                    'roles.name',
                    'departments.name',
                    'payrolls.date_end',
                    'positions.name',
                    'payrolls.date_start',
                    'payrolls.date_end',
                    'positions.rate',
                    'payrolls.amount',
                    'payrolls.deductions',
                    'payrolls.id'
                )
                ->get();

                return view('payroll.payroll_release', compact('data'));
    }

    public function release(Request $request)
    {

        Payment::create([
            'purpose' => $request->get('purpose_release'),
            'amount' => $request->get('salary_release'),
            'receipt' => $request->get('receipt_release'),
            'user_id' => $request->get('user_id_release'),
        ])->save();

        Payroll::where('user_id', $request->get('user_id_release'))
        ->delete();
        return redirect()->route('payrollDashboard');
    }
}
