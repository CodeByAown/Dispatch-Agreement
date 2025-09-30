<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatch Agreement - {{ $agreement->carrier_name }}</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11pt;
            line-height: 1.5;
            color: #111827;
            background: #fff;
        }

        .sheet {
            padding: 20px 30px;
            max-width: 100%;
        }

        .doc-header {
            display: table;
            width: 100%;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 12px;
            margin-bottom: 16px;
        }

        .doc-logo {
            display: table-cell;
            width: 60px;
            height: 60px;
            border: 2px dashed #e5e7eb;
            border-radius: 10px;
            text-align: center;
            vertical-align: middle;
            color: #6b7280;
            font-weight: bold;
            font-size: 10pt;
        }

        .doc-hgroup {
            display: table-cell;
            vertical-align: middle;
            padding-left: 15px;
        }

        .doc-hgroup h2 {
            font-size: 16pt;
            margin: 0 0 4px 0;
        }

        .doc-hgroup p {
            color: #6b7280;
            font-size: 10pt;
            margin: 0;
        }

        .badge {
            display: inline-block;
            padding: 2px 8px;
            border: 1px solid #0ea5e9;
            color: #075985;
            border-radius: 12px;
            font-size: 8pt;
            font-weight: bold;
            background: #f0f9ff;
            margin-left: 6px;
        }

        .kv {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: #fafafa;
            padding: 12px 14px;
            margin: 12px 0 16px 0;
        }

        .kv table {
            width: 100%;
            border-collapse: collapse;
        }

        .kv td {
            padding: 4px 0;
            vertical-align: top;
        }

        .kv .label {
            color: #6b7280;
            font-size: 10pt;
            width: 200px;
        }

        .kv .value {
            font-weight: 600;
            color: #111827;
        }

        h3 {
            margin: 16px 0 8px 0;
            font-size: 12pt;
            color: #111827;
        }

        .clause {
            padding: 10px 12px;
            border-left: 3px solid #0ea5e9;
            background: #f8fafc;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .clause p {
            margin: 6px 0;
        }

        .clause ul {
            margin: 6px 0 6px 20px;
            padding: 0;
        }

        .clause li {
            margin: 5px 0;
        }

        .small {
            font-size: 9pt;
            color: #6b7280;
        }

        .sign {
            display: table;
            width: 100%;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 2px solid #e5e7eb;
        }

        .sigbox {
            display: table-cell;
            width: 48%;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 14px;
            vertical-align: top;
        }

        .sigbox:first-child {
            margin-right: 4%;
        }

        .sigbox h3 {
            margin: 0 0 8px 0;
            font-size: 11pt;
        }

        .sigbox p {
            margin: 6px 0;
            font-size: 10pt;
        }

        .sigline {
            height: 1px;
            background: #e5e7eb;
            margin: 10px 0;
        }

        .blankline {
            font-family: "Courier New", monospace;
            letter-spacing: 0.5px;
        }

        footer.doc {
            margin-top: 12px;
            padding-top: 8px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 9pt;
            text-align: center;
        }

        /* Page break control */
        .kv, .sign, .doc-header {
            page-break-inside: avoid;
        }

        h3 {
            page-break-after: avoid;
        }
    </style>
</head>
<body>
    <div class="sheet">
        <div class="doc-header">
            <div class="doc-logo">LOGO</div>
            <div class="doc-hgroup">
                <h2>DriveLine Trucking LLC — Dispatch Service Agreement <span class="badge">% PER LOAD</span></h2>
                <p>Professional dispatch representation for motor carriers and owner-operators.</p>
            </div>
        </div>

        <div class="kv">
            <table>
                <tr>
                    <td class="label">Effective Date</td>
                    <td class="value">{{ $agreement->effective_date->format('m/d/Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Dispatch (Company)</td>
                    <td class="value">DriveLine Trucking LLC ("DISPATCH")</td>
                </tr>
                <tr>
                    <td class="label">Carrier Legal Name</td>
                    <td class="value">{{ $agreement->carrier_name }}</td>
                </tr>
                <tr>
                    <td class="label">Authority</td>
                    <td class="value">MC #: {{ $agreement->mc_number }} | DOT #: {{ $agreement->dot_number }}</td>
                </tr>
                <tr>
                    <td class="label">Dispatch Fee</td>
                    <td class="value">{{ $agreement->dispatch_fee }}% of each load's gross rate</td>
                </tr>
            </table>
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
            <ul>
                <li><strong>Dispatch Fee:</strong> {{ $agreement->dispatch_fee }}% per load (calculated on gross rate on the rate confirmation).</li>
                <li><strong>Invoicing:</strong> DISPATCH will invoice weekly for all dispatched loads. Payment is due upon receipt and may be made via Zelle, Cash App, or debit/credit card.</li>
                <li><strong>Factoring (if used):</strong> CARRIER authorizes its factoring company to remit DISPATCH fees directly from settlement proceeds.</li>
                <li><strong>Delinquency:</strong> Accounts not paid when due may be paused until current; reasonable admin/reinstatement fees may apply.</li>
            </ul>
        </div>

        <h3>4. Carrier Responsibilities</h3>
        <div class="clause">
            <ul>
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
            <ul>
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
                <h3>Carrier</h3>
                <p><strong>Company / Owner:</strong> {{ $agreement->carrier_name }}</p>
                <p><strong>Authorized Representative:</strong> {{ $agreement->carrier_rep }}</p>
                <div class="sigline"></div>
                <p><strong>Signature</strong> <span class="blankline">_______________________________</span></p>
                <p><strong>Date</strong> <span class="blankline">_______________________________</span></p>
            </div>
            <div class="sigbox">
                <h3>DriveLine Trucking LLC</h3>
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
</body>
</html>
