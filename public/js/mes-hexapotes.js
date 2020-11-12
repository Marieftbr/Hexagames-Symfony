function toggle() {
    var form = document.getElementById("form-toggle");
    if (form.style.display === "none" || form.style.display === "") {
      form.style.display = "block";
    } else {
      form.style.display = "none";
    }
}