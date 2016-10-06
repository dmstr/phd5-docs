Preloader
=========

What is a preloader?
--------------------

Preloaders give the viewer something to look at while the Application loads.
Check out the [DEMO](https://www.connectivity.mercedes-benz.com/de)
 	 


HTML
----

Add this HTML code in to your view and replace the image source with your favorite one.

	<div class="preloader-container">
		<div class="preloader-image-container">
			<img class="preloader-image"
			src="your_preloader_image.png"
			alt="preloader">
		</div>
	</div>

less
----

With the follow styling rules we will tell the preloader container to occupy the entire width and height of the screen
and make it the most upper layer in the stack because it must MASK all the content that still loading behind.
The preloader image container is only a helper wich allows us to perfect center the image.
The preloader-image "animation: load 1s linear infinite;" calls the infinite looped css animation (rotate 360 degrees)



	.preloader-container {

		background:rgba(0,0,0,0.9);
		position:fixed;
			top:0;
			right:0;
			bottom:0;
			left:0;
		z-index: 1000;

		.preloader-image-container {

			height: 100%;
			text-align: center;

			.preloader-image {
				display: inline-block;
				animation: load 1s linear infinite;
				position: relative;
				top: 50%;
    		}

		}


		@keyframes load {

			to {
				-ms-transform: rotate(360deg);
      			-webkit-transform: rotate(360deg);
      			transform: rotate(360deg);
			}

		}

	}

JAVASCRIPT
----------

While the page is complete loaded then we can hide the preloader

	$(window).load(function(){
	
    	$('.preloader-container').fadeOut();
    	
	});
	
Check out the [DEMO](https://www.connectivity.mercedes-benz.com/de)


