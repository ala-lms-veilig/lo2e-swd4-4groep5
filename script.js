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

