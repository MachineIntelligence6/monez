window.addEventListener("DOMContentLoaded", () => {
    
})

function onSaveColumnsModal() {
    let allInpValid = true;
    $("#define-report-columns-modal").find("input,select").each((i, inp) => {
        if (inp.value === "") {
            allInpValid = false;
        }
    })
    let reportColsInp = $("#reportColumns")
    reportColsInp.val("Report Columns Set");
    validateInput(reportColsInp);
}
$(".add-bank-details-modal").find("#bankName").on("input", (e) => {
    $("#bank").val(e.target.value)
    console.log(e.target.value);
    validateInput("#bank");
})