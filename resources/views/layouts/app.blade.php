<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Arsip Surat</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    :root { 
      --sidebar-w: 280px; 
      --primary-color: #4f46e5;
      --primary-light: #eef2ff;
      --bg-color: #f8fafc;
      --card-shadow: 0 4px 20px rgba(0,0,0,.08);
      --border-radius: 16px;
    }
    
    body { 
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      font-family: 'Inter', system-ui, sans-serif;
      min-height: 100vh;
    }
    
    .app-wrap { 
      min-height: 100vh; 
      display: flex;
      backdrop-filter: blur(10px);
    }
    
    .sidebar {
      width: var(--sidebar-w); 
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255,255,255,0.2);
      padding: 24px 20px; 
      position: sticky; 
      top: 0; 
      height: 100vh;
      box-shadow: 4px 0 20px rgba(0,0,0,0.1);
      border-radius: 0 24px 24px 0;
    }
    
    .brand { 
      font-weight: 700; 
      font-size: 24px; 
      margin-bottom: 32px; 
      color: var(--primary-color);
      display: flex;
      align-items: center;
      padding: 16px;
      background: linear-gradient(135deg, var(--primary-color), #6366f1);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    
    .nav-link {
      border-radius: var(--border-radius); 
      padding: 14px 16px; 
      margin-bottom: 8px; 
      color: #475569;
      font-weight: 500;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: 1px solid transparent;
      display: flex;
      align-items: center;
    }
    
    .nav-link:hover { 
      background: linear-gradient(135deg, rgba(79, 70, 229, 0.1), rgba(99, 102, 241, 0.05));
      color: var(--primary-color);
      border-color: rgba(79, 70, 229, 0.2);
      transform: translateX(4px);
      box-shadow: 0 4px 12px rgba(79, 70, 229, 0.15);
    }
    
    .nav-link.active { 
      background: linear-gradient(135deg, var(--primary-color), #6366f1);
      color: white;
      border-color: var(--primary-color);
      box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
    }
    
    .content { 
      flex: 1; 
      padding: 32px;
      background: var(--bg-color);
      border-radius: 24px 0 0 24px;
      margin-left: -24px;
      position: relative;
    }
    
    .content::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(255,255,255,0.8);
      backdrop-filter: blur(10px);
      border-radius: 24px 0 0 24px;
      z-index: -1;
    }
    
    .card { 
      border-radius: var(--border-radius); 
      box-shadow: var(--card-shadow);
      border: 1px solid rgba(255,255,255,0.2);
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(20px);
      transition: all 0.3s ease;
    }
    
    .card:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 40px rgba(0,0,0,0.12);
    }
    
    .card-title {
      color: #1e293b;
      font-weight: 700;
      font-size: 1.5rem;
    }
    
    .btn-primary {
      background: linear-gradient(135deg, var(--primary-color), #6366f1);
      border: none;
      border-radius: 12px;
      font-weight: 600;
      padding: 10px 20px;
      transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
      background: linear-gradient(135deg, #3730a3, var(--primary-color));
    }
    
    .btn-outline-primary {
      color: var(--primary-color);
      border-color: var(--primary-color);
      border-radius: 12px;
      font-weight: 600;
      background: rgba(79, 70, 229, 0.05);
      transition: all 0.3s ease;
    }
    
    .btn-outline-primary:hover {
      background: var(--primary-color);
      border-color: var(--primary-color);
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
    }
    
    .btn-xs { 
      padding: 8px 12px; 
      font-size: 0.8rem; 
      border-radius: 8px; 
      font-weight: 500;
    }
    
    .form-control, .form-select {
      border-radius: 12px;
      border: 2px solid #e2e8f0;
      padding: 12px 16px;
      transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }
    
    .table {
      border-radius: 12px;
      overflow: hidden;
      background: rgba(255,255,255,0.9);
    }
    
    .table-light {
      background: linear-gradient(135deg, #f8fafc, #e2e8f0);
    }
    
    .alert {
      border-radius: 12px;
      border: none;
      backdrop-filter: blur(10px);
    }
    
    .alert-success {
      background: rgba(34, 197, 94, 0.1);
      color: #166534;
      border-left: 4px solid #22c55e;
    }
    
    .create-btn {
      background: linear-gradient(135deg, #10b981, #059669);
      border: none;
      border-radius: 16px;
      color: white;
      font-weight: 600;
      padding: 16px 24px;
      box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      text-decoration: none;
      display: inline-flex;
      align-items: center;
    }
    
    .create-btn:hover {
      background: linear-gradient(135deg, #059669, #047857);
      transform: translateY(-2px);
      box-shadow: 0 12px 35px rgba(16, 185, 129, 0.5);
      color: white;
    }
    
    @media (max-width: 992px) {
      .sidebar { 
        position: static; 
        height: auto; 
        width: 100%; 
        border-radius: 0;
        margin: 0;
      }
      .app-wrap { 
        display: block; 
      }
      .content {
        border-radius: 0;
        margin-left: 0;
        padding: 20px;
      }
    }
  </style>
</head>
<body>

<div class="app-wrap">
  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="brand">
      <i class="bi bi-archive-fill text-primary me-2"></i>Arsip Surat
    </div>
    <nav class="nav flex-column">
      <a class="nav-link {{ request()->routeIs('surat.*') ? 'active' : '' }}" href="{{ route('surat.index') }}">
        <i class="bi bi-folder-fill me-2"></i> Arsip
      </a>
      <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
        <i class="bi bi-tags-fill me-2"></i> Kategori Surat
      </a>
      <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
        <i class="bi bi-info-circle-fill me-2"></i> About
      </a>
    </nav>

    <div class="mt-4">
      <a class="create-btn w-100 text-center" href="{{ route('surat.create') }}">
        <i class="bi bi-plus-circle me-2"></i> Arsipkan Surat
      </a>
    </div>
  </aside>

  <!-- Main content -->
  <main class="content">
    @if(session('ok'))
      <div class="alert alert-success small">{{ session('ok') }}</div>
    @endif
    @yield('content')
  </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
