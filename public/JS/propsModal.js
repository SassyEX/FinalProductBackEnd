// Select the modal by its ID
const modal = document.getElementById('modal');

// Select the button to open the modal
const btnAbrirModal = document.getElementById('btn-abrir-modal');

// Select the button to close the modal
const btnCerrarModal = document.getElementById('btn-cerrar-modal');

// Function to open the modal
btnAbrirModal.addEventListener('click', () => {
    // Show the modal
    modal.showModal();

    // Calculate the position to center the modal
    const modalWidth = modal.offsetWidth;
    const modalHeight = modal.offsetHeight;
    const windowWidth = window.innerWidth;
    const windowHeight = window.innerHeight;

    modal.style.left = `${(windowWidth - modalWidth) / 2}px`;
    modal.style.top = `${(windowHeight - modalHeight) / 2}px`;
});

// Function to close the modal
btnCerrarModal.addEventListener('click', () => {
    modal.close();
});
