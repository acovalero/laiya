<?php

namespace App\Http\Controllers\Admin;

use App\Quotation;
use App\Customer;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreQuotationsRequest;
use App\Http\Requests\Admin\UpdateQuotationsRequest;

class QuotationsController extends Controller
{
    /**
     * Display a listing of Quotation.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('quotation_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (!Gate::allows('quotation_delete')) {
                return abort(401);
            }
            $quotations = Quotation::onlyTrashed()->get();
        } else {
            $quotations = Quotation::all();
        }

        return view('admin.quotations.index', compact('quotations'));
    }

    /**
     * Show the form for creating new Quotation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('quotation_create')) {
            return abort(401);
        }

        $customers = Customer::get()->pluck('full_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $rooms = Room::get()->pluck('room_number', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.quotations.create', compact('customers', 'rooms'));
    }

    /**
     * Store a newly created Quotation in storage.
     *
     * @param  \App\Http\Requests\StoreQuotationsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuotationsRequest $request)
    {
        if (!Gate::allows('quotation_create')) {
            return abort(401);
        }
        $quotation = Quotation::create($request->all());

        return redirect()->route('admin.quotations.index');
    }


    /**
     * Show the form for editing Quotation.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('quotation_edit')) {
            return abort(401);
        }

        $customers = Customer::get()->pluck('first_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $rooms = Room::get()->pluck('room_number', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $quotation = Quotation::findOrFail($id);

        return view('admin.quotations.edit', compact('quotation', 'customers', 'rooms'));
    }

    /**
     * Update Quotation in storage.
     *
     * @param  \App\Http\Requests\UpdateQuotationsRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuotationsRequest $request, $id)
    {
        if (!Gate::allows('quotation_edit')) {
            return abort(401);
        }
        $quotation = Quotation::findOrFail($id);
        $quotation->update($request->all());


        return redirect()->route('admin.quotations.index');
    }


    /**
     * Display Quotation.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('quotation_view')) {
            return abort(401);
        }
        $quotation = Quotation::findOrFail($id);

        return view('admin.quotations.show', compact('quotation'));
    }


    /**
     * Remove Quotation from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('quotation_delete')) {
            return abort(401);
        }
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();

        return redirect()->route('admin.quotations.index');
    }

    /**
     * Delete all selected Quotation at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('quotation_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Quotation::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Quotation from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('quotation_delete')) {
            return abort(401);
        }
        $quotation = Quotation::onlyTrashed()->findOrFail($id);
        $quotation->restore();

        return redirect()->route('admin.quotations.index');
    }

    /**
     * Permanently delete Quotation from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('quotation_delete')) {
            return abort(401);
        }
        $quotation = Quotation::onlyTrashed()->findOrFail($id);
        $quotation->forceDelete();

        return redirect()->route('admin.quotations.index');
    }
}
