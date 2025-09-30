@extends('layouts.app')

@section('title', 'Create Dispatch Agreement')

@section('content')
<div class="card">
    <header class="hero">
        <div class="logo">LOGO</div>
        <div>
            <h1>DriveLine Trucking LLC — Dispatch Agreement Builder</h1>
            <p>Step 1 of 2 — Enter details. All fields are required unless marked optional.</p>
        </div>
    </header>

    <form action="{{ route('agreements.store') }}" method="POST">
        @csrf

        <div class="grid">
            <div class="field">
                <label for="effective_date">Effective Date (MM/DD/YYYY)</label>
                <input
                    type="date"
                    id="effective_date"
                    name="effective_date"
                    value="{{ old('effective_date') }}"
                    required
                />
                @error('effective_date')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="dispatch_fee">Dispatch Fee (% per load)</label>
                <input
                    type="number"
                    id="dispatch_fee"
                    name="dispatch_fee"
                    min="1"
                    max="25"
                    step="0.5"
                    placeholder="e.g., 8"
                    value="{{ old('dispatch_fee') }}"
                    required
                />
                @error('dispatch_fee')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="carrier_name">Carrier Legal Name (Company or Owner)</label>
                <input
                    type="text"
                    id="carrier_name"
                    name="carrier_name"
                    placeholder="e.g., Swift Eagle Transport LLC"
                    value="{{ old('carrier_name') }}"
                    required
                />
                @error('carrier_name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="carrier_rep">Authorized Representative (Carrier)</label>
                <input
                    type="text"
                    id="carrier_rep"
                    name="carrier_rep"
                    placeholder="e.g., John D. Carter"
                    value="{{ old('carrier_rep') }}"
                    required
                />
                @error('carrier_rep')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="mc_number">MC Number</label>
                <input
                    type="text"
                    id="mc_number"
                    name="mc_number"
                    placeholder="e.g., 123456"
                    value="{{ old('mc_number') }}"
                    required
                />
                @error('mc_number')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="dot_number">DOT Number</label>
                <input
                    type="text"
                    id="dot_number"
                    name="dot_number"
                    placeholder="e.g., 3456789"
                    value="{{ old('dot_number') }}"
                    required
                />
                @error('dot_number')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="carrier_email">Carrier Email</label>
                <input
                    type="email"
                    id="carrier_email"
                    name="carrier_email"
                    placeholder="e.g., ops@carrierdomain.com"
                    value="{{ old('carrier_email') }}"
                    required
                />
                @error('carrier_email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="carrier_phone">Carrier Phone</label>
                <input
                    type="text"
                    id="carrier_phone"
                    name="carrier_phone"
                    placeholder="e.g., (555) 555-5555"
                    value="{{ old('carrier_phone') }}"
                    required
                />
                @error('carrier_phone')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field" style="grid-column: 1/-1">
                <label for="notes">Preferred Lanes / Notes (optional)</label>
                <textarea
                    id="notes"
                    name="notes"
                    placeholder="e.g., TX→CA reefer lanes, avoid NYC."
                >{{ old('notes') }}</textarea>
                <div class="hint">Shows inside the agreement only if provided.</div>
                @error('notes')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field" style="grid-column: 1/-1">
                <label for="poa">Allow Dispatch to sign rate confirmations on Carrier's behalf?</label>
                <select id="poa" name="poa">
                    <option value="">(select)</option>
                    <option value="Yes" {{ old('poa') == 'Yes' ? 'selected' : '' }}>
                        Yes — limited authority for rate confirmations
                    </option>
                    <option value="No" {{ old('poa') == 'No' ? 'selected' : '' }}>
                        No — Carrier will sign each confirmation
                    </option>
                </select>
                @error('poa')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="actions">
            <button type="submit" class="b-primary">Generate Agreement</button>
        </div>
        <p class="hint">Governing Law & Venue are preset to <b>Texas</b> (Harris County).</p>
    </form>
</div>
@endsection
