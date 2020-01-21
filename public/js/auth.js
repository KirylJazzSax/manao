$('#auth-button').on('click', () => {
    $.post('/auth', {
            login: $('#login').val(),
            password: $('#password').val()
        },
        response => {
            $('#errors').empty()

            if (response == 1) {
                window.location.href = '/'
            } else {
                $('#errors').append(JSON.parse(response).msg)
            }
        })
})