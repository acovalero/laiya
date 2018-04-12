<?php

namespace App\Http\Controllers\Admin;

use App\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFeesRequest;
use App\Http\Requests\Admin\UpdateFeesRequest;

class FeesController extends Controller
{
    /**
     * Display a listing of Fee.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('fee_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('fee_delete')) {
                return abort(401);
            }
            $fees = Fee::onlyTrashed()->get();
        } else {
            $fees = Fee::all();
        }

        return view('admin.fees.index', compact('fees'));
    }

    /**
     * Show the form for creating new Fee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('fee_create')) {
            return abort(401);
        }

        // $fee_types = \App\Fee_type::get()->pluck('fee_type', 'id','price')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.fees.create', compact('fee_types'));
    }

    /**
     * Store a newly created Fee in storage.
     *
     * @param  \App\Http\Requests\StoreFeesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeesRequest $request)
    {
        if (! Gate::allows('fee_create')) {
            return abort(401);
        }
        $fee = Fee::create($request->all());


        return redirect()->route('admin.fees.index');
    }


    /**
     * Show the form for editing Fee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('fee_edit')) {
            return abort(401);
        }

        // $fee_types = \App\Fee_type::get()->pluck('fee_type', 'id','price')->prepend(trans('quickadmin.qa_please_select'), '');

        $fee = Fee::findOrFail($id);

        return view('admin.fees.edit', compact('fee'));
    }

    /**
     * Update Fee in storage.
     *
     * @param  \App\Http\Requests\UpdateFeesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeesRequest $request, $id)
    {
        if (! Gate::allows('fee_edit')) {
            return abort(401);
        }
        $fee = Fee::findOrFail($id);
        $fee->update($request->all());



        return redirect()->route('admin.fees.index');
    }


    /**
     * Display Fee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('fee_view')) {
            return abort(401);
        }
        // $inquiries = \App\Inquiry::where('fees_id', $id)->get();

        $fee = Fee::findOrFail($id);

        return view('admin.fees.show', compact('fee'));
    }


    /**
     * Remove Fee from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('fee_delete')) {
            return abort(401);
        }
        $fee = Fee::findOrFail($id);
        $fee->delete();

        return redirect()->route('admin.fees.index');
    }

    /**
     * Delete all selected Fee at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('fee_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Fee::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Fee from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('fee_delete')) {
            return abort(401);
        }
        $fee = Fee::onlyTrashed()->findOrFail($id);
        $fee->restore();

        return redirect()->route('admin.fees.index');
    }

    /**
     * Permanently delete Fee from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('fee_delete')) {
            return abort(401);
        }
        $fee = Fee::onlyTrashed()->findOrFail($id);
        $fee->forceDelete();

        return redirect()->route('admin.fees.index');
    }
}
