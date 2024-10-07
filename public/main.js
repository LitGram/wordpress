document.addEventListener('DOMContentLoaded', function() {
  // Login modal functionality
  const loginBtn = document.getElementById('loginBtn');
  const logoutBtn = document.getElementById('logoutBtn');
  const loginModal = document.getElementById('loginModal');
  const closeBtn = document.getElementsByClassName('close')[0];
  const studyGuidesLink = document.getElementById('studyGuidesLink');
  const studyGuidesSection = document.getElementById('study-guides');

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

  // Form submission
  const loginForm = document.getElementById('loginForm');
  loginForm.onsubmit = function(e) {
    e.preventDefault();
    const email = loginForm.elements[0].value;
    const password = loginForm.elements[1].value;
    
    fetch('/api/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ email, password }),
    })
    .then(response => response.json())
    .then(data => {
      if (data.token) {
        localStorage.setItem('token', data.token);
        loginModal.style.display = "none";
        updateAuthUI(true);
        loadStudyGuides();
      } else {
        alert('Invalid credentials');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred during login');
    });
  }

  logoutBtn.onclick = function() {
    localStorage.removeItem('token');
    updateAuthUI(false);
  }

  function updateAuthUI(isLoggedIn) {
    loginBtn.style.display = isLoggedIn ? 'none' : 'inline-block';
    logoutBtn.style.display = isLoggedIn ? 'inline-block' : 'none';
    studyGuidesLink.style.display = isLoggedIn ? 'inline-block' : 'none';
    if (!isLoggedIn) {
      studyGuidesSection.style.display = 'none';
    }
  }

  studyGuidesLink.onclick = function(e) {
    e.preventDefault();
    loadStudyGuides();
  }

  function loadStudyGuides() {
    const token = localStorage.getItem('token');
    if (!token) {
      alert('Please log in to view study guides');
      return;
    }

    fetch('/api/study-guides', {
      headers: {
        'Authorization': `Bearer ${token}`
      }
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Unauthorized');
      }
      return response.json();
    })
    .then(studyGuides => {
      const studyGuidesList = document.getElementById('studyGuidesList');
      studyGuidesList.innerHTML = '';
      studyGuides.forEach(guide => {
        const guideElement = document.createElement('div');
        guideElement.className = 'study-guide-item';
        guideElement.innerHTML = `
          <h3>${guide.title}</h3>
          <p>${guide.description}</p>
        `;
        studyGuidesList.appendChild(guideElement);
      });
      studyGuidesSection.style.display = 'block';
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred while loading study guides');
    });
  }

  // Check if user is already logged in
  if (localStorage.getItem('token')) {
    updateAuthUI(true);
  }

  // CTA button
  const ctaButton = document.getElementById('ctaButton');
  if (ctaButton) {
    ctaButton.onclick = function() {
      alert('This would lead to a sign-up page in a full implementation.');
    }
  }

  // Subscription buttons
  const subscribeButtons = document.querySelectorAll('.subscribe-btn');
  subscribeButtons.forEach(button => {
    button.onclick = function() {
      alert('This would lead to a payment gateway in a full implementation.');
    }
  });
});