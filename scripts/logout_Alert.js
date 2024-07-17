function logout() {
  let confirmLogout = confirm("Tem certeza de que deseja sair?");
  if (confirmLogout) {
    
    window.location.href = "Home.php";
  } else {
    alert("Logout cancelado!");
  }
}
