import $ from 'jquery';
import './vendor/iziModal';
import './_tabs';
import './_form';
import './_forms';
import './_scrollspy';



$(document)
    .ready(() => {

        $('.b-modal').iziModal({
            width: 'auto',
            overlayColor: 'rgba(0, 0, 0, 0.4)',
            padding: 0,
            radius: 5,
            focusInput: false
        });

        $('.b-btn__send').click(function (event) {
            const form_name = event.target.getAttribute('data-form-name');
            $('#form_name').val(form_name);
            $('#get-coop').iziModal('open', {
                transition: 'fadeInDown'
            });
        });

		//add youtube api
		var tag = document.createElement("script");
		tag.src = "http://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName("script")[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	})
    .on('click', '.b-header-nav__burger', e => {
        $(e.target).closest('.b-header-nav__burger').toggleClass('is-active');
        $('.b-header-mob-nav').toggleClass('is-open');
    })
    /* File */
    .on('change', '.b-file__field', e => {
        const $target = $(e.target).closest('.b-file__field');
        const $name = $target.siblings('.b-file__label').children('.b-file__name');
        if ($target.val()) {
            $name.text($target.val().split('\\').pop());
            $name.addClass('is-active');
        } else {
            $name.text('');
            $name.removeClass('is-active');
        }
    });
//youtube init
window.onYouTubeIframeAPIReady = () => {
	let video_1 = new YT.Player("video_1", {
		videoId: "DoIGzxw9NOM",
		playerVars: {
			//'controls': 0,
			//'showinfo': 0,
			//'autoplay': 1,
			//'loop' : 1,
			//'playlist' : 'jKUATHCMgjI',
			//'rel' : 0
		},
		events: {
			onReady: onYouTubePlayerReady
		}
	});
};
const onYouTubePlayerReady = e => {
	let targetYoutubeVideo = e.target,
		videoDomElem = document.getElementById(e.target.getIframe().getAttribute("id")),
		newPlayBtn = videoDomElem.nextElementSibling;

	newPlayBtn.addEventListener("click", function() {
		targetYoutubeVideo.playVideo();
		this.classList.add('is-hidden');
		videoDomElem.parentNode.classList.add('is-play');
	});
};


