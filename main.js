let id = $("input[name*='id']")
id.attr("readonly","readonly")

$(".btnedit").click( e =>{
    let textvalues = displayData(e);
    
    let name = $("input[name*='name']");
    let email = $("input[name*='email']");
    let mobile = $("input[name*='mobile']");
    let state = $("input[name*='state']");
    let city = $("input[name*='city']");
    let address = $("input[name*='address']");
    
    id.val(textvalues[0]);
    name.val(textvalues[1]);
    email.val(textvalues[2]);
    mobile.val(textvalues[3]);
    state.val(textvalues[4]);
    city.val(textvalues[5]);
    address.val(textvalues[6]);
});

function displayData(e){
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];
    
    for(const value of td){
        if(value.dataset.id == e.target.dataset.id){
            textvalues[id++] = value.textContent;
        }
    }
    return textvalues;
}