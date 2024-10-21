
const STORAGE_KEY = 'incidenten';

const loadIncidenten = () => JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
const saveIncidenten = incidenten => localStorage.setItem(STORAGE_KEY, JSON.stringify(incidenten));

function addIncident(formData) {
    const incidenten = loadIncidenten();
    incidenten.push({
        tijd: new Date().toLocaleString('nl-NL'),
        ...formData
    });
    saveIncidenten(incidenten);
    updateDashboard();
}


function updateDashboard() {
    const content = document.getElementById('dashboardContent');
    if (!content) return;
    
    const incidenten = loadIncidenten();
    content.innerHTML = incidenten.length ? incidenten.map(incident => `
        <div class="incident-card">
            ${Object.entries(incident).map(([key, value]) => `
                <div class="incident-detail">
                    <strong>${key}:</strong>
                    <span>${value}</span>
                </div>
            `).join('')}
        </div>
    `).join('') : '<p>Geen incidenten gerapporteerd.</p>';
}


function handleSubmit(event) {
    event.preventDefault();
    addIncident(Object.fromEntries(new FormData(event.target)));
    event.target.reset(); 
}


function clearIncidents() {
    localStorage.removeItem(STORAGE_KEY);
    updateDashboard();
}


document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('incidentForm');
    if (form) form.addEventListener('submit', handleSubmit);

    const clearButton = document.getElementById('clearIncidenten');
    if (clearButton) clearButton.addEventListener('click', clearIncidents);

    updateDashboard();
});
