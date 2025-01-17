import "./bootstrap";
import "flowbite";
import "preline";

/* lógica para aplicar máscara a determinados inputs de forulários */
import InputMask from "inputmask";

document.addEventListener("DOMContentLoaded", () => {
    const cardValidityMask = new InputMask("99/99");
    const dueDateMask = new InputMask("99/99");
    const cardValidityField = document.getElementById("validity");
    const dueDateField = document.getElementById("due_date");

    if (cardValidityField) {
        cardValidityMask.mask(cardValidityField);
    }

    if (dueDateField) {
        dueDateMask.mask(dueDateField);
    }
});
