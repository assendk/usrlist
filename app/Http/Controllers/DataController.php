<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Data;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datatbl');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

//    public function listData(){
////        $data = Data::all()->paginate(5);
//        $data = Data::paginate(5);
//        return view ( 'data', compact('data') );
//    }

    public function displayData()
    {
        $users = Data::sortable()->paginate(10);
        return view('users',compact('users'));
    }

    public function search()
    {
        $q = Input::get('q');
        if ($q != ''){
            $users = Data::where('name', 'LIKE', '%'. $q .'%')
                ->orWhere('email', 'LIKE', '%'. $q .'%')
                ->paginate(5)
                ->setpath('');
            $users->appends([
               'q' =>  Input::get('q')
            ]);
            if(count($users) > 0){
                return view('users',compact('users'));
            }
            $msg = ['error' => 'No result!',
                ];

            return redirect()->route('users')->with($msg);
        }
        $msg = ['error' => 'Emptry Request!',
        ];
        return redirect()->route('users')->with($msg);

    }
}
