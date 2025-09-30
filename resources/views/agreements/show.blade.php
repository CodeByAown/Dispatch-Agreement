@extends('layouts.app')

@section('title', 'Dispatch Agreement')

@section('styles')
<style>
    .preview {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 16px;
        overflow: hidden;
    }

    .sheet {
        padding: 36px 44px;
        max-width: 860px;
        margin: 0 auto;
        background: #fff;
    }

    .doc-header {
        display: flex;
        gap: 18px;
        align-items: flex-start;
        padding-bottom: 14px;
        border-bottom: 2px solid var(--line);
    }

    .doc-logo {
        width: 64px;
        height: 64px;
        border-radius: 12px;
        border: 2px dashed var(--line);
        display: grid;
        place-items: center;
        color: var(--muted);
        font-weight: 700;
    }

    .doc-hgroup h2 {
        margin: 0 0 6px;
        font-size: 18.5pt;
    }

    .doc-hgroup p {
        margin: 0;
        color: var(--muted);
    }

    .badge {
        display: inline-block;
        padding: 2px 8px;
        border: 1px solid var(--brand);
        color: #075985;
        border-radius: 999px;
        font-size: 9.5pt;
        font-weight: 700;
        background: #f0f9ff;
        margin-left: 6px;
    }

    .kv {
        display: grid;
        grid-template-columns: 220px 1fr;
        gap: 8px 18px;
        margin: 14px 0 18px;
        padding: 14px 16px;
        border: 1px solid var(--line);
        border-radius: 12px;
        background: #fafafa;
    }

    .kv .label {
        color: var(--muted);
        font-size: 10.5pt;
    }

    .kv .value {
        font-weight: 600;
    }

    h3 {
        margin: 18px 0 8px;
        font-size: 12.5pt;
    }

    p, li {
        margin: 8px 0;
    }

    .clause {
        padding: 10px 14px;
        border-left: 3px solid var(--brand);
        background: linear-gradient(180deg, #f8fafc, #fff);
        border-radius: 8px;
    }

    .list {
        margin: 6px 0 6px 18px;
    }

    .small {
        font-size: 10pt;
        color: var(--muted);
    }

    .sign {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        margin-top: 12px;
        padding-top: 12px;
        border-top: 2px solid var(--line);
    }

    .sigbox {
        border: 1px solid var(--line);
        border-radius: 12px;
        padding: 14px 16px;
    }

    .sigline {
        height: 1px;
        background: var(--line);
        margin: 12px 0;
    }

    footer.doc {
        margin-top: 10px;
        padding-top: 8px;
        border-top: 1px solid var(--line);
        color: var(--muted);
        font-size: 10pt;
        text-align: center;
    }

    .blankline {
        font-family: "Courier New", ui-monospace, monospace;
        letter-spacing: .4px;
    }
</style>
@endsection

@section('content')
<div class="card">
    <header class="hero">
        <div class="logo">LOGO</div>
        <div>
            <h1>DriveLine Trucking LLC — Dispatch Agreement</h1>
            <p>Step 2 of 2 — Review and Download PDF</p>
        </div>
    </header>

    <div class="preview">
        <div class="sheet">
            <div class="doc-header">
                <div class="doc-logo">LOGO</div>
                <div class="doc-hgroup">
                    <h2>DriveLine Trucking LLC — Dispatch Service Agreement <span class="badge">% PER LOAD</span></h2>
                    <p>Professional dispatch representation for motor carriers and owner-operators.</p>
                </div>
            </div>

            <div class="kv">
                <div class="label">Effective Date</div>
                <div class="value">{{ $agreement->effective_date->format('m/d/Y') }}</div>

                <div class="label">Dispatch (Company)</div>
                <div class="value">DriveLine Trucking LLC ("DISPATCH")</div>

                <div class="label">Carrier Legal Name</div>
                <div class="value">{{ $agreement->carrier_name }}</div>

                <div class="label">Authority</div>
                <div class="value">MC #: {{ $agreement->mc_number }} &nbsp; | &nbsp; DOT #: {{ $agreement->dot_number }}</div>

                <div class="label">Dispatch Fee</div>
                <div class="value">{{ $agreement->dispatch_fee }}% of each load's gross rate</div>
            </div>

            <h3>1. Purpose & Scope</h3>
            <div class="clause">
                <p>DISPATCH provides professional dispatch services to CARRIER, including locating freight, negotiating rates, coordinating communications with shippers/brokers, and forwarding rate confirmations and paperwork for acceptance. This Agreement applies whether CARRIER is an <strong>individual owner-operator</strong> or a <strong>carrier company operating multiple drivers and units</strong>.</p>
                <p>CARRIER retains sole discretion to accept or reject any load and full control of operations, routes, safety, and compliance. This Agreement does <em>not</em> create an employer/employee, broker/carrier, joint venture, or partnership relationship.</p>
                <p><strong>Optional POA:</strong>
                    @if($agreement->poa === 'Yes')
                        Carrier grants DISPATCH limited authority to sign rate confirmations for accepted loads.
                    @elseif($agreement->poa === 'No')
                        Carrier will sign each rate confirmation; DISPATCH will forward documents for signature.
                    @else
                        <span class="blankline">______________________________</span>
                    @endif
                </p>
            </div>

            <h3>2. Term & Termination</h3>
            <div class="clause">
                <p>This Agreement begins on the Effective Date and continues week-to-week. Either party may terminate with <strong>seven (7) days' written notice</strong> (email acceptable).</p>
            </div>

            <h3>3. Fees & Payment</h3>
            <div class="clause">
                <ul class="list">
                    <li><strong>Dispatch Fee:</strong> {{ $agreement->dispatch_fee }}% per load (calculated on gross rate on the rate confirmation).</li>
                    <li><strong>Invoicing:</strong> DISPATCH will invoice weekly for all dispatched loads. Payment is due upon receipt and may be made via Zelle, Cash App, or debit/credit card.</li>
                    <li><strong>Factoring (if used):</strong> CARRIER authorizes its factoring company to remit DISPATCH fees directly from settlement proceeds.</li>
                    <li><strong>Delinquency:</strong> Accounts not paid when due may be paused until current; reasonable admin/reinstatement fees may apply.</li>
                </ul>
            </div>

            <h3>4. Carrier Responsibilities</h3>
            <div class="clause">
                <ul class="list">
                    <li>Maintain active operating authority (MC/DOT), safety compliance, and all required permits.</li>
                    <li>Maintain insurance: at least <strong>$1,000,000 auto liability</strong> and <strong>$100,000 cargo</strong> (or higher where required).</li>
                    <li>Provide qualified drivers and safe, DOT-compliant equipment; ensure drivers follow shipper/receiver rules.</li>
                    <li>Assume full custody and control of freight upon pickup; remain liable as carrier for loss, damage, or delay after acceptance.</li>
                    <li>Provide timely status updates; promptly share signed BOLs/PODs and documents needed for billing.</li>
                    <li>If CARRIER is a company, ensure all drivers and agents comply with this Agreement.</li>
                </ul>
                <p class="small">
                    <em>Carrier Contact:</em> {{ $agreement->carrier_email }} • {{ $agreement->carrier_phone }}
                    @if($agreement->notes)
                        • <em>Notes:</em> {{ $agreement->notes }}
                    @endif
                </p>
            </div>

            <h3>5. Dispatch Duties & Limits</h3>
            <div class="clause">
                <ul class="list">
                    <li>Identify loads consistent with CARRIER's equipment and preferred lanes; submit options for approval.</li>
                    <li>Upon CARRIER's consent, provide necessary documents to broker/shipper and forward confirmed rate confirmations.</li>
                    <li>Assist with routine paperwork and reasonable billing support if requested.</li>
                    <li><strong>Limitations:</strong> DISPATCH is not responsible for broker/shipper payment timing, advances, detention/TONU disputes, or cargo claims; DISPATCH is not the carrier of record.</li>
                </ul>
            </div>

            <h3>6. Non-Solicitation</h3>
            <div class="clause">
                <p>For the term of this Agreement and for <strong>one (1) year</strong> after termination, CARRIER shall not directly solicit, contract with, or accept loads from any shipper, broker, or customer introduced by DISPATCH, except through DISPATCH. If breached, CARRIER shall pay <strong>100% of gross transportation revenue</strong> received from such business as liquidated damages.</p>
            </div>

            <h3>7. Indemnification</h3>
            <div class="clause">
                <p>CARRIER shall indemnify, defend, and hold harmless DISPATCH and its representatives from any claims, losses, fines, or liabilities arising out of CARRIER's transportation operations, including personal injury, property damage, cargo loss, or regulatory violations.</p>
            </div>

            <h3>8. Governing Law & Venue</h3>
            <div class="clause">
                <p>This Agreement is governed by the laws of the <strong>State of Texas</strong>. The parties consent to exclusive jurisdiction and venue in the state or federal courts located in <strong>Harris County, Texas</strong>.</p>
            </div>

            <h3>9. Entire Agreement; Amendments</h3>
            <div class="clause">
                <p>This document constitutes the entire agreement between the parties and supersedes all prior discussions. Any amendment must be in a signed writing by both parties. If any provision is held unenforceable, the remainder remains in effect.</p>
            </div>

            <div class="sign">
                <div class="sigbox">
                    <h3 style="margin: 0 0 8px">Carrier</h3>
                    <p><strong>Company / Owner:</strong> {{ $agreement->carrier_name }}</p>
                    <p><strong>Authorized Representative:</strong> {{ $agreement->carrier_rep }}</p>
                    <div class="sigline"></div>
                    <p><strong>Signature</strong> <span class="blankline">_______________________________</span></p>
                    <p><strong>Date</strong> <span class="blankline">_______________________________</span></p>
                </div>
                <div class="sigbox">
                    <h3 style="margin: 0 0 8px">DriveLine Trucking LLC</h3>
                    <p><strong>Authorized Representative:</strong> <span class="blankline">_______________________________</span></p>
                    <div class="sigline"></div>
                    <p><strong>Signature</strong> <span class="blankline">_______________________________</span></p>
                    <p><strong>Date</strong> <span class="blankline">_______________________________</span></p>
                </div>
            </div>

            <footer class="doc">
                DriveLine Trucking LLC • Dispatch Service Agreement • © {{ date('Y') }}
            </footer>
        </div>
    </div>

    <div class="actions" style="margin-top: 14px">
        <a href="{{ route('agreements.create') }}" class="btn b-secondary">Create New Agreement</a>
        <a href="{{ route('agreements.pdf', $agreement->id) }}" class="btn b-primary">Download PDF</a>
    </div>
</div>
@endsection
