<!DOCTYPE html>
<html lang="">
<head>
    <title>后台管理</title>
    <!-- 使用常量定义页面标题 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    @vite('resources/css/admin/index.css')
</head>
<body>
<header class="page-header">
    <h1>后台管理</h1>
    <nav>
        <ul class="navigation-menu">
            <li><a href="{{ route('home.index') }}">产品首页</a></li>
            <li><a href="#">待加功能</a></li>
            <li><a href="#">待加功能</a></li>
            <li><a href="{{ route('logout') }}">退出登录</a></li>
        </ul>
    </nav>
</header>
<main>
    <section class="statistics">
        <!-- 使用常量定义统计信息标题 -->
        <div class="statistics-item">
            <h2>订单数量</h2>
            <p id="order-count" class="count" data-count="4210"></p>
        </div>
        <div class="statistics-item">
            <h2>用户数量</h2>
            <p id="user-count" class="count" data-count="8000"></p>
        </div>
    </section>
    <script>
        /**
         * countUp函数用于从0开始不断增大文本内的数字值,直到达到指定目标数字。
         * @author: sanbu.wang
         * @param selector
         * @param target
         * @param incrementTime
         */
        function countUp(selector, target, incrementTime) {
            // 获取数字文本元素
            const count = document.querySelector(selector);
            //设置初始值    0
            count.textContent = 0;

            // 目标数字
            const targetNum = target;

            // 每秒增加的数量
            const inc = targetNum / 100 / incrementTime;

            // 计数器
            let current = 0;

            // 定时器
            const timer = setInterval(() => {
                current += inc;
                count.textContent = Math.floor(current);

                if (current >= targetNum) {
                    count.textContent = targetNum;
                    clearInterval(timer);
                }
            }, incrementTime);
        }
        //#user-count和#order-count
        countUp('#user-count', Math.floor(document.querySelector('#user-count').dataset.count), 2);
        countUp('#order-count', Math.floor(document.querySelector('#order-count').dataset.count), 1);
    </script>
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
    <script>

    </script>
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
