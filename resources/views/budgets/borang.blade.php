
    <div class="mb-3">
        <label class="form-label">TAHUN</label>
        <input type="number" class="form-control" name="tahun" min="2021" step="1" value="{{ $budget->tahun ?? old('tahun') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">KOD BUDGET</label>
        <input type="text" class="form-control" name="kod_budget" value="{{ $budget->kod_budget ?? old('kod_budget') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">AMAUN</label>
        <input type="number" class="form-control" name="amaun" min="0.00" step="0.01" value="{{ $budget->amaun ?? old('amaun') }}">
    </div>

    </div>
