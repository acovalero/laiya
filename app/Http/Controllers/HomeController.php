<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Inquiry;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInquiriesRequest;
use App\Http\Requests\Admin\UpdateInquiriesRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('inquiry_access')) {
            return abort(401);
        }


        $inquiries = Inquiry::all();
        $customers = Customer::all();

        return view('home', compact('inquiries', 'customers'));

        // return view('home');
    }

    
    /**
     * Show the form for creating new Inquiry.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('inquiry_create')) {
            return abort(401);
        }
        return view('admin.inquiries.create');
    }

    /**
     * Store a newly created Inquiry in storage.
     *
     * @param  \App\Http\Requests\StoreinquiriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreinquiriesRequest $request)
    {
        if (! Gate::allows('inquiry_create')) {
            return abort(401);
        }
        $inquiry = Inquiry::create($request->all());



        return redirect()->route('admin.inquiries.index');
    }


    /**
     * Show the form for editing Inquiry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('inquiry_edit')) {
            return abort(401);
        }
        $inquiry = Inquiry::findOrFail($id);

        return view('admin.inquiries.edit', compact('inquiry'));
    }

    /**
     * Update Inquiry in storage.
     *
     * @param  \App\Http\Requests\UpdateinquiriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateinquiriesRequest $request, $id)
    {
        if (! Gate::allows('inquiry_edit')) {
            return abort(401);
        }
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->update($request->all());



        return redirect()->route('admin.inquiries.index');
    }


    /**
     * Display Inquiry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('inquiry_view')) {
            return abort(401);
        }
        $users = \App\User::where('inquiry_id', $id)->get();

        $inquiry = Inquiry::findOrFail($id);

        return view('admin.inquiries.show', compact('inquiry', 'users'));
    }


    /**
     * Remove Inquiry from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('inquiry_delete')) {
            return abort(401);
        }
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index');
    }

    /**
     * Delete all selected Inquiry at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('inquiry_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Inquiry::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
