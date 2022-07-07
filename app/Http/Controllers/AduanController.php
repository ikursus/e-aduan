<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
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
        $sql = Aduan::query()->orderBy('id', 'desc');

        if (auth()->user()->role == 'ADMIN')
        {
            $senaraiAduan = $sql->paginate(10);
        }
        else
        {
            $senaraiAduan = $sql->where('user_id', auth()->id())->paginate(10);
        }

        $title = 'Senarai Aduan';

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

        if ($request->has('fail'))
        {
            $request->fail->store('attachment');
        }


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
