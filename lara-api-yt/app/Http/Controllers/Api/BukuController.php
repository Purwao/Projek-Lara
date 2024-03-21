<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Buku::orderBy('judul', 'asc')->get();
        return response()->json([
                'status'=> true,
                'message'=>'good shi, Data Is Found',
                'data'=>$data
        ],200
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataBuku= new Buku;
            $rules=[
                'judul'=>'required',
                'pengarang'=>'required',
                'tanggal_publikasi'=>'required||date',
            ];
            $validator=Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json(
                    [
                        'status'=> false,
                        'message'=>'Data Is ERROR, check the required field',
                ],400
                );
            }

        $dataBuku->judul=$request->judul;
        $dataBuku->pengarang=$request->pengarang;
        $dataBuku->tanggal_publikasi=$request->tanggal_publikasi;

        $post = $dataBuku->save();

        return response()->json([
            'status'=> true,
            'message'=>'GG, Data Is Submitted',
    ],200);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Buku::find($id);
        if($data){
            return response()->json([
                'status'=> true,
                'message'=>'NICE!Data Is Found',
                'data'=>$data,
        ],200);
        }
        else{
            return response()->json([
                'status'=> false,
                'message'=>'imagine ur Data Is NOT Found'
        ]);
        }
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
        $dataBuku= Buku::find($id);
        if(empty($dataBuku)){
            return response()->json(
                [
                    'status'=> false,
                    'message'=>'Data Is NOT FOUND, check ur $id u dumbass',
            ],404
            );
        }
        $rules=[
            'judul'=>'required',
            'pengarang'=>'required',
            'tanggal_publikasi'=>'required||date',
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(
                [
                    'status'=> false,
                    'message'=>'Data Is ERROR, check the required field',
            ],400
            );
        }

    $dataBuku->judul=$request->judul;
    $dataBuku->pengarang=$request->pengarang;
    $dataBuku->tanggal_publikasi=$request->tanggal_publikasi;

    $post = $dataBuku->save();

    return response()->json([
        'status'=> true,
        'message'=>'Data Is Re-newed cutie pie >///<',
],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataBuku= Buku::find($id);
        if(empty($dataBuku)){
            return response()->json(
                [
                    'status'=> false,
                    'message'=>'Data Is NOT FOUND, check ur $id u fool',
            ],404
            );
        }

    $post = $dataBuku->delete();

    return response()->json([
        'status'=> true,
        'message'=>'THE MEMOIR HAS BEEN DELETED! :(',
],200);
    }
}
