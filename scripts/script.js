let videoTitle = document.getElementById('video-title');
let playerContainer = document.getElementById('dplayer');
let playedVideos = [];
let xDown = null;
let yDown = null;

async function getVideo() {
    try {
        let response = await fetch('get_video.php');
        let video = await response.json();
        playedVideos.push(video);
        return video;
    } catch (error) {
        console.error('Error during fetch:', error);
    }
}

async function playVideo() {
    let video = await getVideo();
    playerContainer.innerHTML = '';
    let dp = new DPlayer({
        container: playerContainer,
        video: {
            url: video.url_video,
            type: isM3U8(video.url_video) ? 'hls' : 'auto'
        },
        autoplay: true,
        loop: true,
        volume: 0.3,
        contextmenu: [],
    });

    if (isM3U8(video.url_video) && !dp.video.canPlayType('application/vnd.apple.mpegurl')) {
        const hls = new Hls();
        hls.loadSource(video.url_video);
        hls.attachMedia(dp.video);
    }

    videoTitle.textContent = video.vod_name;

    let fullContentLink = document.getElementById('full-content');
    fullContentLink.href = video.video_html;
    fullContentLink.style.display = 'block';
}

function isM3U8(url) {
    return /\.m3u8($|\?)/i.test(url);
}

function getTouches(evt) {
    return evt.touches || evt.originalEvent.touches;
}

function handleTouchStart(evt) {
    const firstTouch = getTouches(evt)[0];
    xDown = firstTouch.clientX;
    yDown = firstTouch.clientY;
}

function handleTouchMove(evt) {
    if (!xDown || !yDown) {
        return;
    }

    let xUp = evt.touches[0].clientX;
    let yUp = evt.touches[0].clientY;

    let xDiff = xDown - xUp;
    let yDiff = yDown - yUp;

    if (Math.abs(xDiff) > Math.abs(yDiff)) {
        if (xDiff > 10) {
            window.location.href = './Picture';
        }
    } else {
        if (yDiff > 0) {
            playVideo();
        } else {
            if (playedVideos.length > 1) {
                playedVideos.pop();
            }
        }
    }

    xDown = null;
    yDown = null;
}

function adjustTitlePosition() {
    if (window.innerWidth <= 200) {
        videoTitle.style.bottom = '';
        videoTitle.style.top = '3%';
    } else {
        videoTitle.style.bottom = '10%';
        videoTitle.style.top = '';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    playVideo();
});

window.addEventListener('resize', adjustTitlePosition);
document.addEventListener('touchstart', handleTouchStart, false);
document.addEventListener('touchmove', handleTouchMove, false);
