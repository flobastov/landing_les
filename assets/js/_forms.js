import $ from 'jquery';

$(document)
    .on('submit', '.simple-form', e => {
        e.preventDefault();
        const $target = $(e.target).closest('form');
        $.ajax({
            url: '/ajax/sendform',
            data: $target.serialize(),
            type: "POST",
            success: data => {
                const $error = $target.find('.b-error');
                const $flashes = $target.find('.b-flashes');
                $error.find('.b-wrapper').empty();
                $flashes.find('.b-wrapper').empty();

                if (data.status) {
                    $flashes
                        .find('.b-wrapper')
                        .append(
                            `<div class="b-flashes__item">Ваш запрос успешно отправлен! Наш менеджер скоро свяжется с Вами</div>`
                        );
                    $target.get(0).reset();
                } else {
                    for (let e in data.errors) {
                        $error
                            .find('.b-wrapper')
                            .append(
                                `<div class="b-error__item">${
                                    data.errors[e]
                                    }</div>`
                            );
                    }
                }
            },
        });
    })
    .on('opening', '.b-modal', function (e) {
        const form_name = e;
    })
    .on('submit', '.message-form', e => {
        e.preventDefault();

        const data = new FormData;

        data.append('name', $('#сoop-name').val());
        data.append('phone', $('#сoop-phone').val());
        data.append('file', $('#сoop-file').prop('files')[0]);
        data.append('mes', $("#coop-mes").val());
        if ($("#coop-agree").prop("checked")){
            data.append('agree', $("#coop-agree").val());
        }
        data.append('form_name',  $("#form_name").val());

        const $target = $(e.target).closest('form');
        $.ajax({
            url: '/ajax/sendform',
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
            success: data => {
                const $error = $target.find('.b-error');
                const $flashes = $target.find('.b-flashes');
                $error.find('.b-wrapper').empty();
                $flashes.find('.b-wrapper').empty();

                if (data.status) {
                    $flashes
                        .find('.b-wrapper')
                        .append(
                            `<div class="b-flashes__item">Ваш запрос успешно отправлен! Наш менеджер скоро свяжется с Вами</div>`
                        );

                    $('div.b-file__name').html('');
                    $target.get(0).reset();

                } else {
                    for (let e in data.errors) {
                        $error
                            .find('.b-wrapper')
                            .append(
                                `<div class="b-error__item">${
                                    data.errors[e]
                                    }</div>`
                            );
                    }
                }
            },
        });
    });
