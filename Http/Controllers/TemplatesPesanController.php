<?php

namespace App\Http\Controllers;

use App\Models\TemplatesPesan;
use Illuminate\Http\Request;
use SebastianBergmann\Template\Template;

class TemplatesPesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["title"] = "List Templates Pesan";
        $data["data"] = TemplatesPesan::all();
        return view('admin.template_pesan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["title"] = "Form Tambah Templates Pesan";
        return view('admin.template_pesan.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'messages' => 'required',
        ]);

        TemplatesPesan::create([
            'type' => $request->type,
            'messages' => $request->messages,
        ]);

        return redirect()->route('templates_pesan.index')->with('success', 'Template Pesan berhasil ditambahkan.');
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
        $data['title'] = "Edit Template Pesan";
        $data['template'] = TemplatesPesan::find($id);

        if ($data['template'] === null) {
            return redirect()->route('templates_pesan.index')->with('error', 'Template Pesan tidak ditemukan.');
        }

        return view('admin.template_pesan.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'messages' => 'required',
        ]);

        $template = TemplatesPesan::find($id);

        if ($template === null) {
            return redirect()->route('templates_pesan.index')->with('error', 'Template Pesan tidak ditemukan.');
        }

        $template->update([
            'type' => $request->type,
            'messages' => $request->messages,
        ]);

        return redirect()->route('templates_pesan.index')->with('success', 'Template Pesan berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $template = TemplatesPesan::find($id);

        if ($template === null) {
            return redirect()->route('templates_pesan.index')->with('error', 'Template Pesan tidak ditemukan.');
        }

        $template->delete();

        return redirect()->route('templates_pesan.index')->with('success', 'Template Pesan berhasil dihapus.');
    }
}
