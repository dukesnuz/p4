function getOffice(){
    var select = $('office_names');
    var v = select.options[select.selectedIndex].value;
    $('office_name').value = v;
    console.log(v);
}
window.onload = function(){
    var selected = $('office_names');
    selected.onchange = getOffice;
    console.log('hi');
}
