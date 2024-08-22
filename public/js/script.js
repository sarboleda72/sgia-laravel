document.getElementById('menu-toggle').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');

    // Toggle sidebar visibility
    sidebar.classList.toggle('hidden');
    
    // Adjust main content margin based on sidebar visibility
    if (sidebar.classList.contains('hidden')) {
        mainContent.classList.add('shifted');
    } else {
        mainContent.classList.remove('shifted');
    }
});

document.querySelectorAll('.sidebar-item').forEach(item => {
    item.addEventListener('click', function() {
        // Close other submenus
        document.querySelectorAll('.sidebar-item').forEach(i => {
            if (i !== this) {
                i.classList.remove('active');
            }
        });
        this.classList.toggle('active');
    });
});

document.getElementById('user-photo').addEventListener('click', function() {
    const dropdown = document.getElementById('dropdown');
    dropdown.classList.toggle('show');
});

// Close dropdown if clicked outside
document.addEventListener('click', function(event) {
    const userPhoto = document.getElementById('user-photo');
    const dropdown = document.getElementById('dropdown');

    if (!userPhoto.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.remove('show');
    }
});
