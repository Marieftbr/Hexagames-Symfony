function cacherMontrerBtn() {

    let btn = document.getElementById("exampleInputPassword1");
    if (btn.type === "password") {
      btn.type = "text";
    } else {
      btn.type = "password";
    }

    function changementImg() {
        let img = document.querySelector(".hideEyes");
        if(img.src.includes("hide-eyes") ) {
            img.src = "./images/eyes.svg"}
        else { 

            img.src = "./images/hide-eyes.svg"
    }
    
    }
    changementImg();
}



