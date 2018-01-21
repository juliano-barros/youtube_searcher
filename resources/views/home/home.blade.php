@extends('layouts.blank')

@section('content')

	<div class="container">
		<div class="row">
			<div class="navbar navbar-default navbar-fixed-top container">
				<div class="form-group col-sm-12 .text-center">
					<h1><p class="text-center text-primary">Youtube S<small>earcher</small></p></h1>
				</div>
				<div class="col-sm-12 ">
					<form action="/api/searchyoutube" id="searchYoutube" > 
					 	<input type="hidden" class="form-control col-md-10" id="nextpage" name="nextpage">
						<div class="form-inline">
					 		<input type="text" class="form-control col-md-10" id="search" name="search">
							<button type="submit" class="btn btn-success col-md-2">Search</button>
						</div>
					</form>
				</div>
			</div>
			<div id="player" class="form-control"></div>
			<div class="form-control" id="groupListVideos" >
				<ul class="list-group" id="listVideos">
  				</ul>
				<div id="loading" style="display: none;font-weight: bold; text-align: center;"> Loading... </div>
			</div>
		</div>
	</div>


@endsection

@section('script')

<script type="text/javascript">


    var frm = $('#searchYoutube');

    var nextPage = null;

    var player;

    var playVideoOnLoad = false;

    var loading = false;

    var onClickVid = function(element){
    	$('body').scrollTop(0);
    	player.loadVideoById($(element.target).attr('data-id'));
    }

    function searchVideos(){
    	if ( ! loading ){
    		loading = true;

    		$('#loading').css('display', 'block');

	        $.ajax({
	            type: 'post',
	            url: frm.attr('action'),
	            data: frm.serialize(),
	            success: function (data) {

	            	var obj = JSON.parse(data);

	            	for (var i = 0; i < obj.items.length ; i++) {
	            		if ( ( i === 0 ) && playVideoOnLoad ) {
		            		player.loadVideoById(obj.items[0].id.videoId);
		            		playVideoOnLoad = false;
		            	}

		            	var imgVid = '<img src="' +obj.items[i].snippet.thumbnails.default.url + '" class="img-thumbnail" data-id="' + obj.items[i].id.videoId + '"/>';

					 	$('#listVideos').append( '<li class="list-group-item" data-id="' + obj.items[i].id.videoId + '"><a href="#" data-id="' + obj.items[i].id.videoId + '">' + imgVid + 
					 		 obj.items[i].snippet.title + '<br>' + obj.items[i].snippet.description + '</a></li>' )
						
	            	}
	            	$( ".list-group-item").click(onClickVid);

	            	$("#nextpage").val( obj.nextPageToken );
	            	
		    		$('#loading').css('display', 'none');

	            	loading = false;

	            }
	        });
	    }

    }

    frm.submit(function (ev) {
    	ev.preventDefault();
    	$("#nextpage").val("");
       	$('#listVideos').empty();
       	playVideoOnLoad = true;
    	searchVideos();
        
    });

	var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


	// 3. This function creates an <iframe> (and YouTube player)
	//    after the API code downloads.
	function onYouTubeIframeAPIReady() {
		player = new YT.Player('player', {
	    	height: '360',
	      	width: '640',
	      	videoId: '',
	      	events: {
	        	'onReady': onPlayerReady,
	        	'onStateChange': onPlayerStateChange
	      	}
	    });
  	}

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
     	event.target.playVideo();
  	}

	// 5. The API calls this function when the player's state changes.
  	//    The function indicates that when playing a video (state=1),
  	//    the player should play for six seconds and then stop.
  	var done = false;
  	function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
  	}

  	function stopVideo() {
    	player.stopVideo();
    } 


    window.onscroll = function(ev) {
    	if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    		playVideoOnLoad = false;
        	searchVideos();
    	}
	};   
    
</script>

@endsection