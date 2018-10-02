function handleRadio(element, template) {
    var elements = document.getElementsByClassName(template);
    if(element.checked) {
        for(var i = 0; i < elements.length; i++) {
            elements[i].classList.add("show");
            elements[i].classList.remove("hide");
        }
    } else {
        for(var i = 0; i < elements.length; i++) {
            elements[i].classList.remove("show");
            elements[i].classList.add("hide");
        }
    }
}