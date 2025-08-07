// js/sidebar.js
// This script dynamically loads the sidebar content and sets the current year in the footer.

// Load sidebar content from sidebar.html
fetch('sidebar.html')
  .then(response => response.text())
  .then(html => {
    document.getElementById('sidebar').innerHTML = html;

    // Set current year in #year_msg after sidebar is loaded
    const yearSpan = document.getElementById('year_msg');
    if (yearSpan) {
      yearSpan.textContent = new Date().getFullYear();
    }
  })
  .catch(error => { // Handle errors in loading sidebar
    console.error('Error loading sidebar:', error);
  });
