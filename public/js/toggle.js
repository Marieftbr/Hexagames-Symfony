function toggle() {
  const form = document.getElementById("form-toggle");
  if (form.style.display === "none" || form.style.display === "") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
}

document.querySelector(".form-open").addEventListener("click", toggle)