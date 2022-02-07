<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function __construct() {
        $this->model = Customer::class;
        $this->prefix = 'pages.customers';
        $this->pageName = 'Customer Data';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = DB::table('customers')->orderBy('created_at', 'desc')->get();
        // $data = $this->model::orderBy('created_at', 'desc')->get();
        // dd($data);
        $data['page_title'] = $this->pageName;
        if($request->ajax()){
            return $this->datatables();
        }
        return view($this->prefix.'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Input '.$this->pageName;
        $data['data'] = $this->model;

        return view($this->prefix.'.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'first_name' => 'required|alpha',
        //     'middle_name' => 'required|alpha',
        //     'last_name' => 'required|alpha',
        //     'email' => 'required|email:rfc,dns',
        //     'address' => 'required',
        //     'phone' => 'required|numeric'
        // ]);
        // $data = new $this->model;
        // $data->first_name = $request->input('first_name');
        // $data->last_name = $request->input('last_name');
        // $data->middle_name = $request->input('middle_name');
        // $data->address = $request->input('address');
        // $data->email = $request->input('email');
        // $data->phone = $request->input('phone');
        
        // Customer::create($data);
        // $data->save();
        // dd($data);

        // session()->flash('success', __("Success to create data!"));
        // return redirect()->route('customer-index');
        // try {
        // } catch (\Throwable $th) {
        //     session()->flash('failed', $th);
        //     return redirect()->route('customer-index');
        // }
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
        $data['page_title'] = 'Edit '. $this->pageName;
        $data['data'] = $id;

        return view($this->prefix.'.edit', $data);
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
        try {
            $this->model::where('id', $id)->delete();

            // return redirect()->route('customer-index')->with('success', 'deleted success');
            $model = new Customer();
            return redirect()->route('customer-index')->with('success', 'deleted success');
        } catch (\Throwable $th) {
            $message = __("Failed to deleted data!");

            return redirect()->back()->with('failed', $message);
        }
    }

    public function datatables()
    {
        $data = $this->model::orderBy('created_at', 'desc')->get();
        // $data = DB::table('customers')->orderBy('created_at', 'desc')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $button = '';
                $button .= '<div class="inline-flex">
                <button type="button" onClick="editData('.$row->id.')" class="items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mr-4"><i class="fas fa-edit"></i></button>
                <button type="button" onClick="deleteData('.$row->id.')" class="items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition custom-delete ml-4" title="Delete Data"><i class="fas fa-trash"></i></button></div>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
