const btns = document.querySelectorAll('.modal-btn');
const link = document.getElementById('modal-link');

btns.forEach(btn => {
    btn.addEventListener('click', function(e){
        const rowId = btn.getAttribute('data-id');
        link.href = `/delete-apartment/${rowId}`;
    })
})