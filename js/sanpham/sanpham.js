document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.product-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const mama = this.getAttribute('data-mama');
            const tenma = this.getAttribute('data-tenma');
            const hinhanh = this.getAttribute('data-hinhanh');
            const giaban = this.getAttribute('data-giaban');

            document.getElementById('detailImage').src = `images/${hinhanh}`;
            document.getElementById('detailName').textContent = tenma;
            document.getElementById('detailPrice').textContent = `${parseInt(giaban).toLocaleString()} VND`;
            document.getElementById('mama').value = mama;
            document.getElementById('dongia').value = giaban;
            openProductDetails();
        });
    });

    document.getElementById('increase-btn').addEventListener('click', function() {
        const quantityInput = document.getElementById('quantity-input');
        quantityInput.value = parseInt(quantityInput.value) + 1;
    });

    document.getElementById('decrease-btn').addEventListener('click', function() {
        const quantityInput = document.getElementById('quantity-input');
        if (quantityInput.value > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    });
});

function openProductDetails() {
    document.getElementById('productOverlay').style.display = 'block';
    document.getElementById('productDetailForm').style.display = 'block';
}

function closeProductDetails() {
    document.getElementById('productOverlay').style.display = 'none';
    document.getElementById('productDetailForm').style.display = 'none';
}
