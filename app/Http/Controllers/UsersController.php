<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Former;
use Validator;
use App\UserHobby;
use App\Hobby;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::orderBy('id','asc')->get();
        return view('index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('id','asc')->pluck('name','id');
        return view('add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules=[
        'name' => 'required',
        'middle_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users,email',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',
        'dob' => 'required'
      ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) { 
        Former::withErrors($validator);
        return redirect()->back()->withErrors($validator)->withInput();
      }

      $user = New User;
      $user->name = $request->get('name');
      $user->middle_name=$request->get('middle_name');
      $user->last_name=$request->get('last_name');
      $user->email=$request->get('email');
      $user->city=$request->get('city');
      $user->state=$request->get('state');
      $user->country=$request->get('country');
      $user->dob=$request->get('dob');
      $user->save();
      foreach ($request->get('user_hobbies') as $key => $value) {
        $hobby = new UserHobby;
        $hobby->user_id = $user->id;
        $hobby->hobby_name = $value ;
        $hobby->save();
      }
      return redirect()->route('home.index')->withSuccess("Insert record successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
    $hobby = Hobby::orderBy('name','asc')->pluck('name','id');
    $user = User::find($id);
    $user_hobby = UserHobby::where('user_id' ,'=',$user->id)->pluck('hobby_name')->toArray();
    Former::populate($user);

    return view('edit', compact('hobby','user','user_hobby'));
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
         $rules=[
        'name' => 'required',
        'middle_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users,email',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',
        'dob' => 'required'
      ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) { 
        Former::withErrors($validator);
        return redirect()->back()->withErrors($validator)->withInput();
      }

      $user = User::find($id);
      $user->name = $request->get('name');
      $user->middle_name=$request->get('middle_name');
      $user->last_name=$request->get('last_name');
      $user->email=$request->get('email');
      $user->city=$request->get('city');
      $user->state=$request->get('state');
      $user->country=$request->get('country');
      $user->dob=$request->get('dob');
      $user->save();
      foreach ($request->get('user_hobbies') as $key => $value) {
        $hobby = new UserHobby;
        $hobby->user_id = $user->id;
        $hobby->hobby_name = $value ;
        $hobby->save();
      }
      return redirect()->route('home.index')->withSuccess("Insert record successfully.");
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
