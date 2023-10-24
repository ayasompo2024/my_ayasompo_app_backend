<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\FAQRepository;
use Illuminate\Http\Request;

class FAQController extends Controller
{


    public function new($product_id)
    {
        return view("admin.faq.create", compact('product_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "nullable",
            "desc" => "required",
            "product_id" => "required|integer|min:1",
        ]);
        $input = $request->only("title", "desc", "product_id");
        $status = FAQRepository::store($input);
        return $status ? redirect()->back()->with('success', 'Success') : redirect()->back()->with('fail', 'fail');
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