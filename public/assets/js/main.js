$(document).ready(function () {
    // Handle form submission
    $('#submitBtn').on('click', function () {
      const formData = {
        fullName: $('#fullName').val(),
        phoneNumber: $('#phoneNumber').val(),
        location: $('#location').val(),
        about: $('#about').val(),
        age: $('#age').val(),
        verified: $('#verified').val(),
        vip: $('#vip').prop('checked') ? 'yes' : 'no',
        image: $('#image').val(),
      };
  
      $.ajax({
        url: '/api/adduser',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(formData),
        success: function (response) {
          alert(response.message);
  
          // Fetch and display the updated user list
          fetchUserList();
        },
        error: function (error) {
          console.error('Error submitting form:', error);
          alert('Error submitting form');
        }
      });
    });
  
    // Fetch and display the user list
    function fetchUserList() {
      $.get('/api/userlist', function (response) {
        // Clear existing profiles
        $('.profile-container').empty();
  
        // Display the user list on the frontend
        response.users.forEach(user => {
          const profileHtml = `
            <div class="profile">
              <div class="profile-image-container">
                <img src="${user.image}" alt="Profile Image" class="profile-image">
                ${user.vip === 'yes' ? '<div class="vip-badge">VIP</div>' : ''}
              </div>
              <div class="profile-info">
                <p><strong>${user.fullName}</strong> ${user.verified === 'yes' ? '<span class="badge verified-personal-badge"><img src="assets/icon/check.png" alt="Verified Badge" width="16" height="16"></span>' : ''}</p>
                <span class="badge location-badge"><i class="fas fa-map-marker-alt"></i> ${user.location}</span>
              </div>
            </div>
          `;
          $('.profile-container').append(profileHtml);
        });
      });
    }
  });
  