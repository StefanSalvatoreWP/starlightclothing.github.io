  // JavaScript to handle the dropdown functionality
  var userContainer = document.querySelector('.userContainer');
  userContainer.addEventListener('click', function() {
      userContainer.classList.toggle('show');
  });

  // Close the dropdown menu if the user clicks outside of it
  document.addEventListener('click', function(event) {
      if (!userContainer.contains(event.target)) {
          userContainer.classList.remove('show');
      }
  });

//   ========= check box ================// 

  var checkboxes = document.querySelectorAll(".selectSidebar input[type='checkbox']");

  checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener("change", function() {
      var listItem = this.parentNode;
      listItem.classList.toggle("checked");
    });
  });

// LIMIT THE CHECKBOX //

  var uls = document.querySelectorAll(".sideBar ul");

  uls.forEach(function(ul) {
    var checkboxes = ul.querySelectorAll(".selectSidebar input[type='checkbox']");

    checkboxes.forEach(function(checkbox) {
      checkbox.addEventListener("change", function() {
        checkboxes.forEach(function(otherCheckbox) {
          if (otherCheckbox !== checkbox) {
            otherCheckbox.checked = false;
          }
        });
      });
    });
  });

  // STYLE CHANGE FOR productlist //

  function changeStyle(element) {
    var productItems = document.getElementsByClassName("productList");
    
    // Remove the 'active' class from all items
    for (var i = 0; i < productItems.length; i++) {
      productItems[i].classList.remove("active");
    }
    
    // Add the 'active' class to the clicked item
    element.parentNode.classList.add("active");
  }
  

  // CHANGE STYLE FOR CONTAINER in selectproductContainer //

  function changeStyle(element, product) {
    var productItems = document.getElementsByClassName("productList");
    var selectProductContainer = document.getElementById("selectedProduct");

    // Remove the 'active' class from all items
    for (var i = 0; i < productItems.length; i++) {
      productItems[i].classList.remove("active");
    }

    // Add the 'active' class to the clicked item
    element.parentNode.classList.add("active");

    // Update the content of the selectproductContainer
    selectProductContainer.innerText = product;

    if (product === "Popular") {
      selectProductContainer.innerHTML = "<img class='popularImg' src='../img/3736.jpg' alt='Popular Product Image'><br>Popular Product";
    }
  }

  // CLICK AND SHOW THE PREVIEW //

 // Get all the product items
const productItems = document.querySelectorAll('.selectproductContainer li');

// Get the previews container
const previewsContainer = document.getElementById('previewsContainer');

// Add a click event listener to each product item
productItems.forEach((item) => {
  item.addEventListener('click', showProductPreview);
});

// Function to show the product preview
function showProductPreview(event) {
  // Get the clicked item
  const clickedItem = event.currentTarget;

  // Get the product information from the clicked item
  let productImg = clickedItem.querySelector('.productImg')?.src;
  if (!productImg) {
    productImg = clickedItem.querySelector('.productImgQualityChange').src;
  }

  const productName = clickedItem.querySelector('h2').textContent;
  const productPrice = clickedItem.querySelector('.productPrice').textContent;

  // Set the product information in the preview container
  const previewsImg = previewsContainer.querySelector('.previewsImg');
  previewsImg.src = productImg;
  previewsImg.alt = productName;

  const previewsDescription = previewsContainer.querySelector('.productDescription');
  previewsDescription.querySelector('h3').textContent = productName;
  previewsDescription.querySelector('.productpreviewPrice').textContent = productPrice;

  // Remove the "active" class from all product items
  productItems.forEach((item) => {
    item.classList.remove('active');
  });

  // Add the "active" class to the clicked item
  clickedItem.classList.add('active');

  // Show/hide the preview container based on whether any item is clicked
  previewsContainer.style.display = 'block';
}

// Hide the preview container initially
previewsContainer.style.display = 'none';


  // SIZE SELECTOR JS //

// Get all the elements with the class name 'selectedsizeContainer'
const sizeContainers = document.querySelectorAll('.selectedsizeContainer');

// Attach a click event listener to each sizeContainer
sizeContainers.forEach(container => {
  container.addEventListener('click', function() {
    // Remove the 'active' class from all sizeContainers
    sizeContainers.forEach(container => {
      container.classList.remove('active');
    });

    // Add the 'active' class to the clicked sizeContainer
    this.classList.add('active');
  });
});

// BACKEND FOR ADD TO CART //

// JavaScript code
const descriptionTab = document.querySelector('.description');
const reviewsTab = document.querySelector('.reviews');
const descriptionContainer = document.querySelector('.descriptionContainer');
const userReviewsContainer = document.querySelector('.userReviewsContainer');
let selectedProduct = {}; // Variable to store the selected product information

// Function to update the selected product information
function updateSelectedProduct(name, price, size) {
  selectedProduct.name = name;
  selectedProduct.price = price;
  selectedProduct.size = size;
}

// DESCRIPTION AND REVIEWS //

descriptionTab.addEventListener('click', () => {
  descriptionContainer.classList.add('show');
  userReviewsContainer.classList.remove('show');

  descriptionTab.classList.add('active');
  reviewsTab.classList.remove('active');
});

