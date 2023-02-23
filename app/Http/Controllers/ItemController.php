<?php

namespace App\Http\Controllers;

use App\Models\Itm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get data from table items
        $items = Itm::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Item',
            'data' => $items,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'internalId' => 'required',
            'itemid' => 'required',
            'displayname' => 'required',
        ]);

        //response error validation
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $item = Itm::create([
            'internalId' => $request->internalId,
            'itemid' => $request->itemid,
            'displayname' => $request->displayname
        ]);

        //success save to database
        if($item) {
            return response()->json([
                'success' => true,
                'message' => 'Item Created',
                'data' => $item
            ], 200);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Item failed to save',
        ], 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find post by ID
        $item = Itm::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Item',
            'data' => $item
        ], 200);
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
    public function update(Request $request, Itm $item)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'internalId' => 'required',
            'itemid' => 'required',
            'displayname' => 'required',
        ]);

        //response error validation
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find item by ID
        $item = Itm::findorFail($item->id);

        if($item) {
            //update item
            $item->update([
                'internalId' => $request->internalId,
                'itemid' => $request->itemid,
                'displayname' => $request->displayname,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Item created',
                'data' => $item
            ], 200);
        }

        //item post not found
        return response()->json([
            'success' => false,
            'message' => 'Item Not Found'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find post by ID
        $item = Itm::findorFail($id);

        if($item) {
            //delete item
            $item->delete();

            return response()->json([
                'success' => true,
                'message' => 'Item Deleted',
            ], 200);
        }

        //data item not found
        return response()->json([
            'success' => false,
            'message' => 'Item Not Found'
        ], 400);
    }
}
