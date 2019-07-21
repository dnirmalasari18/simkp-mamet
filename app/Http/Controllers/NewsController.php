<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\NewsAttachment;
use Alert;

class NewsController extends Controller
{
    //
    public function index(){
        $news = News::orderBy('updated_at')->get();
        return view('news.index')->with('newsc',$news);
    }

    public function create(){
        return view('news.create');
    }

    public function store(Request $request){                
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ], $message=[
            'required' => 'Atribut di atas perlu diisi',
        ]);

        $news = News::create([
            'title' => request('title'),
            'description' => request('description'),
        ]);
        

        if ($request->hasFile('attachments')){            
            $allowedfileExtension=['pdf','jpg','png','docx', 'pptx', 'ppt'];
            $files = $request->file('attachments');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);                
                if($check){                    
                    foreach ($request->attachments as $attachment) {
                        $path = $attachment->store('attachments');
                        NewsAttachment::create([
                            'news_id' => $news->id,                            
                            'filename' => $filename,
                            'path' => $path,
                        ]);
                    }                    
                } else {
                    Alert::error('Error', 'Ekstensi tidak diterima');
                    return redirect()->back();
                }
            }
        }
        Alert::success('Success', 'Berita baru telah tersimpan');
        return redirect()->back();
    }    

    public function destroy(Request $request){
        $news = News::find($request->id);
        NewsAttachment::whereIn('id', $news->attachments->pluck('id'));
        $news->delete();
        Alert::success('Success', 'Berita telah dihapus');
        return redirect()->route('news.index');
    }
}
