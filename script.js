const container = document.querySelector('.container');
const regiserBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

regiserBtn.addEventListener('click', () => {
    container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
});

function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === "password" ? "text" : "password";
}
