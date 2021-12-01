
const pollQueryString = window.location.search;
console.log(pollQueryString);

const pollParams = new URLSearchParams(pollQueryString);

if (pollParams.has('id')){
    getPollData(pollParams.get('id'));
}

const colors = [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(255, 159, 64, 0.2)'
];

const borderColor = [
    'rgba(255, 99, 132, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)'
]

function getPollData(id){
    console.log(id);
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        showResults(data);
    }
    ajax.open("GET", "backend/getPoll.php?id=" + id);
    ajax.send();
}

function showResults(data){
    document.querySelector('h1').innerHTML = data.topic;

    const ul = document.getElementById('optionsUl');

    let pollData = { 
        datasets: [{ 
            data: [], 
            backgroundColor: [],
            borderColor: [],
            borderWidth: 1
        }],
        labels: []
    };

    let index = 0;
    data.options.forEach(function(option){ 
        
        pollData.labels.push(option.name);
        pollData.datasets[0].data.push(option.votes);
        pollData.datasets[0].backgroundColor.push(colors[index]);
        pollData.datasets[0].borderColor.push(borderColor[index]);
        index++;

        const newLi = document.createElement('li');
        newLi.className = 'list-group-item';
        
        // <span class="badge bg-primary rounded-pill">14</span>
        const newSpan = document.createElement('span');
        newSpan.className = 'badge badge-primary badge-pill float-right';

        const spanText = document.createTextNode(option.votes);
        const liText = document.createTextNode(option.name);

        newSpan.appendChild(spanText);
        newLi.appendChild(liText);
        newLi.appendChild(newSpan);
        ul.appendChild(newLi);

    });
        var ctx = document.getElementById('pollChart').getContext('2d');
    
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut', 
            data: pollData
    });


}