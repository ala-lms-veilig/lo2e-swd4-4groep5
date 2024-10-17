// Save and load incidents from localStorage
const STORAGE_KEY = 'incidents';
const saveIncidents = incidents => localStorage.setItem(STORAGE_KEY, JSON.stringify(incidents));
const loadIncidents = () => JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];

// Generate a unique ID for each incident
const generateId = () => Date.now().toString(36) + Math.random().toString(36).substr(2);

// Add a new incident
function addIncident(formData) {
    const incidents = loadIncidents();
    const newIncident = {
        id: generateId(),
        timestamp: new Date().toISOString(),
        ...formData
    };
    incidents.push(newIncident);
    saveIncidents(incidents);
}

// Display incidents on the dashboard
function updateDashboard() {
    const incidents = loadIncidents();
    const dashboardContent = document.getElementById('dashboardContent');
    
    if (dashboardContent) {
        if (incidents.length > 0) {
            const html = incidents.map(incident => `
                <div class="incident-card">
                    <h3>Incident ${incident.id}</h3>
                    <p><strong>Timestamp:</strong> ${new Date(incident.timestamp).toLocaleString()}</p>
                    ${Object.entries(incident)
                        .filter(([key]) => !['id', 'timestamp'].includes(key))
                        .map(([key, value]) => `<p><strong>${key}:</strong> ${value}</p>`)
                        .join('')}
                </div>
            `).join('');
            dashboardContent.innerHTML = html;
        } else {
            dashboardContent.innerHTML = '<p>No incidents reported yet.</p>';
        }
    }
}

// Handle form submission (on incident page)
function handleSubmit(event) {
    event.preventDefault();
    const formData = Object.fromEntries(new FormData(event.target));
    addIncident(formData);
    alert('Incident reported successfully!');
    event.target.reset(); // Clear the form
}

// Clear all incidents
function clearIncidents() {
    localStorage.removeItem(STORAGE_KEY);
    updateDashboard();
}

// Initialize page
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('incidentForm');
    if (form) {
        form.addEventListener('submit', handleSubmit);
    }

    const clearButton = document.getElementById('clearIncidents');
    if (clearButton) {
        clearButton.addEventListener('click', clearIncidents);
    }

    updateDashboard();
});
