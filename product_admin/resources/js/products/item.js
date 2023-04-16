const mainImage = document.querySelector('.col1__image-main');
const thumbnails = document.querySelectorAll('.col1__thumbnails-item');
const autoplayInterval = 3000; // 自动轮播时间间隔，单位为毫秒

let currentSlide = 0;
let autoplayTimer = null;

function playSlide(index) {
    // 切换大图和小图的选中状态
    mainImage.src = thumbnails[index].src;
    thumbnails.forEach(thumbnail => thumbnail.classList.remove('active'));
    thumbnails[index].classList.add('active');
    currentSlide = index;
}

function nextSlide() {
    // 播放下一张图片，如果已经到最后一张，则返回第一张
    if (currentSlide === thumbnails.length - 1) {
        playSlide(0);
    } else {
        playSlide(currentSlide + 1);
    }
}

function startAutoplay() {
    // 启动自动轮播
    autoplayTimer = setInterval(() => {
        nextSlide();
    }, autoplayInterval);
}

function stopAutoplay() {
    // 停止自动轮播
    clearInterval(autoplayTimer);
}

// 给小图添加点击事件，点击后播放对应的大图
thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
        playSlide(index);
        stopAutoplay();
    });
});

// 给大图添加鼠标悬浮和移开事件，悬浮时停止自动轮播，移开时继续自动轮播
mainImage.addEventListener('mouseover', stopAutoplay);
mainImage.addEventListener('mouseout', startAutoplay);

// 启动自动轮播
startAutoplay();

// 给正在播放的小图添加 #ea732e 边框样式
thumbnails[currentSlide].classList.add('active');

// 价格计算
const quantityInput = document.querySelector('.box2 input');
const priceSpan = document.querySelector('.price-message-box span');
const price = parseFloat('{{ $product->price }}');


//地区选择
// 获取 DOM 元素
const areaList = ['四川', '重庆', '北京', '上海', '广东', '江苏', '浙江', '湖北', '湖南', '河南', '河北', '山东', '山西', '陕西', '福建', '安徽', '江西', '广西', '海南', '云南', '贵州', '甘肃', '青海', '内蒙古', '黑龙江', '吉林', '辽宁', '西藏', '新疆', '宁夏', '香港', '澳门', '台湾'];
const specialAreaList = ['新疆', '西藏', '内蒙古', '宁夏', '广西', '香港', '澳门', '台湾'];
const selectContainer = document.querySelector('.select-container');
const selectBox = document.querySelector('.select-box');
const inputBox = document.querySelector('.select-box input');
const dropdownList = document.querySelector('.dropdown-list');

// 生成省份下拉列表
areaList.forEach(area => {
    const listItem = document.createElement('li');
    listItem.classList.add('dropdown-item');
    listItem.textContent = area;
    dropdownList.appendChild(listItem);
});

// 当下拉列表中的项被点击时更新输入框的值
dropdownList.addEventListener('click', event => {
    const target = event.target;
    if (target.classList.contains('dropdown-item')) {
        inputBox.value = target.textContent;
        dropdownList.style.display = 'none';
    }
});

// 当输入框获得焦点时显示下拉列表
inputBox.addEventListener('focus', () => {
    dropdownList.style.display = 'block';
});

// 当输入框失去焦点时隐藏下拉列表
inputBox.addEventListener('blur', () => {
    setTimeout(() => {
        dropdownList.style.display = 'none';
    }, 200);
});

// 当输入框的值改变时过滤下拉列表
inputBox.addEventListener('input', () => {
    const inputValue = inputBox.value.trim().toLowerCase();
    const filteredList = areaList.filter(area => {
        return area.toLowerCase().startsWith(inputValue);
    });

    // 清空下拉列表
    dropdownList.innerHTML = '';

    // 生成匹配项的下拉列表
    filteredList.forEach(area => {
        const listItem = document.createElement('li');
        listItem.classList.add('dropdown-item');
        listItem.textContent = area;
        dropdownList.appendChild(listItem);
    });

    // 如果输入框的值匹配特殊省份，则改变输入框的样式
    if (specialAreaList.includes(inputValue)) {
        selectBox.classList.add('special');
    } else {
        selectBox.classList.remove('special');
    }
});

//评论区加载动画
