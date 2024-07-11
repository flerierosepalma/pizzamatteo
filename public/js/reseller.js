document.querySelectorAll('.has-dropdown > .dropdown-toggle').forEach(function (dropdown) {
    dropdown.addEventListener('click', function (e) {
        e.preventDefault();
        var parentLi = this.parentElement;
        parentLi.classList.toggle('active');
    });
});
