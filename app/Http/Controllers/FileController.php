<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\File;

class FileController extends Controller
{
    //

    // Va rediriger vers la page de liste de fichiers
    public function index()
    {
        $files = File::with('language')->paginate(5);
        $languages = Language::all();
        return view('file.index', ['files' => $files, 'languages' => $languages]);
    }

    // Va insérer dans la base de données un nouveau fichier si les données sont valides
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,docx,doc,zip|max:2048',
            'name' => 'required',
            'language_id' => 'required'
        ]);

        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $request->file->move(public_path('files'), $fileName);

        $file = new File();
        $file->name = $request->name;
        $file->path = 'files/' . $fileName;
        $file->language_id = $request->language_id;
        $file->user_id = auth()->user()->id;
        $file->save();

        return back()->with('success', '');
    }

    // Va rediriger vers la page de modification des informations d'un fichier
    public function edit($id)
    {
        $file = File::find($id);
        $languages = Language::all();
        return view('file.edit', ['file' => $file, 'languages' => $languages]);
    }

    // Va mettre à jour les informations d'un fichier dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'language_id' => 'required'
        ]);

        $file = File::find($id);
        $file->name = $request->name;
        $file->language_id = $request->language_id;
        $file->save();

        return back()->with('success', '');
    }

    // Va supprimer un fichier de la base de données et du dossier public
    public function delete($id)
    {
        $file = File::find($id);
        $filePath = public_path($file->path);

        if (file_exists($filePath)) {
            $file->delete();
            unlink($filePath);

            return back()->with('success_delete', '');
        }
        else
        {
            return back()->with('file_not_found', '');
        }
    }
}
