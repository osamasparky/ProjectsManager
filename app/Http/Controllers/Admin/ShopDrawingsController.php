<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_drawing;
use App\Src\Filter;

class ShopDrawingsController extends Controller
{
    private $_path = "/documents/projects/shops/";
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $filter = new Filter($request, 'shopDrawings');
            return view('Admin.Layouts.AjaxResponse.projectShopDrawings',['shopDrawings'=>$filter->results()]);
        }
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
        $this->validate($request, [
            'project_id' => 'required|integer',
            'sort' => 'required',
            'description' => 'required',
            'document' => 'required|file'
        ]);
        $data = $request->all();
        try {
            $data['document'] = uploadFile(['file' => $data['document'], 'path' => $this->_path]);
            Shop_drawing::create($data);
        } catch (Exception $e) {
            return redirect()->route('projects.show', ['id' => $request->project_id])->with('fail', $e->getMessage());
        }
        return redirect()->route('projects.show', ['id' => $request->project_id])->with('success', 'Shop Drawing has been created');
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
}
