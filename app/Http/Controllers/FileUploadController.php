<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\FileDoc;
use App\Http\Requests\StoreFileRequest;

class FileUploadController extends Controller
{
    //

function home(){

    $files = DB::table('file_doc')
    ->select('*')
    ->get();
    return view('home', ['files' => $files]);
        // try {
        //     DB::connection()->getPDO();
        //     dump('Database is connected. Database Name is : ' . DB::connection()->getDatabaseName());
        //  } catch (Exception $e) {
        //     dump('Database connection failed');
        //  }
    }


    function fileupload(){

        $files = DB::table('file_doc')
        ->select('*')
        ->get();


return view('fileupload', ['files' => $files]);
        // try {
        //     DB::connection()->getPDO();
        //     dump('Database is connected. Database Name is : ' . DB::connection()->getDatabaseName());
        //  } catch (Exception $e) {
        //     dump('Database connection failed');
        //  }
    }

    public function  store(Request $request){

        $request->validate([
            'file_name'=>'required|max:255',
            'fileloc'=>'required',
        ]);
        // print_r($request->all());
        $id=DB::table('file_doc')
        ->select (DB::raw('NVL(MAX(ID),0)+1 AS ID'))
        ->first();        
       //     echo $id->id;
// eaff 
        $filename=time().$request->input('file_name').'.'.$request->file('fileloc')->getClientOriginalExtension();
        $file_size=$request->file('fileloc')->getSize();

        echo $request->file('fileloc')->storeAs('file',$filename);


        $data = $request->input();
        try{
        $filedoc= new FileDoc;
        $filedoc->id=$id->id;
        $filedoc->file_title=$data['file_name'];
        $filedoc->file_location=$request->file('fileloc')->storeAs('file',$filename);
        $filedoc->file_size=number_format($file_size / 1048576,2);
       
       $filedoc ->save();
			return redirect('upload')->with('status',"Insert successfully");
			//	return ['status'=>"Insert successfully"];
        }catch(Exception $e){
            return redirect('upload')->with('failed',"operation failed");
        }
    //     $query=DB::table('file_doc')->insert([

    //         'file_name'=>$request->input('file_name'),
    //     'file_loc'=>$request->input('fileloc')
 
    //     ]);

    //     if($query){
    //         return back()->with('success','CCCC');
    //     }else{
    //         return back()->with('fail','fail');
    //     }
    // }
    }



    function downloadfile($id){
          $download=DB::table('FILE_DOC')
          ->select('*')
          ->where('ID','=',$id)
          ->first();
          $pathToFile=storage_path("app/{$download->file_location}");

          return \Response::download($pathToFile);
    }

   function deletefile($id){
    $download=DB::table('FILE_DOC')
    ->select('*')
    ->where('ID','=',$id)
    ->first();
    //dd($download);

    if(!optional($download)->file_location==null){
    if(\Storage::exists("{$download->file_location}")){
        \Storage::delete("{$download->file_location}");

        $DD=DB::table('FILE_DOC')
        ->where('ID',$id)
        ->delete();
        return redirect('upload')->with('delet',"Delete successfully");
    }else{
        return redirect('upload')->with('deletef',"operation failed");

    }

   }else{
    return redirect('upload')->with('deletef',"operation failed");

   }}
   
    }

    