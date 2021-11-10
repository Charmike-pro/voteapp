// Index-page js

window.addEventListener('load', getPolls);
document.getElementById('votesUl').addEventListener('click', openPoll);

let data = null;


/* 
Get all polls from db and show on page
*/
function getPolls(){
    console.log('Haetaan data')
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        showPolls(data);
    }
    ajax.open("GET", "backend/getPolls.php?show_all=1");
    ajax.send();
}

function showPolls(data, type = 'current'){
    
    const ul = document.getElementById("votesUl");
    ul.innerHTML = "";

    const now = new Date();
    
    data.forEach(poll => {
        
        let start = false;
        let end = false;

        if (poll.start != '0000-00-00 00:00:00') {
            start = new Date(poll.start);
        }

        if (poll.end != '0000-00-00 00:00:00') {
            end = new Date(poll.end);       
        }
        
        if (type == 'old') {
            
            if (end < now && end != false) {
                const newLi = document.createElement('li');
                newLi.classList.add('list-group-item');
                newLi.dataset.voteid = poll.id;
        
                const liText = document.createTextNode(poll.topic);
                newLi.appendChild(liText);
        
                ul.appendChild(newLi);
            }
        
        } else if (type == 'future') {

            if (start > now) {
                
                const newLi = document.createElement('li');
                newLi.classList.add('list-group-item');
                newLi.dataset.voteid = poll.id;
        
                const liText = document.createTextNode(poll.topic);
                newLi.appendChild(liText);
        
                ul.appendChild(newLi);
            
            }

        } else {

            if ((start == false || start <= now) && (end == false || end >= now)) {
                const newLi = document.createElement('li');
                newLi.classList.add('list-group-item');
                newLi.dataset.voteid = poll.id;
        
                const liText = document.createTextNode(poll.topic);
                newLi.appendChild(liText);
        
                ul.appendChild(newLi);
            }
        }


    });
}

function openPoll(event){
    console.log(event.target.dataset.voteid);
    window.location.href = "vote.php?id=" + event.target.dataset.voteid;
}