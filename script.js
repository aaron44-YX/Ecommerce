// Redirect to Login
function redirectToLogin() {
    window.location.href = "login&register.php";
}
// Show the form
function onToggle(formId, event){
    event.preventDefault();
    document.querySelectorAll('[role="form-box"]').forEach(form => form.classList.add('hidden'));
    document.getElementById(formId).classList.remove('hidden');
}
// For Confirm Password
document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.querySelector(".register_form");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm_password");

    registerForm.addEventListener("submit", function (event) {
        if (passwordInput.value !== confirmPasswordInput.value) {
            event.preventDefault(); 
            alert("Passwords do not match! Please try again.");
            confirmPasswordInput.focus();
        }
    });
});
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('a[data-page]').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const page = e.target.getAttribute('data-page');

            // Fetch and update the content area dynamically
            fetch(`admin_components/${page}.php`)
                .then(res => res.text())
                .then(data => {
                    document.getElementById('content').innerHTML = data;
                })
                .catch(err => console.error('Error loading page:', err));
        });
    });
});

// For Product Selection
    const checkboxes = document.querySelectorAll('.product-check');
    const selectAll = document.getElementById('selectAll');
    const totalDisplay = document.getElementById('selectedTotal');

    function updateTotal() {
        let total = 0;
        checkboxes.forEach(cb => {
            if (cb.checked) {
                total += parseFloat(cb.dataset.subtotal);
            }
        });
        totalDisplay.textContent = total.toFixed(2);
    }

    checkboxes.forEach(cb => cb.addEventListener('change', updateTotal));
    selectAll.addEventListener('change', () => {
        checkboxes.forEach(cb => cb.checked = selectAll.checked);
        updateTotal();
    });

// For Checkout
    document.getElementById('cartForm').addEventListener('submit', function (e) {
    const selected = document.querySelectorAll('.product-check:checked');
    if (selected.length === 0) {
        alert("Please select at least one product to checkout.");
        e.preventDefault();
    }
});
