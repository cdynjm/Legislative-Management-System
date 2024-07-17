<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Models\Files;
use App\Models\CoAuthors;

class FileController extends Controller
{
    public function create(Request $request) {

        $datetime = date('Ymd-His');

        $filename = \Str::slug('file-'.$datetime).'.'.$request->file->extension(); 
        $transferfile = $request->file('file')->storeAs('public/files/', $filename);

        $file = Files::create([
            'admin_id' => Auth::user()->id,
            'folder_id' => $request->parent_id,
            'status' => $request->status,
            'ordinance_title' => $request->ordinance_title,
            'author' => $request->author,
            'filename' => $filename,
            'extension' => $request->file->extension()
        ]);

        foreach($request->co_author as $key => $value) {
            if(!empty($value)) {
                CoAuthors::create([
                    'fileid' => $file->id,
                    'author' => $value
                ]);
            }
        }

        return response()->json(['Error' => 0, 'Message'=> 'File Uploaded Successfully']); 

    }

    public function update(Request $request) {

        if(empty($request->file('file'))) {

            Files::where(['id' => $request->file_id])
                ->update([
                    'status' => $request->status,
                    'status_sp' => $request->status_sp,
                    'ordinance_title' => $request->ordinance_title,
                    'author' => $request->author,
                    'co_author' => $request->co_author,
                    'first' => $request->first,
                    'second' => $request->second,
                    'third' => $request->third,
                    'ordinance_number' => $request->ordinance_number,
                    'final_title' => $request->final_title,
                    'enactment_date' => $request->enactment_date,
                    'lce_approval' => $request->lce_approval,
                    'transmittal' => $request->transmittal,
                    'sp_sl' => $request->sp_sl,
                    'posted' => $request->posted,
                    'published' => $request->published,
            ]);

            CoAuthors::where(['fileid' => $request->file_id])->delete();

            foreach($request->co_author as $key => $value) {
                if(!empty($value)) {
                    CoAuthors::create([
                        'fileid' => $request->file_id,
                        'author' => $value
                    ]);
                }
            }

            return response()->json(['Error' => 0, 'Message' => 'File Updated Successfully']); 
        }
        if(!empty($request->file('file'))) {

            File::delete(public_path('storage/files/'.$request->oldfile.''));

            $datetime = date('Ymd-His');

            $filename = \Str::slug($request->ordinance.'-'.$datetime).'.'.$request->file->extension(); 
            $transferfile = $request->file('file')->storeAs('public/files/', $filename);

            Files::where(['id' => $request->file_id])
                ->update([
                    'status' => $request->status,
                    'status_sp' => $request->status_sp,
                    'ordinance_title' => $request->ordinance_title,
                    'author' => $request->author,
                    'co_author' => $request->co_author,
                    'first' => $request->first,
                    'second' => $request->second,
                    'third' => $request->third,
                    'ordinance_number' => $request->ordinance_number,
                    'final_title' => $request->final_title,
                    'enactment_date' => $request->enactment_date,
                    'lce_approval' => $request->lce_approval,
                    'transmittal' => $request->transmittal,
                    'sp_sl' => $request->sp_sl,
                    'posted' => $request->posted,
                    'published' => $request->published,
                    'filename' => $filename,
                    'extension' => $request->file->extension()
            ]);

            CoAuthors::where(['fileid' => $request->file_id])->delete();

            foreach($request->co_author as $key => $value) {
                if(!empty($value)) {
                    CoAuthors::create([
                        'fileid' => $request->file_id,
                        'author' => $value
                    ]);
                }
            }

            return response()->json(['Error' => 0, 'Message' => 'File Updated Successfully']); 
        }

    }

    public function delete(Request $request) {

      //  foreach(Files::where(['id' => $request->fileid])->get() as $fn) {

      //      File::delete(public_path('storage/files/'.$fn->filename.''));

    //}

        Files::where(['id' => $request->fileid])->update(['archive' => 1]);

        return response()->json(['Error' => 0]); 

    }
}
