<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manual;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Session;

class ManualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manuals = Manual::all();

        return view('manual.index', ['manuals' => $manuals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newManual = new Manual();

        return view('manual.create', ['page' => 'Add manual', 'manual' => $newManual]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newManual = new Manual();
        $newManual->manualName = $request->manualnameform;
        $newManual->description = $request->manualDescription;

        if ($request->hasFile('file')) {
            $originalName = $request->file('file')->getClientOriginalName();
            
            $fileName = Str::uuid() . '.' . $request->file('file')->getClientOriginalExtension();
            
            $filePath = $request->file('file')->storeAs('public/files', $fileName);
            
            $publicPath = Storage::url($filePath);
            $newManual->filePath = $publicPath;
        }

        $newManual->save();
        //$manuals = Manual::all();

        return redirect('manual');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manual = Manual::where('id', '=', $id)->first();

        $extension = pathinfo($manual->filePath, PATHINFO_EXTENSION);
        $contentText = 'g';
        
        try {
            if ($extension === 'pdf') {
                $parser = new Parser();
                $pdf = $parser->parseFile($manual->filePath);
                $content = nl2br($pdf->getText());
            } else {
                $content = nl2br(Storage::get($manual->filePath));
            }
        } catch (\Exception $e) {
            $contentText = "Не удалось прочитать файл: " . $e->getMessage();
        }

        session(['manualName' => $manual->manualName]);

        return view('manual.show', ['manual' => $manual, 'contentText'=> $contentText]);
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
