document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.like-button').forEach(button => {
        button.addEventListener('click', async () => {
            const id = button.getAttribute('data-id');
            const response = await fetch('update_likes.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id })
            });

            if (response.ok) {
                const result = await response.json();
                document.getElementById(`counter-${id}`).innerText = result.likes;
            } else {
                console.error('Ошибка обновления лайков');
            }
        });
    });
});
