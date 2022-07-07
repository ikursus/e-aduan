
    <div class="mb-3">
        <label class="form-label">TARIKH</label>
        <input type="date" class="form-control" name="tarikh" value="{{ $expense->tarikh ?? old('tarikh') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">KOD BUDGET</label>
        <select name="kod_budget" class="form-control">

            @if (isset($expense))

                @foreach ($kodBudget as $item)
                <option value="{{ $item->kod_budget }}" {{ $item->kod_budget == $expense->kod_budget ? 'selected="selected' : NULL }}>Tahun {{ $item->tahun }} - Kod Budget: ({{ $item->kod_budget }})</option>
                @endforeach

            @else

                @foreach ($kodBudget as $item)
                <option value="{{ $item->kod_budget }}">Tahun {{ $item->tahun }} - Kod Budget: ({{ $item->kod_budget }})</option>
                @endforeach

            @endif

        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">AMAUN</label>
        <input type="number" class="form-control" name="amaun" min="0.00" step="0.01" value="{{ $expense->amaun ?? old('amaun') }}">
    </div>

    </div>
