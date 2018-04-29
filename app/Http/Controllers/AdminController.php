<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Shop;
use Table;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function users(Request $request)
    {
        $rows = User::sorted()->paginate();
        $table = Table::create($rows, ['username', 'name','email','role','bePoint']);
        $table->addColumn('created_at', 'Added', function($model) {
            return $model->created_at->diffForHumans();
        });
        $table->addColumn('id', 'Action', function($model) {
            return "<div class='btn-group' role='group' aria-label='Button group with nested dropdown'>
                      <a href='users/edit/$model->username'><button type='button' class='btn btn-primary'>Edit</button></a>
                      <a href='userslogs/$model->username'><button type='button' class='btn btn-info'>Logs</button></a>
                    </div>
                    ";
        });
        return view('admin.users', ['table' => $table]);
    }

    public function shops(Request $request)
    {
        $rows = Shop::sorted()->paginate();;
        $table = Table::create($rows, ['id','name','type','package','status']);
        $table->addColumn('created_at', 'Added', function($model) {
            return $model->created_at->diffForHumans();
        });
        // $table->addColumn('logo', '', function($model) {
        //     return "<img src='../img/shops/logo/$model->logo' width='30px'>";
        // });
        return view('admin.shops', ['table' => $table]);
    }

    public function usersLogs()
    {
        $log = DB::table('user_logs')->orderBy('id', 'desc')->paginate(15);
        return view('admin.userslogs', ['logs' => $log]);
    }

    public function bePoints()
    {
        $bepointlog = DB::table('bepoint_logs')->orderBy('id','desc')->paginate(15);
        return view('admin.bepoints', ['bepointlog' => $bepointlog]);
    }

    public function usersLogsName($name)
    {
        $log = DB::table('user_logs')->where('username',$name)->orWhere('assigned_to',$name)->orderBy('id', 'desc')->paginate(15);
        return view('admin.userslogs', ['logs' => $log,'name'=>$name]);
    }

    public function userEdit($id){
        $userEditInfo = DB::table('users')->where('username',$id)->first();
        return view('admin.edit', ['userEdit' => $userEditInfo]);
    }

    public function affiliates(Request $request)
    {
        $numberOfPaginate = 15;
        $sort = $request->input('sort', 'desc');
        if ($sort != "desc"){
            $affiliates = DB::table('affiliates')->orderBy($sort, 'desc')->paginate($numberOfPaginate);
        }
        else{
            $affiliates = DB::table('affiliates')->orderBy('id', 'desc')->paginate($numberOfPaginate);
        }
        return view('admin.affiliates', ['users' => $affiliates]);
    }

    public function rewards(Request $request)
    {
        $numberOfPaginate = 6;
        $rewards = DB::table('vouchers')->orderBy('status','desc')->paginate($numberOfPaginate);
        return view('admin.rewards', ['users' => $rewards]);
    }

    public function rewardsnew()
    {
        return view('admin.rewardsnew');
    }

    public function rewardsnewPost()
    {
        request()->validate([
            'name' => 'required',
            'desc' => 'required',
            'amount' => 'required',
            'bepoint' => 'required',
            'format' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        // Image
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('img/rewards'), $imageName);

        // Voucher add
        DB::table('vouchers')->insert(
            ['owner' => Auth::user()->username,
            'status' => 0,
            'name' => request()->name,
            'description' => request()->desc,
            'image' => $imageName,
            'amount' => request()->amount,
            'bePoint' => request()->bepoint,
            'reception' => request()->reception,
            'voucherFormat' => request()->format,
            'created_at' => Carbon::now(),
            'shop_id' => 5,
            'updated_at' => request()->end,
        ]);

        // Logs
        $log = new LogController;
        $log->record(Auth::user()->username,'Create new reward '.request()->name,'');

        $numberOfPaginate = 6;
        $rewards = DB::table('vouchers')->orderBy('status','desc')->paginate($numberOfPaginate);
        return view('admin.rewards', ['users' => $rewards,'success'=>'You have successfully created reward.']);
    }
    public function rewardsnewEdit($code){
        $code = DB::table('vouchers')->where('voucherFormat',$code)->first();
        return view('admin.rewardsedit',['code'=>$code]);
    }
    public function rewardsEdited(){
        $name = request()->name;
        $desc = request()->desc;
        $status = request()->status;
        $format = request()->format;
        $amount = request()->amount;
        $bepoint = request()->bepoint;
        $reception = request()->reception;
        $end = request()->end;
        $image = request()->image;
        DB::table('vouchers')
                    ->where('voucherFormat', $format)
                    ->update(['name' => $name,
                        'status' => $status,
                        'description' => $desc,
                        'amount' => $amount,
                        'bePoint' => $bepoint,
                        'reception' => $reception,
                        'updated_at' => $end]);

        if ($image != ""){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('img/rewards'), $imageName);
            DB::table('vouchers')
                    ->where('voucherFormat', $format)
                    ->update(['image' => $imageName]);
        }

        // Logs
        $log = new LogController;
        $log->record(Auth::user()->username,"Updated reward $name infomation.",'');

        return back()
            ->with('success','You have successfully update reward.');
    }
}
