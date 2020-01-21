$('#register_button').on('click', () => {
    $('#validation-result').empty()
    if (validateForm()) {
        $.post('register',
            {
                name: $('#name').val(),
                login: $('#login').val(),
                email: $('#email').val(),
                password: $('#password').val()
            },
            response => {
                $('#response').empty()
                if (response == 1) {
                    window.location.href = '/auth'
                } else {
                    $('#response').append(JSON.parse(response).msg)
                }
            }
        )
    }
})

// Функция валидации формы
let validateForm = () => {
    $('#register').children('input').each(function () {
        if (this.value === '') {
            $('#validation-result').append(`<span>Поле ${$(this).attr('name')} должно быть заполнено</span>`)
        }
    })

    if ($('#password').val() !== $('#repeat_password').val()) {
        $('#validation-result').append(
            `<span>Поле ${$('#repeat_password').attr('name')} должно быть равно ${$('#password').attr('name')}</span>`
        )
    }

    let emailRule = new RegExp('^([a-z0-9_\\.-]+)@([a-z0-9_\\.-]+)\\.([a-z\\.]{2,6})$')

    if ($('#email').val() !== '' && !$('#email').val().match(emailRule)) {
        $('#validation-result').append(`<span>Вы ввели не валидный ${$('#email').attr('name')}!</span>`)
    }

    return $('#validation-result').children().length > 0 ? false : true
}
