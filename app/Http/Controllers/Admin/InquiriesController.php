<?php

namespace App\Http\Controllers\Admin;

use App\Inquiry;
use App\Customer;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInquiriesRequest;
use App\Http\Requests\Admin\UpdateInquiriesRequest;

class InquiriesController extends Controller
{
    /**
     * Display a listing of Inquiry.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('inquiry_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (!Gate::allows('inquiry_delete')) {
                return abort(401);
            }
            $inquiries = Inquiry::onlyTrashed()->get();
        } else {
            $inquiries = Inquiry::all();
        }

        return view('admin.inquiries.index', compact('inquiries'));
    }

    /**
     * Show the form for creating new Inquiry.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('inquiry_create')) {
            return abort(401);
        }

        $customers = Customer::get()->pluck('full_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $rooms = Room::get()->pluck('room_number', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.inquiries.create', compact('customers', 'rooms'));
    }

    /**
     * Store a newly created Inquiry in storage.
     *
     * @param  \App\Http\Requests\StoreInquiriesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInquiriesRequest $request)
    {
        if (!Gate::allows('inquiry_create')) {
            return abort(401);
        }
        $inquiry = Inquiry::create($request->all());

        return redirect()->route('admin.inquiries.index');
    }


    /**
     * Show the form for editing Inquiry.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('inquiry_edit')) {
            return abort(401);
        }

        $customers = Customer::get()->pluck('first_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $rooms = Room::get()->pluck('room_number', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $inquiry = Inquiry::findOrFail($id);

        return view('admin.inquiries.edit', compact('inquiry', 'customers', 'rooms'));
    }

    /**
     * Update Inquiry in storage.
     *
     * @param  \App\Http\Requests\UpdateInquiriesRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInquiriesRequest $request, $id)
    {
        if (!Gate::allows('inquiry_edit')) {
            return abort(401);
        }
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->update($request->all());


        return redirect()->route('admin.inquiries.index');
    }


    /**
     * Display Inquiry.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('inquiry_view')) {
            return abort(401);
        }
        $inquiry = Inquiry::findOrFail($id);

        return view('admin.inquiries.show', compact('inquiry'));
    }


    /**
     * Remove Inquiry from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('inquiry_delete')) {
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
        if (!Gate::allows('inquiry_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Inquiry::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Inquiry from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('inquiry_delete')) {
            return abort(401);
        }
        $inquiry = Inquiry::onlyTrashed()->findOrFail($id);
        $inquiry->restore();

        return redirect()->route('admin.inquiries.index');
    }

    /**
     * Permanently delete Inquiry from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('inquiry_delete')) {
            return abort(401);
        }
        $inquiry = Inquiry::onlyTrashed()->findOrFail($id);
        $inquiry->forceDelete();

        return redirect()->route('admin.inquiries.index');
    }
}
