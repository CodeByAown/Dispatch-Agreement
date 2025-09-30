@extends('layouts.app')

@section('title', 'All Agreements')

@section('styles')
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 16px;
    }

    thead {
        background: var(--bg);
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid var(--line);
    }

    th {
        font-weight: 600;
        color: var(--muted);
        font-size: 10pt;
    }

    tbody tr:hover {
        background: #fafafa;
    }

    .action-links {
        display: flex;
        gap: 8px;
    }

    .action-links a {
        font-size: 10pt;
        padding: 4px 10px;
        border-radius: 6px;
        background: var(--brand);
        color: white;
        text-decoration: none;
    }

    .action-links a:hover {
        background: var(--brand2);
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .pagination a, .pagination span {
        padding: 8px 12px;
        border: 1px solid var(--line);
        border-radius: 8px;
        text-decoration: none;
        color: var(--ink);
    }

    .pagination .active {
        background: var(--brand);
        color: white;
        border-color: var(--brand);
    }
</style>
@endsection

@section('content')
<div class="card">
    <header class="hero">
        <div class="logo">LOGO</div>
        <div>
            <h1>All Dispatch Agreements</h1>
            <p>View and manage all saved agreements</p>
        </div>
    </header>

    <div class="actions">
        <a href="{{ route('agreements.create') }}" class="btn b-primary">Create New Agreement</a>
    </div>

    @if($agreements->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Carrier Name</th>
                    <th>MC Number</th>
                    <th>Effective Date</th>
                    <th>Fee %</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agreements as $agreement)
                <tr>
                    <td>#{{ $agreement->id }}</td>
                    <td>{{ $agreement->carrier_name }}</td>
                    <td>{{ $agreement->mc_number }}</td>
                    <td>{{ $agreement->effective_date->format('m/d/Y') }}</td>
                    <td>{{ $agreement->dispatch_fee }}%</td>
                    <td>{{ $agreement->created_at->format('m/d/Y') }}</td>
                    <td>
                        <div class="action-links">
                            <a href="{{ route('agreements.show', $agreement->id) }}">View</a>
                            <a href="{{ route('agreements.pdf', $agreement->id) }}">PDF</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $agreements->links('pagination::simple-default') }}
        </div>
    @else
        <p style="text-align: center; color: var(--muted); margin-top: 20px;">
            No agreements found. Create your first agreement!
        </p>
    @endif
</div>
@endsection
