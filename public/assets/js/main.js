const deleteModal = document.getElementById('deleteModal');
const elements = document.querySelectorAll('.btn-delete');
const formDelete = document.getElementById('form-delete');
const spanModalCVName = document.getElementById('modal-cv-name');


deleteModal.addEventListener('show.bs.modal', event => {
    formDelete.action = event.relatedTarget.dataset.href;
    spanModalCVName.textContent = event.relatedTarget.dataset.name;
})
