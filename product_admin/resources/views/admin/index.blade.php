<!DOCTYPE html>
<html>
<head>
    <title>后台管理</title>
    <!-- 使用常量定义页面标题 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- 引入 ECharts 库 -->
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    @vite('resources/css/admin/index.css')
</head>
<body>
<header class="page-header">
    <!-- 使用常量定义页面标题 -->
    <h1>后台管理</h1>
    <nav>
        <ul class="navigation-menu">
            <li><a href="#">功能1</a></li>
            <li><a href="#">功能2</a></li>
            <li><a href="#">功能3</a></li>
            <li><a href="#">功能4</a></li>
        </ul>
    </nav>
    <!-- 使用常量定义欢迎信息 -->
    <p class="welcome-message">欢迎管理员<a href="#">
            {{ Auth::user()->name}}
        </a>登录</p>
</header>
<main>
    <section class="statistics">
        <!-- 使用常量定义统计信息标题 -->
        <div class="statistics-item">
            <h2>订单数量</h2>
            <p id="order-count"></p>
        </div>
        <div class="statistics-item">
            <h2>用户数量</h2>
            <p id="user-count"></p>
        </div>
    </section>
    <div class="chart-container">
        <!-- 新增代码 -->
        <div class="chart-item">
            <h2>订单数量变化趋势</h2>
            <div class="chart" id="order-chart"></div>
        </div>
        <div class="chart-item">
            <h2>用户数量变化趋势</h2>
            <div class="chart" id="user-chart"></div>
        </div>
    </div>
</main>
<script>
    // 模拟数据
    const orderData = [
        {date: '2023-01-01', count: 10},
        {date: '2023-02-01', count: 20},
        {date: '2023-03-01', count: 30},
        {date: '2023-04-01', count: 40},
    ];
    const userData = [
        {date: '2023-01-01', count: 50},
        {date: '2023-02-01', count: 80},
        {date: '2023-03-01', count: 120},
        {date: '2023-04-01', count: 150},
    ];

    // 渲染统计信息
    document.getElementById('order-count').textContent = orderData[orderData.length - 1].count;
    document.getElementById('user-count').textContent = userData[userData.length - 1].count;

    // 渲染图表
    const orderChart = echarts.init(document.getElementById('order-chart'));
    const userChart = echarts.init(document.getElementById('user-chart'));

    option = {
        color: ['#3398DB'],
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            },
            backgroundColor: '#fff',
            textStyle: {
                color: '#000',
                fontFamily: 'Arial, sans-serif',
                fontSize: 14,
                lineHeight: 20,
            },
            extraCssText: 'box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);',
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [
            {
                type: 'category',
                data: orderData.map(item => item.date),
                axisTick: {
                    alignWithLabel: true
                },
                axisLabel: {
                    color: '#fff',
                    fontFamily: 'Arial, sans-serif',
                    fontSize: 14,
                },
                axisLine: {
                    lineStyle: {
                        color: '#fff'
                    }
                }
            }
        ],
        yAxis: [
            {
                type: 'value',
                axisLabel: {
                    color: '#fff',
                    fontFamily: 'Arial, sans-serif',
                    fontSize: 14,
                },
                axisLine: {
                    lineStyle: {
                        color: '#fff'
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#fff'],
                        opacity: 0.3
                    }
                }
            }
        ],
        series: [
            {
                name: '订单数量',
                type: 'bar',
                barWidth: '40%',
                data: orderData.map(item => item.count)
            }
        ]
    };
    userOption = {
        color: ['#37a2da'],
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [
            {
                type: 'category',
                data: userData.map(item => item.date),
                axisTick: {
                    alignWithLabel: true
                },
                axisLabel: {
                    color: '#fff'
                },
                axisLine: {
                    lineStyle: {
                        color: '#fff'
                    }
                }
            }
        ],
        yAxis: [
            {
                type: 'value',
                axisLabel: {
                    color: '#fff'
                },
                axisLine: {
                    lineStyle: {
                        color: '#fff'
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#fff']
                    }
                }
            }
        ],
        series: [
            {
                name: '用户数量',
                type: 'line',
                data: userData.map(item => item.count),
                smooth: true,
                symbol: 'circle',
                symbolSize: 10,
                lineStyle: {
                    color: '#37a2da',
                    width: 3
                },
                itemStyle: {
                    color: '#37a2da',
                    borderColor: '#37a2da',
                    borderWidth: 2
                }
            }
        ]
    };
    orderChart.setOption(option);
    userChart.setOption(userOption);
</script>
<script>
    const menuItems = document.querySelectorAll('.navigation-menu li');
    menuItems.forEach(item => {
        item.addEventListener('click', () => {
            // Remove class from all items
            menuItems.forEach(item => item.classList.remove('selected'));
            // Add class to clicked item
            item.classList.add('selected');
        });
    });
    const orderCount = document.getElementById('order-count');
    const userCount = document.getElementById('user-count');

    // Add loading spinner to statistics items
    orderCount.parentNode.classList.add('loading');
    userCount.parentNode.classList.add('loading');

    // Fetch data and update statistics items
    fetch('/api/stats')
        .then(response => response.json())
        .then(data => {
            orderCount.textContent = data.orderCount;
            userCount.textContent = data.userCount;
            // Remove loading spinner
            orderCount.parentNode.classList.remove('loading');
            userCount.parentNode.classList.remove('loading');
        })
        .catch(error => console.error(error));
    const orderChart = echarts.init(document.getElementById('order-chart'));
    const userChart = echarts.init(document.getElementById('user-chart'));

    // Add click event listener to charts
    orderChart.on('click', params => {
        alert(`Clicked on data point: ${params.value}`);
    });

    userChart.on('click', params => {
        alert(`Clicked on data point: ${params.value}`);
    });
</script>
</body>
</html>
