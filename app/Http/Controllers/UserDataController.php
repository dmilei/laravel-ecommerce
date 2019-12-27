<?php

namespace App\Http\Controllers;

use App\Order;
use App\UserData;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserDataRequest;

class UserDataController extends Controller
{
    public function index()
    {
      if(!auth()->user()->userdata){
        session()->flash('error', 'You need to fill your contact info to see your account page!');
        return redirect()->route('userdata.create');
      }
      return view('userdata.index');
    }

    public function create()
    {
      if(auth()->user()->userdata){
        session()->flash('error', 'You already filled contact data, you can update it at your account page!');
        return redirect()->route('home');
      }else{
        return view('userdata.create');
      }
    }

    public function store(CreateUserDataRequest $request)
    {
      $user_data = new UserData;

      $user_data->create([
        'user_id' => auth()->user()->id,
        'name' => $request->name,
        'phone' => $request->phone,
        'country' => $request->country,
        'city' => $request->city,
        'zip' => $request->zip,
        'address' => $request->address
      ]);

      session()->flash('success', 'Contact info added successfully!');
      return redirect()->route('userdata.index');
    }

    public function edit()
    {
      if(!auth()->user()->userdata){
        session()->flash('error', 'You need to fill your contact info to see your account page!');
        return redirect()->route('userdata.create');
      }
      return view('userdata.edit');
    }

    public function update(CreateUserDataRequest $request, $id)
    {
      $user_data = UserData::where('id', $id)->first();
      $data = $request->all();

      $user_data->update($data);

      session()->flash('success', 'Contact info updated successfully!');
      return redirect()->route('userdata.index');
    }
}
