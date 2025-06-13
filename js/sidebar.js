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
  .catch(error => {
    console.error('Error loading sidebar:', error);
  });