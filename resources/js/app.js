import "./bootstrap";
import "flowbite";
import "preline";

/* lógica para aplicar máscara a determinados inputs de forulários */
import InputMask from "inputmask";

document.addEventListener("DOMContentLoaded", () => {
    const valityCardMask = new InputMask("99/99");
    const valityCardInput = document.getElementById("validity");

    if (valityCardInput) {
        valityCardMask.mask(valityCardInput);
    }
});
