const btn = document.getElementById('menu-btn');
const nav = document.getElementById('menu');
const avt = document.getElementById('avatar');
const set = document.getElementById('set');




btn.addEventListener("click", () =>{
    btn.classList.toggle('open');
    nav.classList.toggle('flex');
    nav.classList.toggle('hidden');
});

avt.addEventListener("click", () =>{
  avt.classList.toggle('open');
  set.classList.toggle('flex');
  avt.classList.toggle('hidden');
});




  function togglePassword() {
    const passwordInput = document.getElementById('passwordInput');
    const togglePasswordBtn = document.getElementById('togglePasswordBtn');

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      togglePasswordBtn.textContent = "Hide";
    } else {
      passwordInput.type = "password";
      togglePasswordBtn.textContent = "Show";
    }
  }

