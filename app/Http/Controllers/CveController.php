<?php

namespace App\Http\Controllers;

use App\Http\Requests\CveStoreRequest;
use App\Http\Requests\CveUpdateRequest;
use App\Models\Cve;
use Illuminate\Http\Request;

class CveController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cves = Cve::all();

        return view('cve.index', compact('cves'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('cve.create');
    }

    /**
     * @param \App\Http\Requests\CveStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CveStoreRequest $request)
    {
        $cve = Cve::create($request->validated());

        $request->session()->flash('cve.id', $cve->id);

        return redirect()->route('cve.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cve $cve
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Cve $cve)
    {
        return view('cve.show', compact('cve'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cve $cve
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Cve $cve)
    {
        return view('cve.edit', compact('cve'));
    }

    /**
     * @param \App\Http\Requests\CveUpdateRequest $request
     * @param \App\Models\Cve $cve
     * @return \Illuminate\Http\Response
     */
    public function update(CveUpdateRequest $request, Cve $cve)
    {
        $cve->update($request->validated());

        $request->session()->flash('cve.id', $cve->id);

        return redirect()->route('cve.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cve $cve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cve $cve)
    {
        $cve->delete();

        return redirect()->route('cve.index');
    }
}
