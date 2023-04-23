<!DOCTYPE html>
<html>
<head>
    <title>产品管理</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --primary-color: #5ABC68;
            --secondary-color: #F5AE3E;
            --border-color: #E6E6E6;
            --text-color: #333;
            --transition: all 0.3s ease;
        }

        /* 页头样式 */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .page-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            color: var(--text-color);
        }

        .navigation-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navigation-menu li {
            margin-right: 20px;
        }

        .navigation-menu li:last-child {
            margin-right: 0;
        }

        .navigation-menu a {
            display: block;
            padding: var(--search-btn-padding);
            font-size: 16px;
            font-weight: bold;
            color: var(--text-color);
            text-decoration: none;
            border-radius: var(--border-radius);
            transition: background-color var(--transition);
        }

        .navigation-menu a:hover {
            background-color: var(--secondary-color);
        }

        .navigation-menu li:hover a {
            background-color: #f5f5f5;
            color: #333;
        }

        .welcome-message {
            margin: 0;
            font-size: var(--not-imoportant-font-size);
            color: var(--not-important-color);
        }

        .welcome-message a {
            color: var(--text-color);
            text-decoration: none;
            font-weight: bold;
        }

        /* 主体部分样式 */
        main {
            padding: 20px;
            background-color: #f5f5f5;
        }

        .statistics {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .statistics-item {
            flex: 1;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: var(--border-radius);
            padding: 20px;
            text-align: center;
        }

        .statistics-item h2 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
            color: var(--text-color);
        }

        .statistics-item p {
            margin: 10px 0 0;
            font-size: 24px;
            font-weight: bold;
            color: var(--text-color);
        }

        .statistics-item.loading::before {
            content: '';
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #ccc;
            border-top-color: #333;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .chart-container {
            display: flex;
            justify-content: space-between;
        }

        .chart-item {
            flex: 1;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: var(--border-radius);
            padding: 20px;
        }

        .chart-item h2 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
            color: var(--text-color);
        }

        .chart {
            height: 300px;
            background-color: #f5f5f5;
            border-radius: var(--border-radius);
        }
    </style>
</head>
<body>
<header class="page-header">
    <h1>产品管理</h1>
    <nav>
        <ul class="navigation-menu">
            <li><a href="#">首页</a></li>
            <li><a href="#">产品列表</a></li>
            <li><a href="#">添加产品</a></li>
            <li><a href="#">退出</a></li>
        </ul>
    </nav>
</header>
<main>
    <div class="statistics">
        <div class="statistics-item">
            <h2>总产品数</h2>
            <p>100</p>
        </div>
        <div class="statistics-item">
            <h2>总销售额</h2>
            <p>10000</p>
        </div>
        <div class="statistics-item">
            <h2>总利润</h2>
            <p>5000</p>
        </div>
    </div>
    <div class="chart-container">
        <div class="chart-item">
            <h2>销售额走势图</h2>
            <canvas id="salesChart"></canvas>
        </div>
        <div class="chart-item">
            <h2>利润走势图</h2>
            <canvas id="profitChart"></canvas>
        </div>
    </div>
    <script>
        const salesChartData = {
            // 销售额走势图的数据
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: '销售额',
                    data: [20000, 30000, 40000, 35000, 32000, 38000, 42000, 45000, 48000, 51000, 55000, 60000],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true
                }
            ]
        };

        const profitChartData = {
            // 利润走势图的数据
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: '毛利润',
                    data: [8000, 10000, 12000, 10000, 9000, 11000, 13000, 14000, 15000, 16000, 18000, 20000],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true
                },
                {
                    label: '净利润',
                    data: [5000, 7000, 9000, 8000, 7000, 9000, 11000, 12000, 13000, 14000, 15000, 17000],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true
                }
            ]
        };

        // 创建销售额走势图
        const salesChart = new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: salesChartData,
            options: {
                responsive: true
            }
        });

        // 创建利润走势图
        const profitChart = new Chart(document.getElementById('profitChart'), {
            type: 'line',
            data: profitChartData,
            options: {
                responsive: true
            }
        });
    </script>
</main>
<footer class="welcome-message">
    <p>欢迎来到产品管理系统，您可以 <a href="#">查看产品列表</a> 或 <a href="#">添加新产品</a></p>
</footer>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
