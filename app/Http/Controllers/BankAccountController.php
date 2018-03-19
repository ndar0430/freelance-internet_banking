<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\BankAccount;
use App\User;
use App\SendMoney;


class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function checkBalance()
    {

        $getcurrentUser = Auth::user()->id;

        $check_account_number = BankAccount::where('user_id', $getcurrentUser)->first()->account_number;

        if(isset($check_account_number)){
            $back_account_table = BankAccount::where('user_id', $getcurrentUser)->get();
            return view('users.check_balance.index', compact('back_account_table'));
        }
        else{
            $success = "No Account Number Yet";
            return redirect()->route('bank.checkbalance')->with($success);
        }


       
    }

    public function viewSendMoney(){

        return view('users.send_money.create');

    }

    public function sendMoney(Request $request)
    {

        $this->validate($request, [
            'To_account_number  ' => 'string|min:6',
            'amount'   => 'required|numeric',

            ]);


        $getcurrentUser = Auth::user()->id;

        $check_account_number = BankAccount::where('user_id', $getcurrentUser)->first()->account_number;
        $get_balance = BankAccount::where('account_number', $check_account_number)->first()->balance;

        if($get_balance == 0){
            $success = array('ok'=> 'NO BALANCE!!!');
            return redirect()->route('bank.checkbalance')->with($success);
        }
        else{
            $send_money = new SendMoney;
            if($request->has('To_account_number')){

            
            $check_if_account_exist = BankAccount::where('account_number', $request['To_account_number'])->first();
            $check_if_mine = BankAccount::where('account_number', $request['To_account_number'])->first()->account_number;

            if($check_if_mine == $check_account_number){
                $success = array('ok'=> 'YOU CANNOT SEND TO YOUR OWN ACCOUNT!');
                return redirect()->route('bank.checkbalance')->with($success);
            }

            if($check_if_account_exist === null){
                $success = array('ok'=> 'ACCOUNT NUMBER DOESNT EXIST!');
                return redirect()->route('bank.checkbalance')->with($success);
            }
            else{
                $send_money->To_account_number = $request['To_account_number'];
            }
        
            }
            $send_money->From_account_number = $check_account_number;
            if($request->has('amount')){
                if($request['amount'] > $get_balance){
                    $success = array('ok'=> 'INSUFFICIENT BALANCE!!');
                    return redirect()->route('bank.checkbalance')->with($success);
                }
                else{
                    //add to account number amount
                    $sent = $request->get('To_account_number');
                    $add_account_number = BankAccount::where('account_number', $sent)->first()->balance;
                    $add_amount = $request->get('amount');

                    $add_final_balance = $add_account_number + $add_amount;
                    
                    


                    //deduct sender amount
                    $send_money->amount = $request['amount'];
                    $minus_balance = $request->get('amount');
                    $final_balance = $get_balance - $minus_balance;


                    $update_balance = DB::table('bank_account')
                    ->where('account_number', '=', $check_account_number)
                    ->update([
                        'balance' => $final_balance,
                    ]);

                    $add_balance = DB::table('bank_account')
                    ->where('account_number', '=', $sent)
                    ->update([
                        'balance' => $add_final_balance,
                    ]);
                }
            }
            $send_money->save();
            $success = array('ok'=> 'Success');
            return redirect()->route('bank.checkbalance')->with($success);


        }


       
    }

    public function index()
    {

        $bank_account_table = BankAccount::with('user')->paginate(10);

        $users = User::with('userdetails')->get();


        return view('admin.users.registered_users.bank_account.index', compact('users', 'bank_account_table'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $users = User::find($id);
        return view('admin.users.registered_users.bank_account.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $this->validate($request, [
            'user_id' => 'required|unique:bank_account',
            'account_number' => 'required|unique:bank_account|string|min:6'
        ]);

        $users = User::find($id);

        $bank_account = new BankAccount;
        $bank_account->user_id = $request['user_id'];
        $bank_account->account_number = $request['account_number'];
        $bank_account->balance = 0;
        $bank_account->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('users.list')->with($success);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank_account = BankAccount::find($id);
        return view('admin.users.registered_users.bank_account.edit', compact('bank_account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $bank_account = BankAccount::find($id);

        $add_balance = $request['balance'];
        $bank_account->balance = $bank_account->balance + $add_balance;
        $bank_account->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('bank.index')->with($success);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
