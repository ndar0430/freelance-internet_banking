<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetails;
use App\User;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user_details_table = UserDetails::all();


        $user_details_id = UserDetails::pluck('id');

        $users = User::pluck('users_details_id');


        return view('admin.users.index', compact('users', 'user_details_id', 'user_details_table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_details_table = UserDetails::all();
        return view('sign_up', compact('user_details_table'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'nationality' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
        ]);

            
        $user_details = new UserDetails;
        $user_details->name = $request['name'];
        $user_details->surname = $request['surname'];
        $user_details->nationality = $request['nationality'];
        $user_details->sex = $request['sex'];
        $user_details->date_of_birth = $request['date_of_birth'];
        $user_details->address = $request['address'];
        $user_details->city = $request['city'];
        $user_details->state = $request['state'];
        $user_details->country = $request['country'];
        $user_details->phone_number = $request['phone_number'];
        $user_details->email = $request['email'];
        if ($request->has('zip'))
        {
        $user_details->zip = $request['zip'];
        
        }

        if ($request->has('middle_name')){
            $user_details->middle_name = $request['middle_name'];
        }
        $user_details->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('signup.create')->with($success);
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
        //
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
        //
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
