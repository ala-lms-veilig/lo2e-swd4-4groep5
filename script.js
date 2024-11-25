
// const STORAGE_KEY = 'incidenten';

// const loadIncidenten = () => JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
// const saveIncidenten = incidenten => localStorage.setItem(STORAGE_KEY, JSON.stringify(incidenten));

// function addIncident(formData) {
//     const incidenten = loadIncidenten();
//     incidenten.push({
//         tijd: new Date().toLocaleString('nl-NL'),
//         ...formData
//     });
//     saveIncidenten(incidenten);
//     updateDashboard();
// }


// function updateDashboard() {
//     const content = document.getElementById('dashboardContent');
//     if (!content) return;
    
//     const incidenten = loadIncidenten();
//     content.innerHTML = incidenten.length ? incidenten.map(incident => `
//         <div class="incident-card">
//             ${Object.entries(incident).map(([key, value]) => `
//                 <div class="incident-detail">
//                     <strong>${key}:</strong>
//                     <span>${value}</span>
//                 </div>
//             `).join('')}
//         </div>
//     `).join('') : '<p>Geen incidenten gerapporteerd.</p>';
// }


// function handleSubmit(event) {
//     event.preventDefault();
//     addIncident(Object.fromEntries(new FormData(event.target)));
//     event.target.reset(); 
// }


// function clearIncidenten() {
//     localStorage.removeItem(STORAGE_KEY);
//     updateDashboard();
// }


// document.addEventListener('DOMContentLoaded', () => {
//     const form = document.getElementById('incidentForm');
//     if (form) form.addEventListener('submit', handleSubmit);

//     const clearButton = document.getElementById('clearIncidenten');
//     if (clearButton) clearButton.addEventListener('click', clearIncidenten);

//     updateDashboard();
// });





const dashboard = document.getElementById('dashboardContent');

async function getData() {
    try {
        const response = await fetch('https://my-json-server.typicode.com/ala-lms-veilig/lo2e-swd4-4groep5/db');
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }

        const json = await response.json();
        let dashboardContent = "";

        if (json.posts) {
            json.posts.forEach(post => {
                dashboardContent += `<p><strong>ID:</strong> ${post.id} <br> <strong>Titel:</strong> ${post.title}</p>`;
            });
        }

        dashboard.innerHTML = dashboardContent;
        console.log(json);
    } catch (error) {
        console.log(error.message);
    }
}

getData();