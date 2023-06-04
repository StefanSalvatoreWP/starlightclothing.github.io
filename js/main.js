$(document).ready(function() {
    var currentContainer = 0;
    var containerCount = $(".selectsalesContainer").length;
    var containerWidth = $(".selectsalesContainer").width();

    $(".leftArrow").click(function() {
        $(".selectsalesContainer").eq(currentContainer).show();
        currentContainer = (currentContainer - 1 + containerCount) % containerCount;
        $(".selectsalesContainer").eq(currentContainer).hide();
    });

    $(".rightArrow").click(function() {
        $(".selectsalesContainer").eq(currentContainer).show();
        currentContainer = (currentContainer + 1) % containerCount;
        $(".selectsalesContainer").eq(currentContainer).hide();
    });


});

// LOGIN FORM HOVER MENU //

// Function to handle the click event and prevent the default behavior
function handleLoginClick(event) {
    event.preventDefault(); // Prevent the default link behavior
    toggleLoginForm(); // Toggle the visibility of the login form
  }
  
  function handleLoginDocumentClick(event) {
    var loginForm = document.getElementById('loginForm');
    var loginLink = document.getElementById('loginLink');
    if (!loginForm.contains(event.target) && !loginLink.contains(event.target)) {
      // Click occurred outside of the form and login link
      loginForm.style.display = 'none'; // Hide the login form
      var blurryBackground = document.getElementById('blurryBackground');
      blurryBackground.style.opacity = '0'; // Remove the blurry effect
    }
  }
  
  // Function to toggle the visibility of the login form and the blurry background
  function toggleLoginForm() {
    var loginForm = document.getElementById('loginForm');
    var blurryBackground = document.getElementById('blurryBackground');
  
    // Toggle the display of the login form
    loginForm.style.display = loginForm.style.display === 'none' ? 'block' : 'none';
  
    // Toggle the opacity of the blurry background
    blurryBackground.style.opacity = blurryBackground.style.opacity === '0' ? '1' : '0';
  }
  
  // Add a click event listener to the login link
  var loginLink = document.getElementById('loginLink');
  loginLink.addEventListener('click', handleLoginClick);
  
  // Add a click event listener to the document for the login form
  document.addEventListener('click', handleLoginDocumentClick);
  
  
  // SIGNUP FORM HOVER MENU //
  
  // Function to handle the click event and prevent the default behavior
  function handleSignupClick(event) {
    event.preventDefault(); // Prevent the default link behavior
    toggleSignupForm(); // Toggle the visibility of the signup form
  }
  
  function handleSignupDocumentClick(event) {
    var signupForm = document.getElementById('signupForm');
    var signupLink = document.getElementById('signupLink');
    if (!signupForm.contains(event.target) && !signupLink.contains(event.target)) {
      // Click occurred outside of the form and signup link
      signupForm.style.display = 'none'; // Hide the signup form
      var newBlurryBackground = document.getElementById('newblurryBackground');
      newBlurryBackground.style.opacity = '0'; // Remove the blurry effect
    }
  }
  
  // Function to toggle the visibility of the signup form and the blurry background
  function toggleSignupForm() {
    var signupForm = document.getElementById('signupForm');
    var newBlurryBackground = document.getElementById('newblurryBackground');
  
    // Toggle the display of the signup form
    signupForm.style.display = signupForm.style.display === 'none' ? 'block' : 'none';
  
    // Toggle the opacity of the blurry background
    newBlurryBackground.style.opacity = newBlurryBackground.style.opacity === '0' ? '1' : '0';
  }
  
  // Add a click event listener to the signup link
  var signupLink = document.getElementById('signupLink');
  signupLink.addEventListener('click', handleSignupClick);
  
  // Add a click event listener to the document for the signup form
  document.addEventListener('click', handleSignupDocumentClick);
  
  
  
  
  