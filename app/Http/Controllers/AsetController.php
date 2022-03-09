<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aset;

class AsetController extends Controller
{
    public function index()
    {
        $aset = Aset::all();
        // var_dump($aset);
        return view('aset', ['aset' => $aset]);
    }

    public function detail($id)
    {
        $aset=Aset::where('id',$id)->get();
        return view('aset-detail', ['aset' => $aset]);
    }

    public function store(Request $request)
    {
        $aset=new Aset();
        $aset->pemilik =$request->pemilik;
        $aset->alamat=$request->alamat;
        $aset->luas=$request->luas;
        $aset->jenis=$request->jenis;
        $aset->lat=$request->lat;
        $aset->lng=$request->lng;
        $aset->ket=$request->ket;
        
        $g1=$request->file('g1');
        $g1Name=time().'.'.$g1->extension();
        $g1->move(public_path('gambaraset'),$g1Name);
        $aset->g1=$g1Name;
        $aset->save();
        return redirect()->route('aset');

    }

    public function edit($id)
    {
        $aset=Aset::where('id',$id)->get();
        return view('aset-edit',['aset'=>$aset]);
    }

    public function update(Request $request, $id)
    {
        $aset=Aset::find($id);
        $aset->pemilik=$request->pemilik;
        $aset->alamat=$request->alamat;
        $aset->luas=$request->luas;
        $aset->jenis=$request->jenis;
        $aset->lat=$request->lat;
        $aset->lng=$request->lng;
        $aset->ket=$request->ket;

        $g1=$request->file('g1');
        if($g1){
            unlink(public_path('gambaraset/'.$aset->g1));
            $g1Name=time().'.'.$g1->extension();
            $g1->move(public_path('gambaraset'),$g1Name);
            $aset->g1=$g1Name;
        }
        $aset->save();

        return redirect()->route('aset') ;
    }

    public function delete($id)
    {
        $aset=Aset::find($id);
        unlink(public_path('gambaraset/'.$aset->g1));
        $aset->delete();
        return redirect()->route('aset');
    }

}
