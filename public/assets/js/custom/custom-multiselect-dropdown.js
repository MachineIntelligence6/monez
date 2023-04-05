

$(".dropdown-item").on("click", (e) => {
    e.stopPropagation();
})

$("select[data-target-dropdown]").on("select2:close", function () {
    let value = $(this).val()
    if (value === "select-custom") {
        $($(this).attr("data-target-dropdown")).show();
    }
})


$(".dropdown-menu[data-searchable='true']").each((_, searchDrop) => {
    console.log(searchDrop);
    $(document).click((e) => {
        if (!searchDrop.contains(e.target)) {
            $(searchDrop).hide();
        }
    })
    $(searchDrop)
        .find(".dropdown-search-input")
        .first()
        .on("input", (e) => {
            let inputVal = $(e.target).val().toLowerCase();
            console.log(inputVal);
            $(searchDrop).find(".dropdown-item").each((_, dropItem) => {
                console.log(dropItem);
                let dropItemLabel = $(dropItem).find("label").text().toLowerCase();
                if (dropItemLabel.includes(inputVal)) {
                    dropItem.classList.remove("d-none");
                } else {
                    $(dropItem).find("input[type='checkbox']").prop("checked", false);
                    dropItem.classList.add("d-none");
                }
            })
        })
})