<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Listing;
use App\User;
use Session;
use Auth;
class ListingsController extends Controller
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
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user=User::find($id);
        return view('createlisting')->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        //$user_id=$request->input('user');
        //$listing_id=$request->input('listing');
        //$user=User::find($user_id);
        //$listing=Listing::find($listing_id);
        $this->validate($request,[
            'FullName'=>'required',
            'Email'=>'required|unique:listings',
            'Job'=>'required',
            'Job_ID'=>'required|unique:listings',
            'Phone'=>'required',
            'X_Lite_Number'=>'required|unique:listings',
            'Department'=>'required',
            'Manager'=>'required'
        ]);
        //Add new Employee by the Admin
        $user=User::findOrfail($request->input('user_id'));
        if(Auth::user()->id==$user->id)
        {
            $listing=new Listing;
            $listing->FullName=$request->input('FullName');
            $listing->Email=$request->input('Email');
            $listing->Job=$request->input('Job');
            $listing->Job_ID=$request->input('Job_ID');
            $listing->Phone=$request->input('Phone');
            $listing->X_Lite_Number=$request->input('X_Lite_Number');
            $listing->Department=$request->input('Department');
            $listing->Manager=$request->input('Manager');
            $listing->save();
            $user->listings()->attach($listing->id);
            return redirect()->back()->with('success', 'Employee Added Successfully');
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
        $users = User::findOrfail($id);
        return view('dashboard')->with('users',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id,$listing_id)
    {
        $users=User::findOrfail($user_id);
        $listing=Listing::findOrfail($listing_id);
        return view('editlistings',compact('users','listing'));
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
        $listing=Listing::find($id);
        $listing->FullName=$request->input('FullName');
        $listing->Email=$request->input('Email');
        $listing->Job=$request->input('Job');
        $listing->Job_ID=$request->input('Job_ID');
        $listing->Phone=$request->input('Phone');
        $listing->X_Lite_Number=$request->input('X_Lite_Number');
        $listing->Department=$request->input('Department');
        $listing->Manager=$request->input('Manager');
        $listing->save();
        return redirect()->back()->with('success', 'Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing=Listing::find($id);
        $listing->delete();
        return redirect()->back()->with('success', 'Employee Deleted Successfully');
    }
}
