<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="C:\xampp\htdocs\web\electronproject\style.css">
</head>
<body>
    <h3 class="heading">video gallery</h3>
    <div class="container">
        <div class="main-video" >
            <div class="video">

            <video src="pexels-mehmet-kılınç-18856748 (2160p).mp4" controls muted autoplay ></video>
            <h3 class="title">01.video title goes here
            </h3>
            </div>
        </div>
        <div class="video-list">
            <div class="vid active" >
            <video src="pexels-mehmet-kılınç-18856748 (2160p).mp4"  muted  ></video>
            <h3 class="title">02.video title goes here
            </h3>

            </div>
            <div class="vid" >
            <video src="pexels-mehmet-kılınç-18856748 (2160p).mp4"  muted  ></video>
            <h3 class="title">03.video title goes here
            </h3>

            </div>  <div class="vid" >
            <video src="pexels-mehmet-kılınç-18856748 (2160p).mp4"  muted  ></video>
            <h3 class="title">04.video title goes here
            </h3>

            </div>  <div class="vid" >
            <video src="pexels-mehmet-kılınç-18856748 (2160p).mp4"  muted  ></video>
            <h3 class="title">05.video title goes here
            </h3>

            </div>
        </div>





    </div>
    <script>
        let listVideo = document.querySelector('.video-list .vid');
        let mainVideo =document.querySelector('.main-video video');
        let title =document.querySelector('.main-video .title');

        listVideo.foreach(video=>{
            video.onclick =() =>{
                listVideo.foreach(vid => vid.classList.remove('active'));
                video.classList.add('active');
                if(video.classList.contains('active')){
                    let src = video.children[0].getAttribute('src');
                    mainVideo.src = src;
                    let text = video.children[1].innerHTML;
                }


            };



        });



    </script>

    
</body>
</html>