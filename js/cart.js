document.addEventListener('DOMContentLoaded', function () {
    var removeButtons = document.querySelectorAll('.btn-remove');

    // Tambahkan event listener untuk setiap tombol Remove
    removeButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var row = this.closest('tr');
            row.parentNode.removeChild(row); // Hapus baris produk
            updateTotal();
        });
    });

    // Fungsi untuk memperbarui total
    function updateTotal() {
        var totalCells = document.querySelectorAll('.product-total');
        var subtotal = 0;

        // Hitung subtotal dari total setiap produk
        totalCells.forEach(function (cell) {
            subtotal += parseFloat(cell.textContent.replace('$', ''));
        });

        // Update subtotal
        var subtotalCell = document.getElementById('subtotal');
        subtotalCell.textContent = '$' + subtotal.toFixed(2);
    }
});