reviewsTab.addEventListener('click', () => {
  descriptionContainer.classList.remove('show');
  userReviewsContainer.classList.add('show');

  reviewsTab.classList.add('active');
  descriptionTab.classList.remove('active');
});

// Event listener for clicking on a product container
const productContainers = document.querySelectorAll('.selectproductContainer li');
productContainers.forEach((container) => {
  container.addEventListener('click', () => {
    // Add code to show the descriptionContainer and hide the userReviewsContainer
    descriptionContainer.classList.add('show');
    userReviewsContainer.classList.remove('show');

    // Add code to update the active tab
    descriptionTab.classList.add('active');
    reviewsTab.classList.remove('active');

    // Add code to update the selected product information
    const productName = container.querySelector('h2').textContent;
    const productPrice = container.querySelector('.productPrice').textContent;
    updateSelectedProduct(productName, productPrice, null);

    // Add code to update the input values
    const form = document.querySelector('.cartContainerForm');
    // Remove any previously added hidden inputs
    const existingHiddenInputs = form.querySelectorAll('input[type="hidden"]');
    existingHiddenInputs.forEach((input) => {
      input.remove();
    });

    // Create new hidden inputs with the updated values
    const productNameInput = document.createElement('input');
    productNameInput.type = 'hidden';
    productNameInput.name = 'product_name';
    productNameInput.value = selectedProduct.name;

    const priceInput = document.createElement('input');
    priceInput.type = 'hidden';
    priceInput.name = 'price';
    priceInput.value = selectedProduct.price;

    // Add the new hidden inputs to the form
    form.appendChild(productNameInput);
    form.appendChild(priceInput);

    // Show the size options and update the selected size
    const sizeOptions = container.querySelectorAll('.sizeOption');
    sizeOptions.forEach((option) => {
      option.addEventListener('click', () => {
        // Remove the previously selected size class
        const previousSelectedSize = document.querySelector('.sizeContainer.selected');
        if (previousSelectedSize) {
          previousSelectedSize.classList.remove('selected');
        }

        // Add the selected size class
        option.parentNode.classList.add('selected');

        // Update the selected product information with the size
        const selectedSize = option.textContent;
        selectedProduct.size = selectedSize;

        // Update the hidden size input value
        const sizeInput = document.querySelector('input[name="size"]');
        if (sizeInput) {
          sizeInput.value = selectedSize;
        }

        // Perform any additional actions based on the selected product with size
        console.log(selectedProduct); // Example: Output the selected product information with size
      });
    });

    // Submit the form
    // form.submit();
  });
});

// =========== SEARCH PRODUCT ====================//
function searchProduct() {
  var input, filter, ul, li, productName, i;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  ul = document.getElementsByClassName("selectproductContainer");

  // Loop through each ul element
  for (i = 0; i < ul.length; i++) {
      li = ul[i].getElementsByTagName("ul");
      
      // Loop through all list items within the current ul
      for (var j = 0; j < li.length; j++) {
          productName = li[j].getElementsByClassName("productName")[0];
          
          if (productName) {
              var txtValue = productName.textContent || productName.innerText;
              
              // Check if the product name matches the search query
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  li[j].style.display = ""; // Show the li element
              } else {
                  li[j].style.display = "none"; // Hide the li element
              }
          }
      }
  }
}
// ============== ADD TO CART NOTIFICATION ============== //

   // Get the cart container and the notification span
   // Get the cart container and the notification span
   const cartContainer = document.getElementById('cartContainer');
   const cartNotification = document.getElementById('cartNotification');
 
   // Retrieve the cart item count from local storage
   let cartItemCount = localStorage.getItem('cartItemCount') || 0;
 
   // Function to update the display of the notification
   const updateNotificationDisplay = () => {
     if (cartItemCount === 0) {
       cartNotification.style.display = 'none';
     } 
   };
 
   // Update the notification span with the retrieved count
   cartNotification.textContent = cartItemCount;
 
   // Check if cartItemCount is zero initially
   if (cartItemCount === 0) {
     cartNotification.style.display = 'none';
   }
 
   // Add an event listener to each "Add to Cart" button
   const addToCartButtons = document.querySelectorAll('.addtoCartContainer');
   addToCartButtons.forEach((button) => {
     button.addEventListener('click', () => {
       // Increment the cart item count
       cartItemCount++;
 
       // Update the notification span with the new count
       cartNotification.textContent = cartItemCount;
 
       // Store the updated cart item count in local storage
       localStorage.setItem('cartItemCount', cartItemCount);
 
       // Update the display of the notification
       updateNotificationDisplay();
 
       // Add the notification effect
       cartContainer.classList.add('notificationEffect');
     });
   });
 
   // Add an event listener to the cart container to reset the count and remove the notification effect
   cartContainer.addEventListener('click', () => {
     // Reset the cart item count to 0
     cartItemCount = 0;
 
     // Update the notification span with the reset count
     cartNotification.textContent = cartItemCount;
 
     // Store the reset count in local storage
     localStorage.setItem('cartItemCount', cartItemCount);
 
     // Update the display of the notification
     updateNotificationDisplay();
 
     // Remove the notification effect
     cartContainer.classList.remove('notificationEffect');
   });