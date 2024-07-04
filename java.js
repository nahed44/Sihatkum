   // Image sliders
   const imgBar = document.querySelector('.img-bar');
   const nextSlide = document.getElementById('next-slide');
   const prevSlide = document.getElementById('prev-slide');
   let scrollAmount = 0;

   nextSlide.addEventListener('click', () => {
       imgBar.scrollTo({
           top: 0,
           left: (scrollAmount += 500),
           behavior: 'smooth'
       });
       if (scrollAmount >= imgBar.scrollWidth - imgBar.clientWidth) {
           // Reset scrollAmount to start position
           scrollAmount = 0;
       }
   });

   prevSlide.addEventListener('click', () => {
       imgBar.scrollTo({
           top: 0,
           left: (scrollAmount -= 500),
           behavior: 'smooth'
       });
       if (scrollAmount <= 0) {
           // Reset scrollAmount to end position
           scrollAmount = imgBar.scrollWidth - imgBar.clientWidth;
       }
   });


   

// PRODUCT
   const product = document.querySelector('.products-slider');
   const nextslide = document.getElementById('next');
   const prevslide = document.getElementById('prev');
   let scrollamount = 0;

   nextslide.addEventListener('click', () => {
    product.scrollTo({
           top: 0,
           left: (scrollamount += 900),
           behavior: 'smooth'
       });
       if (scrollamount >= product.scrollWidth - product.clientWidth) {
           // Reset scrollAmount to start position
           scrollamount = 0;
       }
   });

   prevslide.addEventListener('click', () => {
    product.scrollTo({
           top: 0,
           left: (scrollamount -= 900),
           behavior: 'smooth'
       });
       if (scrollamount <= 0) {
           // Reset scrollAmount to end position
           scrollamount = product.scrollWidth - product.clientWidth;
       }
   });



// localStorage product
let arr = []
    function addCard(product_id, ele) {
    arr.push(product_id);
    localStorage.setItem('userCart',JSON.stringify(arr));

    let items = JSON.parse(localStorage.getItem('userCart'));
    $('#cart').html(items.length);

    $(ele).attr('disabled','disabled');
}

function getCartItems(){
    let items = JSON.parse(localStorage.getItem('userCart'));
    console.log(product);
}


// Compared.php 
function compare(product_id) {
    fetch('Compared.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'product_id=' + product_id
    })
    .then(response => response.text())
    .then(html => {
        // الكود هنا يقوم بتحديث محتوى div بمعلومات المنتج
        document.getElementById('table-responsive').innerHTML = html;
    })
    .catch(error => console.error('Error:', error));
}

// 




// localStorage compare
let ar = []
    function compare(product_id, el) {
    ar.push(product_id);
    localStorage.setItem('userCompare',JSON.stringify(ar));

    let item = JSON.parse(localStorage.getItem('userCompare'));
    $('#compare_arrows').html(item.length);

    $(el).attr('disabled','disabled');
}

/*let ar = JSON.parse(localStorage.getItem('userCompare')) || [];

function compare(product_id, el) {
    // Check if the product_id is already in the array to avoid duplicates
    if (!ar.includes(product_id)) {
        ar.push(product_id); // Add the new product ID to the array
        localStorage.setItem('userCompare', JSON.stringify(ar)); // Update the local storage

        // Update the UI with the new length of the array
        $('#compare_arrows').html(ar.length);

        // Disable the button to prevent further clicks
        $(el).attr('disabled', 'disabled');
    } else {
        console.log('Product already added for comparison.');
    }
}*/





    
