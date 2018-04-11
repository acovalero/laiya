<?php

namespace App\Http\Controllers\Admin;

use App\Room_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoomsRequest;
use App\Http\Requests\Admin\UpdateRoomsRequest;

class RoomTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('room_type_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('room_type_delete')) {
                return abort(401);
            }
            $room_types = Room_type::onlyTrashed()->get();
        } else {
            $room_types = Room_type::all();
        }

        return view('admin.room_types.index', compact('room_types'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('room_type_create')) {
            return abort(401);
        }
        return view('admin.room_types.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('room_type_create')) {
            return abort(401);
        }
        $room_types = Room_type::create($request->all());



        return redirect()->route('admin.room_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('room_type_view')) {
            return abort(401);
        }
        $inquiries = \App\Inquiry::where('room_type_id', $id)->get();

        $room_types = Room_type::findOrFail($id);

        return view('admin.room_types.show', compact('room_types', 'iniquiries'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('room_type_edit')) {
            return abort(401);
        }
        $room_types = Room_type::findOrFail($id);

        return view('admin.room_types.edit', compact('room_types'));
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
        if (! Gate::allows('room_type_edit')) {
            return abort(401);
        }
        $room_types = Room_type::findOrFail($id);
        $room_types->update($request->all());



        return redirect()->route('admin.room_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('room_type_delete')) {
            return abort(401);
        }
        $room_types = Room_type::findOrFail($id);
        $room_types->delete();

        return redirect()->route('admin.room_types.index');    }

    public function massDestroy(Request $request)
    {
            if (! Gate::allows('room_type_delete')) {
                return abort(401);
            }
            if ($request->input('ids')) {
                $entries = Room_type::whereIn('id', $request->input('ids'))->get();
    
                foreach ($entries as $entry) {
                    $entry->delete();
                }
            }
    }


    public function restore($id)
    {
        if (! Gate::allows('room_type_delete')) {
            return abort(401);
        }
        $room_types = Room_type::onlyTrashed()->findOrFail($id);
        $room_types->restore();

        return redirect()->route('admin.room_types.index');
    }

    /**
     * Permanently delete Room from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('room_type_delete')) {
            return abort(401);
        }
        $room_types = Room_type::onlyTrashed()->findOrFail($id);
        $room_types->forceDelete();

        return redirect()->route('admin.room_types.index');
    }
}
