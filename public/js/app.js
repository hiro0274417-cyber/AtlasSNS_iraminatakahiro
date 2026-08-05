document.addEventListener('DOMContentLoaded', () => {
  const editModal = document.getElementById('editModal');
  const editPostId = document.getElementById('editPostId');
  const editPostText = document.getElementById('editPostText');
  const closeEditModal = document.getElementById('closeEditModal');
  const editButtons = document.querySelectorAll('.edit-btn');

  if (!editModal || !editPostId || !editPostText) {
    return;
  }

  editButtons.forEach((button) => {
    button.addEventListener('click', () => {
      editPostId.value = button.dataset.id ?? '';
      editPostText.value = button.dataset.post ?? '';

      editModal.classList.add('is-open');
    });
  });

  if (closeEditModal) {
    closeEditModal.addEventListener('click', () => {
      editModal.classList.remove('is-open');
    });
  }

  editModal.addEventListener('click', (event) => {
    if (event.target === editModal) {
      editModal.classList.remove('is-open');
    }
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      editModal.classList.remove('is-open');
    }
  });
});
