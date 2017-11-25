function getOffice(){
    var select = $('office_names');
    var text = select.options[select.selectedIndex].text;
    var value = select.options[select.selectedIndex].value;
    $('office_name').value = text;
    $('id').value = value;
}
window.onload = function(){
    var selected = $('office_names');
    selected.onchange = getOffice;
}
