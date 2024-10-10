async function showPosts(){
    const response = await fetch('https://my-json-server.typicode.com/ala-lms-veilig/lo2e-swd4-4groep5/posts');

    const profile = await response.json();

    console.log(profile)
}

showPosts();