function showUpdateProfile() {
    document.getElementById('profile-view').classList.add('hidden');
    document.getElementById('profile-update').classList.remove('hidden');
    document.getElementById('username').value = document.getElementById('username-view').value;
    document.getElementById('email').value = document.getElementById('email-view').value;
    document.getElementById('pass').value = document.getElementById('pass-view').value;
}

function cancelUpdate() {
    document.getElementById('profile-view').classList.remove('hidden');
    document.getElementById('profile-update').classList.add('hidden');
}

function saveProfile() {
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const pass = document.getElementById('pass').value;

    const profileData = {
        username: username,
        email: email,
        pass: pass
    };

    localStorage.setItem('profileData', JSON.stringify(profileData));
    alert('Profile updated successfully!');

    document.getElementById('username-view').value = username;
    document.getElementById('email-view').value = email;
    document.getElementById('pass-view').value = pass;

    cancelUpdate();
}

function logout() {
    alert('Logged out successfully!');
}

function uploadProfilePicture() {
    const fileInput = document.getElementById('file-input');
    const file = fileInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('profile-image').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}