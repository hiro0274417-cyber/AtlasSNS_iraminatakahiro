document.addEventListener('DOMContentLoaded', () => {
  /*
   * 投稿編集モーダル
   */
  const editModal = document.getElementById('editModal');
  const editPostId = document.getElementById('editPostId');
  const editPostText = document.getElementById('editPostText');
  const closeEditModal = document.getElementById('closeEditModal');
  const editButtons = document.querySelectorAll('.edit-btn');

  editButtons.forEach((button) => {
    button.addEventListener('click', () => {
      if (!editModal || !editPostId || !editPostText) {
        return;
      }

      editPostId.value = button.dataset.id ?? '';
      editPostText.value = button.dataset.post ?? '';

      editModal.classList.add('is-open');
    });
  });

  if (closeEditModal && editModal) {
    closeEditModal.addEventListener('click', () => {
      editModal.classList.remove('is-open');
    });
  }

  /*
   * 投稿削除確認モーダル
   */
  const deleteModal = document.getElementById('deleteModal');
  const deletePostId = document.getElementById('deletePostId');
  const closeDeleteModal = document.getElementById('closeDeleteModal');
  const deleteButtons = document.querySelectorAll('.delete-btn');

  deleteButtons.forEach((button) => {
    button.addEventListener('click', () => {
      if (!deleteModal || !deletePostId) {
        return;
      }

      deletePostId.value = button.dataset.id ?? '';
      deleteModal.classList.add('is-open');
    });
  });

  if (closeDeleteModal && deleteModal) {
    closeDeleteModal.addEventListener('click', () => {
      deleteModal.classList.remove('is-open');
    });
  }

  /*
   * モーダルの外側をクリックして閉じる
   */
  [editModal, deleteModal].forEach((modal) => {
    if (!modal) {
      return;
    }

    modal.addEventListener('click', (event) => {
      if (event.target === modal) {
        modal.classList.remove('is-open');
      }
    });
  });

  /*
   * Escキーですべてのモーダルを閉じる
   */
  document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') {
      return;
    }

    editModal?.classList.remove('is-open');
    deleteModal?.classList.remove('is-open');
  });
});
