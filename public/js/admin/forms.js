// Get selected index value and add to form field
function getOffice() {
    //$('new_office').style.display='none';
    var select = $('office_names');
    var text = select.options[select.selectedIndex].text;
    var value = select.options[select.selectedIndex].value;
    if(value !== 'new'){
        $('office_name').value = text;
        $('id').value = value;
    } else {
        $('new_office').style.display='block';
        $('office_name').value = '';
        $('id').value = '';
    }
}
// Clear select index value if new office created
function clearOffice() {
    $('id').value = '';
}

window.onload = function(){
    var selected = $('office_names');
    selected.onchange = getOffice;
    //$('new_office').style.display='none';
    $('office_name').onkeyup = clearOffice;

}
