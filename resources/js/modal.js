// Modal functions
function openInsertModal() {
    document.getElementById('insertModal').classList.remove('hidden');
}

function closeInsertModal() {
    document.getElementById('insertModal').classList.add('hidden');
}

function openEditModal(id) {
    document.getElementById('editModal' + id).classList.remove('hidden');
}

function closeEditModal(id) {
    document.getElementById('editModal' + id).classList.add('hidden');
}

function openDeleteModal(url) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    form.action = url;
    modal.classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Close modals when clicking outside
window.onclick = function(event) {
    const modals = document.querySelectorAll('[id^="insertModal"], [id^="editModal"], [id^="deleteModal"]');
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
}
