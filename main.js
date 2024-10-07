// Login modal functionality
const loginBtn = document.getElementById('loginBtn');
const loginModal = document.getElementById('loginModal');
const closeBtn = document.getElementsByClassName('close')[0];

loginBtn.onclick = function() {
  loginModal.style.display = "block";
}

closeBtn.onclick = function() {
  loginModal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == loginModal) {
    loginModal.style.display = "none";
  }
}

// Form submission (for demonstration purposes only)
const loginForm = document.getElementById('loginForm');
loginForm.onsubmit = function(e) {
  e.preventDefault();
  alert('Login functionality would be implemented here.');
  loginModal.style.display = "none";
}

// CTA button
const ctaButton = document.getElementById('ctaButton');
ctaButton.onclick = function() {
  alert('This would lead to a sign-up page in a full implementation.');
}

// Subscription buttons
const subscribeButtons = document.querySelectorAll('.subscribe-btn');
subscribeButtons.forEach(button => {
  button.onclick = function() {
    alert('This would lead to a payment gateway in a full implementation.');
  }
});