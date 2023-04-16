let valObj = {
    products: document.getElementById("products"),
    productsWrapper: document.getElementsByClassName("products-item-wrapper")[0],
    priceValue: document.getElementById("price-value"),
    //max&min price
    minPrice: document.getElementById("min-price"),
    maxPrice: document.getElementById("max-price"),
    //under price
    underPrice0: document.getElementById("under-price-0"),//价格小于500
    underPrice1: document.getElementById("under-price-1"),//价格在500-1000
    underPrice2: document.getElementById("under-price-2"),//价格在1000-1500
    //checkbox
    //供应商类型
    supplierType1: document.getElementById("supplier-type-1"),//供应商类型1
    supplierType2: document.getElementById("supplier-type-2"),
    //新旧程度
    condition1: document.getElementById("condition-1"),//新旧程度
    condition2: document.getElementById("condition-2"),

    //result&category
    searchResult: document.getElementById("search-result"),
    category: document.getElementById("category"),
    //默认searchResult和category是不显示的，当有筛选条件时才显示

    //方法
    //删除筛选条件
    delCategory: function (target) {    //调用是方法为：window.valObj.delCategory(event.target)
        console.log(target)
        let tags = valObj.category.dataset.category
        tags = JSON.parse(tags)
        tags = tags.filter(tag => tag !== target.parentElement.children[0].innerText)
        valObj.category.dataset.category = JSON.stringify(tags)
    },
}
//把对象valObj挂载到window对象上，方便在控制台调用
window.valObj = valObj

function delCategory(target){    //调用是方法为：window.valObj.delCategory(event.target)
    console.log(target)
    let tags = valObj.category.dataset.category
    tags = JSON.parse(tags)
    tags = tags.filter(tag => tag !== target.parentElement.children[0].innerText)
    valObj.category.dataset.category = JSON.stringify(tags)
}

function renderSearchResult() {
    let products = valObj.products.dataset.products
    //去重商品filter后计算长度
    let count = [...new Set(JSON.parse(products).map(product => product.id))].length
    //渲染结果
    valObj.searchResult.innerHTML = `为您找到${count}个结果`
}

/**
 * 渲染筛选条件
 */
function renderTags() {
    let tags = valObj.category.dataset.category
    if (tags) {
        tags = JSON.parse(tags)
        valObj.category.classList.remove("d-none")
        //排除重复的筛选条件
        tags = [...new Set(tags)]   //去重
        //渲染筛选条件
        valObj.category.innerHTML = ""  //清空
        tags.forEach(tag => {
            valObj.category.innerHTML += `
               <div class="category-item">
                    <span href="" onclick="
                        let tags = window.valObj.category.dataset.category
                        tags = JSON.parse(tags)
                        tags = tags.filter(tag => tag !== this.parentElement.children[0].innerText)
                        window.valObj.category.dataset.category = JSON.stringify(tags)
                    ">${tag}</span>
                    <box-icon name='x-circle' size="20px" color="#ccc"></box-icon>
                </div>
            `
        })
    }
}

/*
* 渲染产品
 */
function _init_() {
    if (valObj.products.dataset.products) {
        //如果有筛选条件，显示searchResult和category
        valObj.searchResult.classList.remove("d-none")
        valObj.category.classList.remove("d-none")
        //渲染产品
        renderProducts(JSON.parse(valObj.products.dataset.products))
    }
    //渲染筛选条件
    renderTags()
    //渲染searchResult
    renderSearchResult()
}

/*
* 渲染产品
* products:产品数组
 */
function renderProducts(products) {
    //循环products数组,用filter通过id去重
    products = products.filter((product, index, self) => {
        return self.findIndex(t => t.id === product.id) === index
    })
    //渲染产品
    valObj.productsWrapper.innerHTML = ""   //清空
    products.forEach(products => {
        valObj.productsWrapper.innerHTML += `
                        <div class="product-item" onclick="gotoItem(${products.id})">
                            <img src="${products.image}" alt="Product Image"/>
                            <div class="price">$${products.price}</div>
                            <div class="description">
                                ${products.description}
                            </div>
                            <div class="sold">
                                <div class="star">
                                    <box-icon type='solid' name='star' color="white" size="20px"></box-icon>
                                    5.0
                                </div>
                                |
                                <span>100 sold</span>
                                <div class="buy">
                                    <box-icon name='cake' type='solid' color="white" size="20px"></box-icon>
                                </div>
                            </div>
                        </div>
                    `
    })
}

let observerSearch =
    /*
    * 监听data-products属性
     */
    new MutationObserver(mutations => {
        mutations.forEach(mutation => {
            if (mutation.attributeName === 'data-products') {   // 监听data-products属性
                //如果有筛选条件，显示searchResult和category
                valObj.searchResult.classList.remove("d-none")
                valObj.category.classList.remove("d-none")
                //渲染产品
                _init_()
            }
        })
    })
observerSearch.observe(valObj.products, {attributes: true})   // 监听data-products属性
//监听data-category属性
let observerCategory =
    new MutationObserver(mutations => {
        mutations.forEach(mutation => {
            if (mutation.attributeName === 'data-category') {   // 监听data-category属性
                //渲染筛选条件
                renderTags()
            }
        })
    })
observerCategory.observe(valObj.category, {attributes: true})   // 监听data-category属性

