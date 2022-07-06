<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AduanRequest;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senaraiAduan = DB::table('aduan')->orderBy('id', 'desc')->paginate(10);

        // $senaraiAduan = [
        //     ['id' => 1, 'pengadu' => 'Ahmad', 'email_pengadu' => 'ahmad@test.com', 'aduan' => 'Sample Aduan 1'],
        //     ['id' => 2, 'pengadu' => 'Siti', 'email_pengadu' => 'siti@test.com', 'aduan' => 'Sample Aduan 2'],
        //     ['id' => 3, 'pengadu' => 'Ali', 'email_pengadu' => 'ali@test.com', 'aduan' => 'Sample Aduan 3'],
        //     ['id' => 4, 'pengadu' => 'Muthu', 'email_pengadu' => 'muthu@test.com', 'aduan' => 'Sample Aduan 4'],
        //     ['id' => 5, 'pengadu' => 'Apek', 'email_pengadu' => 'apek@test.com', 'aduan' => 'Sample Aduan 5'],
        // ];

        $title = 'Senarai Aduan';

        // return view('aduan.index');
        // return view('aduan.index')
        // ->with('senaraiAduan', $senaraiAduan)
        // ->with('title', $title);

        //return view('aduan.index', ['tajuk' => $title, 'senaraiAduan' => $senaraiAduan]);

        return view('aduan.index', compact('title', 'senaraiAduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aduan/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AduanRequest $request)
    {
        $data = $request->validated();
        //$data['user_id'] = auth()->id();

        DB::table('aduan')->insert($data);

        return redirect()->route('aduan.index')->with('success_message', 'Rekod berjaya disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aduan = DB::table('aduan')->find($id);

        return view('aduan.edit', compact('aduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AduanRequest $request, $id)
    {
        $data = $request->validated();
        // $data['user_id'] = auth()->id();

        DB::table('aduan')->where('id', $id)->update($data);

        return redirect()->route('aduan.index')->with('success_message', 'Rekod berjaya dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('aduan')->where('id', $id)->delete();

        return redirect()->route('aduan.index')->with('success_message', 'Rekod berjaya dihapuskan!');

    }
}
