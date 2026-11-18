<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"
      href="{{ asset('images/nesostar-logo.png') }}?v=2">

<link rel="icon" type="image/png" sizes="192x192"
      href="{{ asset('images/nesostar-logo.png') }}?v=2">

<link rel="apple-touch-icon"
      href="{{ asset('images/nesostar-logo.png') }}?v=2">
    <title>Administrator Dashboard | Nesostar</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            background: #f4f6fa;
            color: #172033;
            font-family: 'DM Sans', sans-serif;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            padding: 27px 19px;
            background: #14243e;
            color: #fff;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 9px 30px;
            border-bottom: 1px solid rgba(255,255,255,.12);
        }

        .brand img {
            width: 43px;
            height: 43px;
            object-fit: contain;
            background: #fff;
            border-radius: 8px;
        }

        .brand strong {
            display: block;
            font-family: 'Manrope', sans-serif;
            font-size: 19px;
        }

        .brand span {
            color: #aab7ca;
            font-size: 11px;
        }

        .nav-label {
            margin: 30px 10px 12px;
            color: #8292aa;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 6px;
            padding: 12px 13px;
            border-radius: 8px;
            color: #c7d1df;
            font-size: 13px;
            text-decoration: none;
        }

        .nav-link.active,
        .nav-link:hover {
            background: #263e61;
            color: #fff;
        }

        .nav-link.active {
            font-weight: 700;
        }

        .sidebar-bottom {
            position: absolute;
            right: 19px;
            bottom: 25px;
            left: 19px;
        }

        .sidebar-bottom a {
            display: block;
            padding: 11px 13px;
            color: #c7d1df;
            font-size: 13px;
            text-decoration: none;
        }

        .main {
            min-height: 100vh;
            margin-left: 250px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 82px;
            padding: 18px 35px;
            background: #fff;
            border-bottom: 1px solid #e8ebf1;
        }

        .topbar h1 {
            font-family: 'Manrope', sans-serif;
            font-size: 21px;
            font-weight: 800;
        }

        .topbar p {
            margin-top: 4px;
            color: #8490a2;
            font-size: 12px;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .avatar {
            display: grid;
            width: 39px;
            height: 39px;
            place-items: center;
            border-radius: 50%;
            background: #e7eefb;
            color: #244a80;
            font-weight: 800;
        }

        .admin-info strong {
            display: block;
            font-size: 12px;
        }

        .admin-info span {
            color: #8792a3;
            font-size: 11px;
        }

        .content {
            padding: 32px 35px;
        }

        .welcome {
            margin-bottom: 27px;
        }

        .welcome h2 {
            font-family: 'Manrope', sans-serif;
            font-size: 23px;
            font-weight: 800;
        }

        .welcome p {
            margin-top: 7px;
            color: #7d899b;
            font-size: 13px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 19px;
            margin-bottom: 28px;
        }

        .stat-card {
            padding: 23px;
            background: #fff;
            border: 1px solid #e8ebf1;
            border-radius: 13px;
        }

        .stat-label {
            color: #7e899a;
            font-size: 12px;
            font-weight: 600;
        }

        .stat-number {
            margin-top: 13px;
            font-family: 'Manrope', sans-serif;
            font-size: 31px;
            font-weight: 800;
        }

        .stat-description {
            margin-top: 5px;
            color: #9aa3b1;
            font-size: 11px;
        }

        .section-card {
            padding: 25px;
            background: #fff;
            border: 1px solid #e8ebf1;
            border-radius: 13px;
        }

        .section-card h3 {
            margin-bottom: 8px;
            font-family: 'Manrope', sans-serif;
            font-size: 16px;
        }

        .section-card > p {
            color: #7e899a;
            font-size: 13px;
            line-height: 1.7;
        }

        .modules {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-top: 22px;
        }

        .module {
            padding: 17px;
            border: 1px solid #e9edf3;
            border-radius: 9px;
        }

        .module strong {
            display: block;
            margin-bottom: 5px;
            font-size: 13px;
        }

        .module span {
            color: #8994a5;
            font-size: 11px;
            line-height: 1.6;
        }

        .logout-button {
            width: 100%;
            margin-top: 8px;
            padding: 11px 13px;
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 8px;
            background: transparent;
            color: #e0e7f0;
            font: inherit;
            font-size: 13px;
            text-align: left;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #263e61;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                position: relative;
                width: 100%;
                padding: 17px;
            }

            .brand {
                padding-bottom: 15px;
            }

            .nav-label {
                margin-top: 17px;
            }

            .sidebar-bottom {
                position: static;
                margin-top: 15px;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                padding: 17px 20px;
            }

            .content {
                padding: 24px 18px;
            }

            .stats,
            .modules {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">
            <img src="{{ asset('images/nesostar-logo.png') }}" alt="Nesostar logo">
            <div>
                <strong>Nesostar</strong>
                <span>Administration</span>
            </div>
        </div>

        <div class="nav-label">Main Menu</div>

        <a href="{{ route('admin.dashboard') }}" class="nav-link active">
            <span>▦</span> Dashboard
        </a>

        <div class="nav-label">Website Management</div>

       <a href="{{ route('admin.inquiries.index') }}" class="nav-link">
       <span>▤</span> Inquiries
       </a>

      <a href="{{ route('admin.applications.index') }}" class="nav-link">
      <span>▣</span> Developer Applications
       </a>

        <a href="{{ route('admin.content.index') }}" class="nav-link">
            <span>◈</span> Website Content
        </a>

        <a href="{{ route('admin.settings.index') }}" class="nav-link">
            <span>⚙</span> Settings
        </a>

        <div class="sidebar-bottom">
            <a href="{{ route('home') }}">← View Public Website</a>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="logout-button">
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <h1>Administrator Dashboard</h1>
                <p>Manage your Nesostar website</p>
            </div>

            <div class="admin-info">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <strong>{{ auth()->user()->name }}</strong>
                    <span>Administrator</span>
                </div>
            </div>
        </header>

        <section class="content">

            <div class="welcome">
                <h2>Welcome, {{ auth()->user()->name }}</h2>
                <p>Here is an overview of your website administration.</p>
            </div>

            <div class="stats">

                <div class="stat-card">
                    <div class="stat-label">Total Inquiries</div>
                    <div class="stat-number">{{ $inquiryCount }}</div>
                    <div class="stat-description">Contact messages received</div>
                </div>

                <div class="stat-card">
                    <div class="stat-label">Developer Applications</div>
                    <div class="stat-number">{{ $applicationCount }}</div>
                    <div class="stat-description">Applications submitted</div>
                </div>

                <div class="stat-card">
                    <div class="stat-label">Registered Users</div>
                    <div class="stat-number">{{ $userCount }}</div>
                    <div class="stat-description">Non-administrator accounts</div>
                </div>

            </div>

            <div class="section-card">
                <h3>Website Management</h3>
                <p>
                    Your administrator portal is the central place for
                    managing website activity and information.
                </p>

                <div class="modules">
<a href="{{ route('admin.inquiries.index') }}"
   class="module"
   style="display:block;color:inherit;text-decoration:none;">

    <strong>Inquiries Management</strong>

    <span>Review and manage messages submitted through the contact page.</span>

</a>

                    <div class="module">
                        <a href="{{ route('admin.applications.index') }}" style="display:block;color:inherit;text-decoration:none;">
                            <strong>Developer Applications</strong>
                            <span>Review applications submitted through the developer program.</span>
                        </a>
                    </div>

                    <div class="module">
                        <a href="{{ route('admin.content.index') }}" style="display:block;color:inherit;text-decoration:none;">
                            <strong>Website Content</strong>
                            <span>Manage website pages, services and public information.</span>
                        </a>
                    </div>

                    <div class="module">
                        <a href="{{ route('admin.settings.index') }}" style="display:block;color:inherit;text-decoration:none;">
                            <strong>Administrator Settings</strong>
                            <span>Manage administrative access and website configuration.</span>
                        </a>
                    </div>
                </div>
            </div>

        </section>
    </main>

</body>
</html>
