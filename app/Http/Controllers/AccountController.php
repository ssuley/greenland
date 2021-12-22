<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Account;
use App\User;
use DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    { 
        if(auth()->user()->hasrole('admin|General Manager'))
            {
                $accounts = DB::select('SELECT * from accounts INNER JOIN users ON accounts.user_id=users.id INNER JOIN model_has_roles ON model_has_roles.model_id=users.id INNER JOIN roles ON roles.id=model_has_roles.role_id');
                return view('account.index')->with('accounts',$accounts);
            }
            else{
                return abort('404');
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   if(auth()->user()->hasrole('admin|General Manager'))
        {
        $roles = DB::select("SELECT * from roles");
        return view('account.create')->with('roles',$roles);
        }
        else{
            return abort('404');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      if(auth()->user()->hasrole('admin|General Manager'))
        {
         $this->validate($request,[
            'first_name'    => 'required',
            'last_name'  => 'required',
            'gender'     => 'required',
            'email'      => 'required|unique:users',
            'role'       => 'required',
            'phone'      => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
            
        ]);
         $password=strtolower($request->input('last_name'));
        $users = new User();
        $users->email = $request->input('email');
        $users->name  = strtolower($request->input('first_name').' '.$request->input('last_name'));
        $users->name =ucwords($users->name );
        $users->password = Hash::make($password);
        $users->save();
        $users->assignRole($request->input('role'));
        $account = new Account();
        $account->first_name  = strtolower($request->input('first_name'));
        $account->first_name=ucwords($account->first_name);
        $account->last_name  = strtolower($request->input('last_name'));
        $account->last_name =ucwords($account->last_name);
        $account->staff_gender  = $request->input('gender');
        $account->phone  = $request->input('phone');
        $account->user_id = $users->id;
        $account->save();
        return redirect('account')->with('message', ' new user is recorded');
    }
    else{
        return abort('404');
    }
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
    {   if(auth()->user()->hasrole('admin|General Manager'))
        {
        $roles = DB::select("SELECT * from roles");
        $account = DB::select("SELECT * from accounts INNER JOIN users ON accounts.user_id=users.id WHERE accounts.account_id='$id'");
        return view('account.update')->with(['account'=>$account,'roles'=>$roles]);
    }
    else{
        return abort('404');
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   if(auth()->user()->hasrole('admin|General Manager'))
        {
       $this->validate($request,[
            'first_name'    => 'required',
            'last_name'  => 'required',
            'gender'     => 'required',
            'email'      => 'required',
            'role'       => 'required',
            'phone'      => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
            
        ]);
        $account =Account::find($id);
        $account->first_name  = strtolower($request->input('first_name'));
         $account->first_name=ucwords( $account->first_name);
        $account->last_name  = strtolower($request->input('last_name'));
         $account->last_name=ucwords( $account->last_name);

        $account->staff_gender  = $request->input('gender');
        $account->phone  = $request->input('phone');
        $account->save();
         $password=strtolower($request->input('last_name'));
          $users = User::find($account->user_id);
            if ($users->email != $request->input('email')) {
                $this->validate($request, [
                    'email'      => 'required|unique:users',
                ]);
            }
        $users->email = $request->input('email');
        $users->name  = strtolower($request->input('first_name').' '.$request->input('last_name'));
         $users->name=ucwords($users->name);
        $users->password = Hash::make($password);
        $users->save();
        $users->syncRoles($request->input('role'));

        
        return redirect('account')->with('message', ' new user is updated');
    }
    else{
        return abort('404');
    }
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
