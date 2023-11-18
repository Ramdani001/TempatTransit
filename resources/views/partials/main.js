const dropdownToggle = document.querySelector('.relative');
const dropdownContent = document.querySelector('.absolute');

dropdownToggle.addEventListener('click', () => {
    dropdownContent.classList.toggle('hidden');
});
