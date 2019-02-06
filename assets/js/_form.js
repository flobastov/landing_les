import $ from 'jquery';
/* Mask */
import Inputmask from "inputmask/dist/inputmask/inputmask.numeric.extensions";

$(document)
    .ready(() => {
		/* Active */
        const $field = $('.js-field');
        if ($field.length) {
            $field.each(function () {
                isActive($(this));
            });
        }
		/* Mask */
		const $phone = $('[type="tel"]');
		if ($phone.length) {
			const im = new Inputmask('+7(999)999-99-99');
			$phone.each((index, elem) => im.mask(elem));
		}

    })
	/* Active */
    .on('input change', '.js-field', e => isActive($(e.target).closest('.js-field')));
/* Active */
const isActive = $field => {
    const $input = $field.parent('.b-form__elem');
    $field.val().length && !$field.hasClass('is-active') ? $input.addClass('is-active') : $input.removeClass('is-active');
};