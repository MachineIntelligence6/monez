const allModals = document.querySelectorAll(".modal");
for (let i = 0; i < allModals.length; i++) {
    const modal = allModals[i];
    let dismissBtns = modal.querySelectorAll('[data-dismiss="modal"]');
    for (let j = 0; j < dismissBtns.length; j++) {
        dismissBtns[j].addEventListener("click", () => {
            modal.classList.remove("show");
            modal.style.display = "none"
        })
    }
}

const modalTriggerBtns = document.querySelectorAll('[data-trigger="modal"]');
for (let i = 0; i < modalTriggerBtns.length; i++) {
    modalTriggerBtns[i].addEventListener("click", () => {
        let modal = document.getElementById(modalTriggerBtns[i].getAttribute("data-target"))
        modal.classList.add("show");
        modal.style.display = "block"
    })
}