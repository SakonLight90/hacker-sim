<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Hacker Sim - Terminale</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background: #181818;
            color: #39FF14;
            font-family: 'Fira Mono', 'Consolas', monospace;
            margin: 0;
            padding: 0;
        }
        .terminal {
            max-width: 900px;
            margin: 40px auto;
            background: #222;
            border-radius: 8px;
            box-shadow: 0 0 10px #111;
            padding: 32px;
        }
        .prompt {
            color: #39FF14;
        }
        .sidebar {
            float: left;
            width: 180px;
            margin-right: 24px;
        }
        .content {
            margin-left: 200px;
        }
        a, a:visited {
            color: #00bfff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .status-bar {
            background: #161616;
            padding: 6px 12px;
            border-radius: 4px;
            margin-bottom: 12px;
        }
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
    @yield('head')
</head>
<body>
    <div class="terminal clearfix">
        <div class="sidebar">
            <b>Menu</b>
            <ul>
                <li><a href="/console">Console</a></li>
                <li><a href="/attacchi">Attacchi</a></li>
                <li><a href="/upgrade">Upgrade</a></li>
                <li><a href="/log">Log</a></li>
                <li><a href="/clan">Clan</a></li>
                <li><a href="/adware">AdWare</a></li>
            </ul>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
