<?php

namespace App\Http\Controllers;

use App\Models\Baki;
use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $senaraiBudgets = DB::connection('mysql2')->table('budgets')->paginate(10);
        $senaraiBudgets = Budget::paginate(10);

        return view('budgets.index', compact('senaraiBudgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('budgets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => ['required'],
            'kod_budget' => ['required', 'integer'], // kaedah baru penulisan rules yang lebih dari 1
            'amaun' => 'required|numeric' // kaedah lama penulisan rules yang lebih dari 1
        ]);

        $data = $request->only([
            'tahun',
            'kod_budget',
            'amaun'
        ]);

        try {
            DB::beginTransaction();

            // $budget = DB::connection('mysql2')->table('budgets')->insert($data);
            $budget = Budget::create($data);

            $data['budget_id'] = $budget->id;
            // Update baki dalam table baki di database eaduan2
            Baki::create($data);

            DB::commit();

            return redirect()->route('budgets.index')->with('success_message', 'Rekod berjaya disimpan');

        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->route('budgets.index')->with('error_message', $th->getMessage());
        }



        return redirect()->route('budgets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budget = DB::connection('mysql2')->table('budgets')->find($id);

        return view('budgets.edit', compact('budget'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => ['required'],
            'kod_budget' => ['required', 'integer'], // kaedah baru penulisan rules yang lebih dari 1
            'amaun' => 'required|numeric' // kaedah lama penulisan rules yang lebih dari 1
        ]);

        $data = $request->only([
            'tahun',
            'kod_budget',
            'amaun'
        ]);

        //$budget = DB::connection('mysql2')->table('budgets')->where('id', $id)->update($data);
        $budget = Budget::findOrFail($id);
        $budget->update($data);

        $data['budget_id'] = $budget->id;

        $baki = Baki::where('budget_id', '=', $id)->firstOrCreate($data);

        $baki->update([
            'kod_budget' => $budget->kod_budget,
            'amaun' => $budget->amaun
        ]);

        return redirect()->route('budgets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $budget = DB::connection('mysql2')->table('budgets')->where('id', $id)->delete();

        return redirect()->route('budgets.index');
    }
}
