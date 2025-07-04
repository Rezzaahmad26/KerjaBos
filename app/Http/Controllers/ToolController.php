<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToolRequest;
use App\Http\Requests\UpdateToolRequest;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //function untuk mengambil data tools dari database
        $tools = Tool::orderByDesc('id')->paginate(10);
        return view('admin.tools.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //function untuk menampilkan form create tools
        return view('admin.tools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToolRequest $request)
    {
        //
        DB::transaction(function() use ($request) {
            $validated = $request->validated();

            if($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

            $validated['slug'] = Str::slug($validated['name']);

            $newTool = Tool::create($validated);
        });

        return redirect()->route('admin.tools.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tool $tool)
    {
        // function untuk menampilkan form edit tools
        return view('admin.tools.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToolRequest $request, Tool $tool)
    {
        // function untuk update data tools
        DB::transaction(function() use ($request, $tool) {
            $validated = $request->validated();

            if($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }
            $validated['slug'] = Str::slug($validated['name']);

            $tool->update($validated);
        } );
        return redirect()->route('admin.tools.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        // function untuk menghapus data tools
        DB::beginTransaction();

        try {
            $tool->delete();
            DB::commit();
            return redirect()->route('admin.tools.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.tools.index');
        }
    }
}
