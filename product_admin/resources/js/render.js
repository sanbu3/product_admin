import axios from "axios"

let productsData = []
let categoriesData = []
const searchBtn = document.querySelector('#search-btn');
const searchInput = document.querySelector('#search-input');

function getProducts() {
    let productsData = []
    let categoriesTags = []
    const searchValue = searchInput.value;
    axios.get('/products/search/' + searchValue)
        .then(res => {
            console.log('res.data:' , res.data)
            let tags = res.data.categoriesTags.map(tag => {
                return tag.category_name
            })
            productsData = res.data.products.map(product => {
                return {
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    image: product.image,
                    description: product.description,
                    category: product.category,
                }
            })
            //数组中是商品对象,去重
            renderResults(productsData, tags)
        })
}

searchBtn.addEventListener('click', getProducts)
//enter键搜索
searchInput.addEventListener('keyup', function (event) {
    if (event.keyCode === 13) {
        getProducts()
        searchInput.blur()
    }
})

function renderResults(products, categories) {
    //判断是否有查询结果,如果有就显示，没有就隐藏
    let result = document.getElementById('search-result')
    if (products.length > 0) {
        result.classList.remove('d-none')
    } else {
        result.classList.add('d-none')
    }
    let childView = document.getElementById('products')
    childView.dataset.products = JSON.stringify(products)   // 把数据存到子视图的data-products属性上
    let category = document.getElementById('category')
    category.dataset.category = JSON.stringify(categories)   // 把数据存到子视图的data-categories属性上
}
