let indexProductPage = 0;

const products = [
    {
        image: 'images/cap.jpg',
        name: 'Cap-GP Replica 23 EB23',
        category: 'Cap',
        price: '$49.00'
    },
    {
        image: 'images/Fabric trousers-Strada C5.webp',
        name: 'Fabric Strada C5',
        category: 'Trousers',
        price: '$699.00'
    },
    {
        image: 'images/Sport-touring boots-Speed Evo WP C2.webp',
        name: 'Sport-touring Evo WPC2',
        category: 'Boots',
        price: '$499.00'
    },
];

buildProduct();

function buildProduct() {
    let html = ``;

    products.forEach((product) => {
        html += `<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="shop-single.php"><img src="${product.image}" alt="Product Image" class="img-fluid" /></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="shop-single.php">${product.name}</a></h3>
                        <p class="mb-0">${product.category}</p>
                        <p class="text-primary font-weight-bold">${product.price}</p>
                    </div>
                    </div>
                </div>`;
    });

    document.getElementById('list-product').innerHTML = html;

    console.log(html);
}