<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senaraiUsers = DB::table('users')
        ->orderBy('id', 'desc')
        ->paginate(2);

        return view('users.index', compact('senaraiUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $request->validated();

        $data = $request->only([
            'name',
            'email',
            'phone',
            'status',
            'role'
        ]);

        $data['password'] = bcrypt($request->password);

        DB::table('users')->insert($data);

        return redirect()->route('users.index')->with('success_message', 'Rekod berjaya disimpan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')->find($id);

        // $senaraiAduan = DB::table('aduan')->where('user_id', $user->id)->paginate(10);

        // Gunakan join table untuk mengakses column data daripada table yang di-join
        $senaraiAduan = DB::table('aduan')
        ->where('user_id', $user->id)
        ->join('users', 'aduan.user_id', '=', 'users.id')
        ->select('aduan.*', 'users.name', 'users.email')
        ->paginate(10);

        return view('users.show', compact('user', 'senaraiAduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = DB::table('users')->where('id', $id)->first();
        $user = DB::table('users')->find($id);

        if (!$user)
        {
            return redirect()->route('users.index')
            ->with('error_message', 'Tiada rekod user berkenaan');
        }

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        // Validation
        $request->validated();

        // Dapatkan semua data KECUALI password
        $data = $request->only([
            'name',
            'email',
            'phone',
            'status',
            'role'
        ]);

        // Semak jika ada password, encrypt dan attach kepada array $data
        if(!is_null($request->input('password')))
        {
            $data['password'] = bcrypt($request->password);
        }

        DB::table('users')->where('id', $id)->update($data);

        return redirect()->route('users.index')->with('success_message', 'Rekod berjaya dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();

        return redirect()->route('users.index')->with('success_message', 'Rekod berjaya dihapuskan!');
    }
}
