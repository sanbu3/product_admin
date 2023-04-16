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
}


function _init_() {
    if (valObj.products.dataset.products) {
        //如果有筛选条件，显示searchResult和category
        valObj.searchResult.classList.remove("d-none")
        valObj.category.classList.remove("d-none")
        //渲染产品
        renderProducts(JSON.parse(valObj.products.dataset.products))
    }
    //渲染筛选条件1-16 ower 7,000 results for "iphone"
}

function renderProducts(products){
    //渲染产品
    valObj.productsWrapper.innerHTML = ""   //清空
    products.forEach(product => {
        valObj.productsWrapper.innerHTML += `
                        <div class="product-item">
                            <img src="${product.image}" alt="Product Image"/>
                            <div class="price">$${product.price}</div>
                            <div class="description">
                                ${product.description}
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
let observerSearch = new MutationObserver(mutations => {
    mutations.forEach(mutation => {
        if (mutation.attributeName === 'data-products') {   // 监听data-products属性
            _init_()
        }
    })
})
observerSearch.observe(valObj.products, {attributes: true})   // 监听data-products属性
