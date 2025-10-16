<?php

namespace App\Http\Controllers;

use App\Models\FormAsesmen;
use App\Models\FormAsesmenHeader;
use Illuminate\Http\Request;

class FormAsesmenController extends Controller
{
    public function index()
    {
        $headers = FormAsesmenHeader::with('formAsesmen')->get();
        return view('admin.ubah_asesmen.index', compact('headers'));
    }

    public function create()
    {   
        $headers = FormAsesmenHeader::with('formAsesmen')->get();
        return view('admin.ubah_asesmen.create', compact('headers'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'form_asesmen_header_id' => 'required|exists:form_asesmen_header,id',
        'question' => 'required|string|max:255',
        'question_type' => 'required|in:1,2',
        ]);

        FormAsesmen::create($request->only(['form_asesmen_header_id', 'question', 'question_type']));
        return redirect()->route('admin.ubah_asesmen.index')->with('success', 'Form asesmen berhasil ditambahkan.');
    }

   public function edit($id)
{
    $form = \App\Models\FormAsesmen::findOrFail($id);
    $headers = \App\Models\FormAsesmenHeader::all();

    return view('admin.ubah_asesmen.edit', compact('form', 'headers'));
}

    public function update(Request $request, $id)
{
    $request->validate([
        'form_asesmen_header_id' => 'required|exists:form_asesmen_header,id',
        'question' => 'required|string|max:255',
        'question_type' => 'required|in:1,2',
    ]);

    $form = \App\Models\FormAsesmen::findOrFail($id);

    $form->update([
        'form_asesmen_header_id' => $request->form_asesmen_header_id,
        'question' => $request->question,
        'question_type' => $request->question_type,
    ]);

    return redirect()->route('admin.ubah_asesmen.index')->with('success', 'Pertanyaan asesmen berhasil diperbarui!');
}


    public function destroy($id)
{
    $form = \App\Models\FormAsesmen::findOrFail($id);
    $form->delete();

    return redirect()->route('admin.ubah_asesmen.index')->with('success', 'Pertanyaan asesmen berhasil dihapus.');
}

}
