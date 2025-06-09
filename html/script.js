document.addEventListener("DOMContentLoaded", function() {
    alert("Projeto Docker rodando com sucesso!");
});
document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();
    document.getElementById("message").innerText = "Dados enviados com sucesso!";
});
