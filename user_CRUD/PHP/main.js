let id = $("input[name*='id']");
id.attr("readonly", "readonly");

$(".btn-edit").click(e => {
    let textvalues=  displayData(e);
    let id = $("input[name*='id']");
    let location = $("select[name*='location']");
    let price = $("select[name*='price']");
    let area = $("select[name*='area']");
    let possession = $("select[name*='possession']");

    id.val(textvalues[0])
    location.val(textvalues[1]);
    price.val(textvalues[2]);
    area.val(textvalues[3]);
    possession.val(textvalues[4]);

});

function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td) {
        if (value.dataset.id == e.target.dataset.id) {
            textvalues[id++] = value.textContent;
        }
    }
    return textvalues;
}