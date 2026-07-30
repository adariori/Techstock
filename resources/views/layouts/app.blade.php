<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechStock - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --accent: #2563eb;
            --accent-dark: #1d4ed8;
            --border: #2363e3;
            --text: #1f2937;
            --text-light: #6b7280;
            --bg: #fbf7f5;
        }

        body {
            font-family: 'Inter', -apple-system, sans-serif;
            color: var(--text);
            background: var(--bg);
        }

        /* Navbar avec touche de couleur */
        .navbar {
            background: #fff !important;
            border-bottom: 1px solid var(--border);
            padding: 0.9rem 0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        }
        .navbar-brand {
            font-weight: 700;
            color: var(--accent) !important;
            font-size: 1.15rem;
        }
        .navbar-nav .nav-link {
            color: var(--text-light) !important;
            font-weight: 500;
            font-size: 0.9rem;
            margin-left: 1.5rem;
            padding-bottom: 0.25rem;
            border-bottom: 2px solid transparent;
            transition: all 0.15s;
        }
        .navbar-nav .nav-link:hover {
            color: var(--accent) !important;
            border-bottom-color: var(--accent);
        }

        /* Titres */
        h1 {
            font-weight: 700;
            font-size: 1.6rem;
            color: var(--text);
        }
        h3, h4 {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--text);
        }

        /* Carte principale qui enveloppe le contenu */
        .content-card {
            background: #fff;
            border-radius: 10px;
            padding: 1.75rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
            border: 1px solid var(--border);
        }

        /* Tableaux */
        .table {
            border-collapse: collapse;
            margin-bottom: 0;
        }
        .table thead th {
            border-bottom: 2px solid var(--border);
            border-top: none;
            font-weight: 600;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            color: var(--text-light);
            padding-bottom: 0.75rem;
            background: transparent;
        }
        .table td {
            border-color: var(--border);
            padding: 0.9rem 0.75rem;
            vertical-align: middle;
            font-size: 0.9rem;
        }
        .table-striped > tbody > tr:nth-of-type(odd) > * {
            background-color: #fafbfd;
        }
        .table tbody tr:hover > * {
            background-color: #f0f4ff;
        }
        .table-bordered {
            border: 1px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid var(--border);
        }
        .table-bordered th {
            background: #f9fafb;
            width: 220px;
        }

        /* Boutons */
        .btn {
            font-weight: 500;
            font-size: 0.85rem;
            border-radius: 6px;
            padding: 0.5rem 1.1rem;
            border: 1px solid transparent;
        }
        .btn-primary {
            background: var(--accent);
            border-color: var(--accent);
            box-shadow: 0 1px 2px rgba(37, 99, 235, 0.3);
        }
        .btn-primary:hover {
            background: var(--accent-dark);
            border-color: var(--accent-dark);
        }
        .btn-secondary {
            background: #fff;
            border-color: var(--border);
            color: var(--text);
        }
        .btn-secondary:hover {
            background: #f3f4f6;
            color: var(--text);
        }
        .btn-info {
            background: #eff6ff;
            color: var(--accent);
            border-color: #dbeafe;
        }
        .btn-info:hover { background: #dbeafe; color: var(--accent-dark); }
        .btn-warning {
            background: #fffbeb;
            color: #d97706;
            border-color: #fde68a;
        }
        .btn-warning:hover { background: #fef3c7; color: #b45309; }
        .btn-danger {
            background: #fef2f2;
            color: #dc2626;
            border-color: #fecaca;
        }
        .btn-danger:hover { background: #fee2e2; color: #b91c1c; }
        .btn-sm {
            font-size: 0.78rem;
            padding: 0.35rem 0.75rem;
        }

        /* Badges */
        .badge {
            font-weight: 600;
            font-size: 0.72rem;
            padding: 0.4em 0.7em;
            border-radius: 6px;
        }
        .badge.bg-success { background: #d1fae5 !important; color: #059669 !important; }
        .badge.bg-primary { background: #dbeafe !important; color: var(--accent) !important; }
        .badge.bg-danger  { background: #fee2e2 !important; color: #dc2626 !important; }
        .badge.bg-secondary { background: #ede9fe !important; color: #7c3aed !important; }

        /* Formulaires */
        .form-control, .form-select {
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 0.9rem;
            padding: 0.55rem 0.8rem;
            background: #fafbfd;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--text);
            margin-bottom: 0.4rem;
        }

        /* Alertes */
        .alert-success {
            background: #d1fae5;
            border: 1px solid #6ee7b7;
            color: #047857;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Pagination */
        .pagination .page-link {
            border: 1px solid var(--border);
            color: var(--text);
            font-size: 0.85rem;
            border-radius: 6px;
            margin: 0 2px;
        }
        .pagination .page-item.active .page-link {
            background: var(--accent);
            border-color: var(--accent);
        }

        hr {
            border-color: var(--border);
            opacity: 1;
        }

        .container {
            max-width: 1100px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('devices.index') }}">TechStock</a>
            <div class="navbar-nav flex-row">
                <a class="nav-link" href="{{ route('devices.index') }}">Équipements</a>
                <a class="nav-link" href="{{ route('rooms.index') }}">Salles</a>
                <a class="nav-link" href="{{ route('categories.index') }}">Catégories</a>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="content-card">
            @yield('content')
        </div>
    </div>
</body>
</html>
