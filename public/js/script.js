document.getElementById('menu-toggle').addEventListener('click', function () {
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
  item.addEventListener('click', function () {
    // Close other submenus
    document.querySelectorAll('.sidebar-item').forEach(i => {
      if (i !== this) {
        i.classList.remove('active');
      }
    });
    this.classList.toggle('active');
  });
});

document.getElementById('user-photo').addEventListener('click', function () {
  const dropdown = document.getElementById('dropdown');
  dropdown.classList.toggle('show');
});

// Close dropdown if clicked outside
document.addEventListener('click', function (event) {
  const userPhoto = document.getElementById('user-photo');
  const dropdown = document.getElementById('dropdown');

  if (!userPhoto.contains(event.target) && !dropdown.contains(event.target)) {
    dropdown.classList.remove('show');
  }
});


// Selecciona todos los elementos que disparan el modal
document.querySelectorAll('.submenu-item').forEach(item => {
  if (item.textContent === 'Crear') {
    item.addEventListener('click', function () {
      document.getElementById('modal').style.display = 'flex';
    });
  }
});

// Cierra el modal al hacer clic en el botón de cerrar
document.getElementById('close-btn-crear').addEventListener('click', function () {
  document.getElementById('modal').style.display = 'none';
});

// Cierra el modal al hacer clic fuera del contenido del modal
window.addEventListener('click', function (event) {
  if (event.target.className === 'modal-crear') {
    document.getElementById('modal').style.display = 'none';
  }
});

const currentPath = window.location.pathname;

if (currentPath === '/users') {

  document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function () {
      const card = this.closest('.user-card');
      const nombreCompleto = card.querySelector('h3').innerText.split(": ")[1];
      const tipoDocumento = card.querySelector('p:nth-child(2)').innerText.split(": ")[1];
      const documento = card.querySelector('p:nth-child(3)').innerText.split(": ")[1];
      const fichaId = card.querySelector('p:nth-child(4)').innerText.split(": ")[1];
      const rol = card.querySelector('p:nth-child(5)').innerText.split(": ")[1];
      const estado = card.querySelector('p:nth-child(6)').innerText.split(": ")[1];
      const email = card.querySelector('p:nth-child(7)').innerText.split(": ")[1];
      const id = card.querySelector('p:nth-child(8)').innerText.split(": ")[1];

      document.getElementById('edit_nombre_completo').value = nombreCompleto;
      document.getElementById('edit_tipo_documento').value = tipoDocumento;
      document.getElementById('edit_documento').value = documento;
      document.getElementById('edit_ficha_id').value = fichaId;
      document.getElementById('edit_rol').value = rol;
      document.getElementById('edit_estado').value = estado;
      document.getElementById('edit_email').value = email;
      document.getElementById('edit_id').value = id;

      const baseUrl = document.getElementById('editForm').getAttribute('data-action-base');
      document.getElementById('editForm').action = `${baseUrl}/${id}`;
      document.getElementById('editModal').style.display = 'flex';
    });
  });

}

if (currentPath === '/tools') {
  document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function () {
      const card = this.closest('.user-card');
      const nombre = card.querySelector('h3').innerText.split(": ")[1];
      const marca = card.querySelector('p:nth-child(2)').innerText.split(": ")[1];
      const cantidad = card.querySelector('p:nth-child(3)').innerText.split(": ")[1];
      const precio = card.querySelector('p:nth-child(4)').innerText.split(": ")[1];
      const estado = card.querySelector('p:nth-child(5)').innerText.split(": ")[1];
      const id = card.querySelector('p:nth-child(6)').innerText.split(": ")[1];

      document.getElementById('edit_nombre').value = nombre;
      document.getElementById('edit_marca').value = marca;
      document.getElementById('edit_cantidad').value = cantidad;
      document.getElementById('edit_precio').value = precio;
      document.getElementById('edit_estado').value = estado;
      document.getElementById('edit_id').value = id;

      const baseUrl = document.getElementById('editForm').getAttribute('data-action-base');
      document.getElementById('editForm').action = `${baseUrl}/${id}`;
      document.getElementById('editModal').style.display = 'flex';
    });
  });
}

document.querySelector('.close-btn-actualizar').addEventListener('click', function () {
  document.getElementById('editModal').style.display = 'none';
  console.log('click');
});

document.querySelector('.cancel-btn').addEventListener('click', function () {
  document.getElementById('editModal').style.display = 'none';
});

window.addEventListener('click', function (event) {
  const modal = document.getElementById('editModal');
  if (event.target == modal) {
    modal.style.display = 'none';
  }
});
