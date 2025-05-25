function fetchTheaters(query = '') {
    fetch(`search.php?q=${encodeURIComponent(query)}`)
      .then(response => response.json())
      .then(data => {
        const container = document.getElementById('cinemaList');
        container.innerHTML = ''; // Clear old cards

        if (data.length === 0) {
          container.innerHTML = '<p class="no-results">No theaters found.</p>';
          return;
        }

        data.forEach(item => {
          const card = document.createElement('div');
          card.className = 'cinema-card';
          card.innerHTML = `
                  <img src="images/New folder/${item.image}" alt="${item.name}" onerror="this.src='images/New folder/placeholderTheater.png'" />
                  <a href="CinemaDetail.php?id=${item.id}"><h2>${item.name}</h2></a>
                  <p><strong><i class="fa-solid fa-location-dot"></i> Address:</strong> ${item.address}</p>
              `;
          container.appendChild(card);
        });
      })
      .catch(error => {
        console.error('Error fetching Cinema:', error);
      });
  }

  // Initial fetch on page load
  fetchTheaters();

  // Live search
  document.getElementById('searchInput').addEventListener('input', function () {
    fetchTheaters(this.value);
  });