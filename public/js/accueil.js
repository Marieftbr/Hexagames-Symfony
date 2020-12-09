function montreConcept() {
   let conceptElt = document.querySelector(".concept");
    if (conceptElt.style.display === "none" || !conceptElt.style.display) {
        conceptElt.style.display = "block";
    }else{
        conceptElt.style.display = "none";
    }
}

document.addEventListener("DOMContentLoaded", function(event) {
    const element = document.querySelector(".hex2");
    element.addEventListener("click", function(event) {
        montreConcept();
    })
})