const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString)

if (urlParams.has('msg') && urlParams.has('type')) {
    const msg = urlParams.get('msg');
    const type = urlParams.get('type');

    showMessage(type, msg);
}

function showMessage(type, msg){

    let msgBox = document.getElementById("msg");

    if (type == 'success') {
        msgBox.classList.remove('alert-warning');
        msgBox.classList.remove('alert-danger');
        msgBox.classList.add('alert-success');
        msgBox.querySelector('h4').innerHTML = "Success!";
    } else if(type == 'error') {
        msgBox.querySelector('h4').innerHTML = "Warning!";
        msgBox.classList.remove('alert-success');
        msgBox.classList.add('alert-danger');
    }
    
    msgBox.querySelector('p').innerHTML = msg;
    msgBox.classList.remove('d-none');
}