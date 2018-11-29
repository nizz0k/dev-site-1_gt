




(function(window, $, undefined){
	console.log("started");
	$.noConflict();



	$.fn.is_on_screen = function(){

		var win = $(window);

		var viewport = {
		    top : win.scrollTop(),
		    left : win.scrollLeft()
		};
		viewport.right = viewport.left + win.width();
		viewport.bottom = viewport.top + win.height();

		var bounds = this.offset();
		bounds.right = bounds.left + this.outerWidth();
		bounds.bottom = bounds.top + this.outerHeight();

		return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

	};


	// Selectors
		var $window = $(window);
			var $document = $(document);
				var $body = $('body');
					var $header = $('#header');
						var $nav = $('nav');
						var $logo = $('header .logo-wrapper');

					var $sidebar = $('#navbar-main');
					// var $sidebar = $('#sidebar');
					var $main = $('main[role="main"]');

					var $footer = $('footer');
		


		//
		var $windowWidth = $window.width();
		var $windowHeight = $window.height();

		var $headerHeight = $header.outerHeight();
		var $mainHeight = $main.outerHeight();
		var $footerHeight = $footer.outerHeight();


	// Handle Variables
		var $fixedFooter = false;
		var $scrollHeader = false;


	// Mobile Menu
		var $isMobileMenuOpen = false;

		var $primaryMenu = $('.primary-menu');
		var $primaryMenuSpacer = $('.primary-menu-spacer');
		

		var $primaryMenuWidth = $('.primary-menu').width();
		$primaryMenuSpacer.width($primaryMenuWidth);
	

	// CSS
		var $sprayCSS = spray({});
		var $mainCSS = {};
		var $skeletonCSS = {};



	// Components
		var $testimonials = $('.testimonial');
		var $masonries = $('.masonry');




		setTimeout(function(){
			$body.removeClass('js-not-ready');
		},500);






		var $primaryMenuCounter = 0;
		$('#primary-menu li').each(function(){
			$(this).addClass('pi-'+$primaryMenuCounter);
			$primaryMenuCounter++;
		});


	// Filter
		// isotope 
			/*var $masonry = $('.masonry').isotope({
				// options...
				itemSelector: '.masonry-item',
				// transitionDuration: 250,
				layoutMode: 'packery',
				masonry: {
					// columnWidth: 200
				}
			});*/


		// shuffle

			// var shuffleInstance = new Shuffle(document.getElementById('portfolio-masonry'), {
			//   itemSelector: '.masonry-item',
			//   sizer: '.js-shuffle-sizer'
			// });

			var $masonriesList = [];
			// var $masonries = $('.masonry');
			var Shuffle = window.Shuffle;


			$masonries.each(function(){
				var shuffleInstance = new Shuffle(this, {
				  itemSelector: '.masonry-item',
				  // itemSelector: 'article',
				  // sizer: sizer // could also be a selector: '.my-sizer-element'
				});

				$masonriesList.push(shuffleInstance);

			});

			

			/*
			var Shuffle = window.Shuffle;
			var element = document.querySelector('.masonry');
			// var sizer = element.querySelector('.masonry-item');
			// var sizer = element.querySelector('.small-tile');

			var shuffleInstance = new Shuffle(element, {
			  itemSelector: '.masonry-item',
			  // itemSelector: 'article',
			  // sizer: sizer // could also be a selector: '.my-sizer-element'
			});
			*/


			// $('.masonry').on('layout.shuffle', function(evt, shuffle) {
			//   console.log(shuffle.visibleItems);
			// });

			// shuffleInstance.shuffle('shuffle', 'foo');





		var $activeFilter = [];



		/*var $formMasonry = $('.acf-form-fields').isotope({
			// options...
			itemSelector: '.af-field, .af-submit',
			// transitionDuration: 250,
			layoutMode: 'packery',
			masonry: {
				// columnWidth: 200
			}
		});
		*/


		// setTimeout(function(){
		// 	$masonry.isotope({ 
		// 		filter: '',
  //           // $cat_classes[] = $cat->s'
		// 		// filter: $activeFilter.join(', ')
		// 	});
		// 	console.log("packery");

		// },1000);



		/*$('#myModal').on('shown.bs.modal', function () {
		  $('#myInput').trigger('focus')
		});*/



		// instanciate new modal
		var $modal = new tingle.modal({
		    footer: true,
		    stickyFooter: false,
		    closeMethods: ['overlay', 'escape'],
		    closeLabel: "Close",
		    cssClass: ['team-modal'],
		    onOpen: function() {
		        console.log('modal open');
		    },
		    onClose: function() {
		        console.log('modal closed');
		        $modal.setContent("");
		    },
		});


		$modal.addFooterBtn(''+CLOSE_ICON+'', 'close-modal', function() {
		    // here goes some logic
		    $modal.close();
		});


		var $factsheetModal = new tingle.modal({
		    footer: true,
		    stickyFooter: false,
		    closeMethods: ['overlay', 'escape'],
		    closeLabel: "Close",
		    cssClass: ['factsheet-modal'],
		    onOpen: function() {
		        console.log('modal open');
		    },
		    onClose: function() {
		        console.log('modal closed');
		        $factsheetModal.setContent("");
		    },
		});


		$factsheetModal.addFooterBtn(''+CLOSE_ICON+'', 'close-modal', function() {
		    // here goes some logic
		    $factsheetModal.close();
		});




		var $sdgModal = new tingle.modal({
		    footer: true,
		    stickyFooter: false,
		    closeMethods: ['overlay', 'escape'],
		    closeLabel: "Close",
		    cssClass: ['sdg-modal'],
		    onOpen: function() {
		        console.log('modal open');
		    },
		    onClose: function() {
		        console.log('modal closed');
		        $sdgModal.setContent("");
		    },
		});


		$sdgModal.addFooterBtn(''+CLOSE_ICON+'', 'close-modal', function() {
		    // here goes some logic
		    $sdgModal.close();
		});


		var $smallContentModal = new tingle.modal({
		    footer: true,
		    stickyFooter: false,
		    closeMethods: ['overlay', 'escape'],
		    closeLabel: "Close",
		    cssClass: ['sc-modal'],
		    onOpen: function() {
		        console.log('modal open');
		    },
		    onClose: function() {
		        console.log('modal closed');
		        $smallContentModal.setContent("");
		    },
		});


		$smallContentModal.addFooterBtn(''+CLOSE_ICON+'', 'close-modal', function() {
		    // here goes some logic
		    $smallContentModal.close();
		});




		var $careerModal = new tingle.modal({
		    footer: true,
		    stickyFooter: false,
		    closeMethods: ['overlay', 'escape'],
		    closeLabel: "Close",
		    cssClass: ['career-modal'],
		    onOpen: function() {
		        console.log('modal open');
		    },
		    onClose: function() {
		        console.log('modal closed');
		        $careerModal.setContent("");
		    },
		});


		$careerModal.addFooterBtn(''+CLOSE_ICON+'', 'close-modal', function() {
		    // here goes some logic
		    $careerModal.close();
		});



		$(":file").filestyle();





		function mobileMenu(isMobileMenu) {
			if($isMobileMenu != isMobileMenu) {
				if(isMobileMenu) {
					$body.addClass('mobile-menu');
				} else {
					$body.removeClass('mobile-menu');
				}

				$isMobileMenu = isMobileMenu;
			}
		}

		function showMobileMenu(isMobileMenuOpen) {
			if($isMobileMenuOpen != isMobileMenuOpen) {
				if(isMobileMenuOpen) {
					$body.addClass('mobile-menu-open');
				} else {
					$body.removeClass('mobile-menu-open');
				}

				$isMobileMenuOpen = isMobileMenuOpen;
			}
		}

		// $.ajax({
		//    type: "POST",
		//    url: 'http://greentec/dist/portfolio/farmcrowdy/',
		   
		//    success: function(result){
		//        // console.log(result);
		//        $factsheetModal.setContent(result);
		//        $factsheetModal.open();
		//    }
		// });

		var $tabsUpdateInterval = 0;
		var $tabsUpdated = 0;



		$document.on('click', '.toggle-menu', function(e){
			e.preventDefault();
			showMobileMenu(!$isMobileMenuOpen);
		}).on('click', '.filter-wrapper .toggle-filter', function(e){
			e.preventDefault();
			$('.filter-wrapper').toggleClass('opened');

		}).on('click', '.wpcf7-submit', function(e){
			// e.preventDefault();

			$tabsUpdated = 0;
			$tabsUpdateInterval = setInterval(function(){
				for(var tabs in $tabsSlideshowList) {
					$tabsSlideshowList[tabs].update();
				}
				$tabsUpdated++;
				
				if($tabsUpdated > 10) {
					clearInterval($tabsUpdateInterval);
				}
			},150);

		}).on('mouseenter', '.tile', function(e){
			// $('.tile').addClass('to-back');
			// $(this).removeClass('to-back');
		}).on('mouseleave', '.tile', function(e){
			// $('.tile').removeClass('to-back');
		}).on('click', 'a.team-link[data-modal="team"]', function(e){
			e.preventDefault();
			var handle = $(this);
			var href = handle.attr('href');
			

			// var name = 'next';
			var dataObject = {};
			// dataObject[name] = 1;

			$.ajax({
			   type: "POST",
			   url: href,
			   data: dataObject,
			   /*complete : function() {
			     // success!
			     console.log(dataObject.data);
			   }*/
			   success: function(result){
			       // console.log(result);
			       $modal.setContent(result);
			       $modal.open();
			   }
			});

		}).on('click', 'a.factsheet-link[data-modal="factsheet"]', function(e){
			e.preventDefault();
			var handle = $(this);
			var href = handle.attr('href');
			

			// var name = 'next';
			var dataObject = {};
			// dataObject[name] = 1;

			$.ajax({
			   type: "POST",
			   url: href,
			   data: dataObject,
			   /*complete : function() {
			     // success!
			     console.log(dataObject.data);
			   }*/
			   success: function(result){
			       // console.log(result);
			       $factsheetModal.setContent(result);
			       $factsheetModal.open();
			   }
			});

		}).on('click', '.scm-button[data-modal="sc-modal"]', function(e){
			e.preventDefault();
			var handle = $(this);
			
			var type = handle.attr('data-type');
			var content = $(this).find('.scm-content').html();

			$smallContentModal.setContent(content);
			$smallContentModal.open();

		}).on('click', '.career-link[data-modal="career"]', function(e){
			e.preventDefault();
			var handle = $(this);
			var href = handle.attr('href');
			var type = handle.attr('data-type');
			var content = '<h1>Career</h1><div class="career-content"><p> GreenTec Capital Partners is a fast growing company that is looking to expand its areas of technical and regional expertise by expanding its team. For this reason, we offer jobs, 	internships, and development opportunities. </p> <p> Team members at GreenTec Capital Partners have the opportunity to work in the startup industry around the world. Those opportunities give candidates the chance to advance professionally and see tangible result of their commitment in the growth of the companies we support. </p> <p> A career at GreenTec Capital Partners also offers the opportunity to work abroad in a truly international job capacity. If you seek a challenging job that will give you a chance to shape the future of the new economy, then you have found the best place to make it happen. </p><div class="spacer-60"></div><h4>Software Engineer</h4><small>(Rwanda based)</small> <p> GreenTec Captial is seeking a talented software engineer for a long-term position with one of our partner companies with software and hardware solutions. </p></div>';

			$careerModal.setContent(content);
			$careerModal.open();

		}).on('click', '.sdg-link[data-modal="sdg"]', function(e){
			e.preventDefault();
			var handle = $(this);
			var href = handle.attr('href');
			var type = handle.attr('data-type');
			var content = handle.find('.sdg-modal-content').html();

			/*if(type == 'sdg-1')


			if(type == 'sdg-1') {
				content = '<h1>ARED</h1><div class="sdg-description">Each ARED kiosk represents at least one permanent job and one small business. ARED franchisees earn, on average, double the Rwandan national salary</div>';
			}

			if(type == 'sdg-2') {
				content = '<h1>Farmcrowdy</h1><div class="sdg-description">Farmcrowdy\'s digital agricultural platform brings sponsors together with farmers to increase food production and address issues of food security in Nigeria</div>';
			}

			if(type == 'sdg-3') {
				content = '<h1>Wazi Vision</h1><div class="sdg-description">Wazi Vision uses mobile clinics and an innovative app to bring optometry services and eye care services to rurally living Africans.</div>';
			}

			if(type == 'sdg-4') {
				content = "<h2>No startup currently contributes, use another SDG icon.</h2>";
			}

			if(type == 'sdg-5') {
				content = '<h1>ARED</h1><div class="sdg-description">ARED promotes gender equality and entrepreneurial empowerment for women by subsidizing franchise costs for women and persons with disabilities.</div>';
			}

			if(type == 'sdg-6') {
				content = '<h1>Boreal Light</h1><div class="sdg-description">Boreal Light\'s innovative water desalination systems can provide clean water from brackish or seawater sources for drinking and agricultural applications.</div>';
			}

			if(type == 'sdg-7') {
				content = '<h1>ARED</h1><div class="sdg-description">ARED\'s kiosks are powered by powerful solar panels and provide device charging services at low-cost to help meet unmet energy demand.</div>';
			}

			if(type == 'sdg-8') {
				content = '<h1>Divine Masters Limited</h1><div class="sdg-description">DML provides its out-grower farmers access to training in agricultural best practices, small business management, and financial literacy education coupled with in-kind loans to help improve farmer\'s yields and earnings.</div>';
			}

			if(type == 'sdg-12') {
				content = '<h1>BioPhytoCollines</h1><div class="sdg-description">BioPhyto has developed a patented process to produce organic agricultural fertilizers and pesticides, minimizing health hazards to humans and the environment.</div>';
			}
			*/




			
			/*
<h2>			// var name = 'next';
			var dataObject = {};
			// dataObject[name] = 1;

			$.ajax({
			   type: "POST",
			   url: href,
			   data: dataObject,
			   success: function(result){
			       // console.log(result);
			       $sdgModal.setContent(result);
			       $sdgModal.open();
			   }
			});
			*/



			$sdgModal.setContent(content);
			$sdgModal.open();

		}).on('click', '.categories .filter', function(e){
			e.preventDefault();

			var handle = $(this);
			// var termArgument = '.'+handle.attr("data-taxonomy");
			var termArgument = handle.attr("data-taxonomy");

			if(termArgument == "category-alle") {
				$activeFilter = [];
				$('.categories .filter').removeClass("active");

			} else {
				if(handle.hasClass("active")) {
					handle.removeClass("active");
					$filterTermToRemove = termArgument;
					$activeFilter = $.grep($activeFilter, function(value) {
					  return value != $filterTermToRemove;
					});
					$filterTermToRemove = -1;

				} else {
					handle.addClass("active");
					if($.inArray(termArgument, $activeFilter ) < 0) {
						$activeFilter.push(termArgument);
					}
				}
			}

			// console.log($activeFilter.join(', '));
			// $masonry.isotope({ 
			// 	// filter: $activeFilter.join(', ')
			// 	filter: '.category-cleantech'
			// });

			

			// console.log($activeFilter.join(', '));
			// $newsGrid.isotope({ 
			// 	filter: $activeFilter.join(', ')
			// });

			// $posterGrid.isotope({ 
			// 	filter: $activeFilter.join(', ')
			// });



			for(var i = 0; i < $masonriesList.length; i++) {
				$masonriesList[i].filter($activeFilter);
			}

			

		});




	// Masonry / Isotope

	// $masonries.each(function(){
	// 	$(this).isotope({
	// 		// options...
	// 		itemSelector: '.masonry-item',
	// 		masonry: {
	// 			// columnWidth: 200
	// 		}
	// 	});
	// });

	

	// $('#lines').animateNumber({ number: 165 });





	var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',');
	function animate_stats() {
	  /*$('.stats_number').each(function() {
	     if(!$(this).hasClass("numbered")) {
	        var thisnumber = $(this).attr('title');
	        $(this).animateNumber({ number: thisnumber }, 3000, function() {
	            $(this).addClass('numbered');
	        });
	     }
	  });*/


	  	$('.count-number.animate').each(function(){

	  		if($(this).is_on_screen()) {
				var targetNumber = parseInt( $(this).attr('data-count') );
				// var targetNumber = ( $(this).attr('data-count') );
				console.log(targetNumber);
				$(this).animateNumber({
					number: targetNumber,
					easing: 'easeInQuad',
					numberStep: comma_separator_number_step,
				},3000).removeClass('animate');

			}
		});


	};

	animate_stats();

	$(window).scroll(function(){
	     animate_stats();
	});






	// Sidebar
		var $navbar = $('ul.nav[role="tablist"]');
		var $sections = $('[data-anchor]');
		$sections.each(function(index, element){
			var handle = $(this);
			if(handle.attr('data-anchor-title')) {
				$navbar.append('<li class="nav-item"><a class="nav-link" href="#'+handle.attr('data-anchor')+'">'+'<div class="title"><span>'+handle.attr('data-anchor-title')+'</span></div></a></li>');
			}
		});









	/** External Links **/
	/*
	console.log(location.hostname);
	console.log(HOMEPATH);
	$("a[href^=http],a[href^=https]").each(function(){

      // if(this.href.indexOf(location.hostname) == -1) {
      	console.log(this.href.indexOf(HOMEPATH));
      	console.log(this.href);
      	console.log(HOMEPATH);
      	console.log('- - - -  - - - - -  - - ');

      if(this.href.indexOf(HOMEPATH) == -1) {
         $(this).attr({
            target: "_blank"
         });
      }
   	}).addClass("external");
   	*/

   	//  try{
    //     if(top.location != location) {
    //         $("a[href^='http']")
    //           .not("[href*='"+location.host+"']")
    //           .attr('target','_blank');
    //     }
    // } catch(err) { }
	/** End: External Links **/










	// ScrollTo / ScrollSpy

	$('[data-spy="scroll"]').on('activate.bs.scrollspy', function () {
	  // do something…
	    // console.log('activate.bs.scrollspy', event);
	    // console.log(event.target);

	    // console.log( $($('#navbar-main .active .nav-link').attr('href') ).attr('class') );
	    var currentSection = $($('#navbar-main .active .nav-link').attr('href') );
	    if(currentSection.hasClass('bg-secondary') ) $sidebar.addClass('inverted');
	    else $sidebar.removeClass('inverted');
	})

		$document.on('click', "a[href^='#']", function(e){
			e.preventDefault();

			if(!$(this).hasClass('toggle-menu')) {
				var target = $(this).attr('href');
				target = target.substring(1, target.length);

				scrollTo('section[data-anchor="'+target+'"]');

				if($(this).parent().hasClass('anchor-link')) {
					showMobileMenu(false);
				}
			}
		});

		function scrollTo( target ){

	    	if( $(target).length) {
				var dest = $(target).offset().top;

				$('html, body').stop().animate({
		            scrollTop: dest - parseInt($('body').attr('data-offset')) + 4,
		        }, 600, 'swing');
			}
		}

		if(window.location.hash) {
			var target = window.location.hash;
			target = target.substring(1, target.length);
			setTimeout(function(){
				scrollTo('section[data-anchor="'+target+'"]');
			},500);
		}
		


	 


	// Tabs Slideshow
		var $tabsSlideshowList = [];
		var $tabsSlideshow = $('.tabs-slideshow');



		$tabsSlideshow.each(function(index, element){
			var className = 'tabs-slideshow-'+index;
			var $this = $(this);
			$this.addClass(className);

			// $this.find(".swiper-button-prev").addClass("tabs-slideshow-"+ index + "-btn-prev");
			// $this.find(".swiper-button-next").addClass("tabs-slideshow-"+ index + "-btn-next");
			
			$this.find(".swiper-pagination").addClass("tabs-slideshow-"+ index + "-pagination");


			var visibleSlides = 1;
			var slideshowBreakpoints = {};

			var swiper = new Swiper('.'+className + ' .swiper-container', {

		  		preloadImages: true,
				lazyLoading: true,
				keyboardControl: true,

				autoHeight: true,

				loop: true,

				// autoplay: 4000,
				// autoplay: {
				//     delay: 4000,
				// },
				autoplayDisableOnInteraction: false,
				speed: 550,

				allowTouchMove: false,
				
				// effect: 'fade',
				
				// fadeEffect: {
				//     crossFade: true
				// },

				

				pagination: {
					el: ".tabs-slideshow-"+ index + "-pagination",
					clickable: true,
					renderBullet: function (index, className) {
						// console.log($(this.slides[index]).attr('data-label') );
						return '<button class="' + className + '">' + $(this.slides[index + 1]).attr('data-label') + '</button>';
					}
				},

				

				// navigation: {
				// 	nextEl: ".tabs-slideshow-"+ index + "-btn-next",
				// 	prevEl: ".tabs-slideshow-"+ index + "-btn-prev",
				// },


		    });


		    $tabsSlideshowList.push(swiper);
		});



	// setInterval(function(){
	// 	// $window.trigger('resize');
	// 	// $tabsSlideshowList.each(function(index,element){
	// 	// 	$(this).update();
	// 	// });

	// 	for(var tabs in $tabsSlideshowList) {
	// 		console.log($tabsSlideshowList[tabs]);

	// 		$tabsSlideshowList[tabs].update();
	// 	}
	// },1000);

	// for(var tabs in $tabsSlideshowList) {
	// 	console.log($tabsSlideshowList[tabs]);

	// 	$tabsSlideshowList[tabs].update();
	// }

	 


	// Hero Slideshow
		var $heroSlideshowList = [];
		var $heroSlideshow = $('.hero-slideshow');

		$heroSlideshow.each(function(index, element){
			var className = 'hero-slideshow-'+index;
			var $this = $(this);
			$this.addClass(className);

			$this.find(".swiper-button-prev").addClass("hero-slideshow-"+ index + "-btn-prev");
			$this.find(".swiper-button-next").addClass("hero-slideshow-"+ index + "-btn-next");
			
			$this.find(".swiper-pagination").addClass("hero-slideshow-"+ index + "-pagination");


			var visibleSlides = 1;
			var slideshowBreakpoints = {};

			var swiper = new Swiper('.'+className + ' .swiper-container', {

		  		preloadImages: true,
				lazyLoading: true,
				keyboardControl: true,

				autoHeight: true,

				loop: true,

				// autoplay: 4000,
				autoplay: {
				    delay: 4000,
				},
				autoplayDisableOnInteraction: false,
				speed: 750,
				
				effect: 'fade',
				
				fadeEffect: {
				    crossFade: true
				},

				allowTouchMove: false,

				

				pagination: {
					el: ".hero-slideshow-"+ index + "-pagination",
					clickable: true,
				},

				navigation: {
					nextEl: ".hero-slideshow-"+ index + "-btn-next",
					prevEl: ".hero-slideshow-"+ index + "-btn-prev",
				},


		    });


		    $heroSlideshowList.push(swiper);
		});


	 


	// Newsticker Slideshow
		var $newstickerSlideshowList = [];
		var $newstickerSlideshow = $('.newsticker-slideshow');

		$newstickerSlideshow.each(function(index, element){
			var className = 'newsticker-slideshow-'+index;
			var $this = $(this);
			$this.addClass(className);

			// $this.find(".swiper-button-prev").addClass("newsticker-slideshow-"+ index + "-btn-prev");
			// $this.find(".swiper-button-next").addClass("newsticker-slideshow-"+ index + "-btn-next");
			
			// $this.find(".swiper-pagination").addClass("newsticker-slideshow-"+ index + "-pagination");


			var visibleSlides = 1;
			var slideshowBreakpoints = {};

			var swiper = new Swiper('.'+className + ' .swiper-container', {

		  		preloadImages: true,
				lazyLoading: true,
				keyboardControl: true,

				autoHeight: false,
				height: 65,
				direction: 'vertical',
				loop: true,

				// autoplay: 4000,
				// autoplayDisableOnInteraction: false,
				autoplay: 4000,
				autoplay: {
				    delay: 2000,
				},
				speed: 750,
				
				effect: 'fade',
				
				fadeEffect: {
				    crossFade: true
				},
				allowTouchMove: false,

				

				// pagination: {
				// 	el: ".newsticker-slideshow-"+ index + "-pagination",
				// 	clickable: true,
				// },

				// navigation: {
				// 	nextEl: ".newsticker-slideshow-"+ index + "-btn-next",
				// 	prevEl: ".newsticker-slideshow-"+ index + "-btn-prev",
				// },


		    });


		    $newstickerSlideshowList.push(swiper);
		});








// Content Slideshow
		var $contentSlideshowList = [];
		var $contentSlideshow = $('.content-slideshow');

		$contentSlideshow.each(function(index, element){
			var className = 'content-slideshow-'+index;
			var $this = $(this);
			$this.addClass(className);

			$this.find(".swiper-button-prev").addClass("content-slideshow-"+ index + "-btn-prev");
			$this.find(".swiper-button-next").addClass("content-slideshow-"+ index + "-btn-next");
			
			$this.find(".swiper-pagination").addClass("content-slideshow-"+ index + "-pagination");


			var visibleSlides = 1;
			var slideshowBreakpoints = {};

			var swiper = new Swiper('.'+className + ' .swiper-container', {

		  		preloadImages: true,
				lazyLoading: true,
				keyboardControl: true,

				autoHeight: true,

				loop: true,

				autoplay: 4000,
				autoplayDisableOnInteraction: false,
				speed: 750,
				
				effect: 'fade',
				
				fadeEffect: {
				    crossFade: true
				},
				allowTouchMove: false,
				

				pagination: {
					el: ".content-slideshow-"+ index + "-pagination",
					clickable: true,
				},

				navigation: {
					nextEl: ".content-slideshow-"+ index + "-btn-next",
					prevEl: ".content-slideshow-"+ index + "-btn-prev",
				},


		    });


		    $contentSlideshowList.push(swiper);
		});



		/*
		var $lazyload =  new LazyLoad({
		    data_src: "src",
		    data_srcset: "src-set",
		    show_while_loading: true,
		    callback_set: function (img) {
		    	// console.log(img);
		    }
		});
		*/

		var $lazyload = new LazyLoad();





	// Testimonials
		var $testimonialList = [];
		var $testimonials = $('.testimonials');

		$testimonials.each(function(index, element){
			var className = 'testimonial-'+index;
			var $this = $(this);
			$this.addClass(className);

			$this.find(".swiper-button-prev").addClass("testimonial-"+ index + "-btn-prev");
			$this.find(".swiper-button-next").addClass("testimonial-"+ index + "-btn-next");
			
			$this.find(".swiper-pagination").addClass("testimonial-"+ index + "-pagination");


			var visibleSlides = 1;
			var slideshowBreakpoints = {};

			var swiper = new Swiper('.'+className + ' .swiper-container', {

		  		preloadImages: true,
				lazyLoading: true,
				keyboardControl: true,

				autoHeight: true,

				loop: true,

				autoplay: 4000,
				autoplayDisableOnInteraction: false,
				speed: 750,
				
				effect: 'fade',
				
				fadeEffect: {
				    crossFade: true
				},

				allowTouchMove: false,

				pagination: {
					el: ".testimonial-"+ index + "-pagination",
					clickable: true,
				},

				navigation: {
					nextEl: ".testimonial-"+ index + "-btn-next",
					prevEl: ".testimonial-"+ index + "-btn-prev",
				},


		    });


		    $testimonialList.push(swiper);
		});





	// Testimonials with Portraits
		var $testimonialPortraitsList = [];
		var $testimonialPortraits = $('.testimonials-portraits');

		$testimonialPortraits.each(function(index, element){
			var className = 'testimonials-portraits-'+index;
			var classNameAuthors = 	className + '-authors';
			var classNameQuotes = 	className + '-quotes';
			
			var $this = $(this);

			// console.log("portraits");



			$this.find('.testimonials-portraits-quotes').addClass(classNameQuotes);

				$this.find(".testimonials-portraits-quotes .swiper-button-prev").addClass("testimonials-portraits-quotes-"+ index + "-btn-prev");
				$this.find(".testimonials-portraits-quotes .swiper-button-next").addClass("testimonials-portraits-quotes-"+ index + "-btn-next");


				var quotes = new Swiper('.'+classNameQuotes + ' .swiper-container', {
					slidesPerView: 1,
					loop: false,


					 keyboard: {
					    enabled: true,
					    onlyInViewport: false,
					  },

					 autoHeight: true,

					 
					 simulateTouch: false,
					 shortSwipes: false,
					 followFinger: false,
					 allowTouchMove: false,

					effect: 'fade',
				
					fadeEffect: {
					    crossFade: true
					},


					

					

					navigation: {
						prevEl: ".testimonials-portraits-quotes-"+ index + "-btn-prev",
						nextEl: ".testimonials-portraits-quotes-"+ index + "-btn-next",
					},
				});


			$this.addClass(className).find('.testimonials-portraits-authors').addClass(classNameAuthors);

				$this.find(".testimonials-portraits-authors .swiper-button-prev").addClass("testimonials-portraits-authors-"+ index + "-btn-prev");
				$this.find(".testimonials-portraits-authors .swiper-button-next").addClass("testimonials-portraits-authors-"+ index + "-btn-next");

			


				var authors = new Swiper('.'+classNameAuthors + ' .swiper-container', {
					// spaceBetween: 40,
					centeredSlides: true,
					slidesPerView: 'auto',
					// slidesPerView: 5,
					loop: true,
					loopAdditionalSlides: 5,

					 keyboard: {
					    enabled: true,
					    onlyInViewport: false,
					  },
					  allowTouchMove: false,

					on: {
						slideChange: function() {
							// console.log("change");
							// console.log(this);
							// console.log(this.realIndex);
							quotes.slideTo(this.realIndex);
						},
					},
					

					navigation: {
						prevEl: ".testimonials-portraits-authors-"+ index + "-btn-prev",
						nextEl: ".testimonials-portraits-authors-"+ index + "-btn-next",
					},
				});

		});














	// $('.swiper-container .swiper-pagination').addClass('outer-pagination').insertAfter('.swiper-container');


	


	$window.resize(function(){
		resize();

		// console.log("resize");
	}).scroll(function(e){
		checkScrollHeader();
	});

	function checkScrollHeader() {
		var currentScrollPos = $window.scrollTop();
		// if(currentScrollPos > 50) scrollHeader(true);
		// else scrollHeader(false);
	}
	checkScrollHeader();


	resize();
	setTimeout(function(){resize();},250);
	setTimeout(function(){resize();},550);

	function resize() {
		$windowWidth = $window.width();
		$windowHeight = $window.height();
		
		$headerHeight = $header.outerHeight();
		$mainHeight = $main.outerHeight();
		$footerHeight = $footer.outerHeight();
		

		checkFooter();
		updateCSS();
	}



	function checkFooter() {
		// console.log('header: ' + $headerHeight);
		// console.log('main: ' + $mainHeight);
		// console.log('footer: ' + $footerHeight);


		if($windowHeight > ($headerHeight + $mainHeight + $footerHeight) ) fixedFooter(true);
		else fixedFooter(false);
	}

	scrollHeader(true);
	function scrollHeader(scrollHeader) {
		if($scrollHeader != scrollHeader) {
			if(scrollHeader) {
				$body.addClass('scroll-header');
			} else {
				$body.removeClass('scroll-header');
			}

			$scrollHeader = scrollHeader;
		}
	}


	function fixedFooter(fixedFooter) {
		if($fixedFooter != fixedFooter) {
			if(fixedFooter) {
				$body.addClass('fixed-footer');
			} else {
				$body.removeClass('fixed-footer');
			}

			$fixedFooter = fixedFooter;
		}
	}



	function updateCSS() {

		var handle = {};






		$mainCSS['.window-height'] = {
			'height': $windowHeight + 'px',
		};

		$mainCSS['.vision-height'] = {
			'height': ( $windowHeight - $headerHeight + 5)+ 'px',
		};

		$mainCSS['.no-page-padding-top .vision-height'] = {
			'height': ( $windowHeight )+ 'px',
		};

		// $mainCSS['.home .vision-height'] = {
		// 	'height': ( $windowHeight )+ 'px',
		// };

		$mainCSS['body'] = {
			'padding-top': $headerHeight + 'px',
		};

		$mainCSS['.factsheet-modal'] = {
			'padding-top': $headerHeight + 'px',
		};
		$mainCSS['.factsheet-modal.factsheet-modal'] = {
			'padding-top': $headerHeight + 'px',
		};

		// $mainCSS['body.home'] = {
		// 	'padding-top': '0px',
		// };

		$mainCSS['body.no-page-padding-top'] = {
			'padding-top': '0px',
		};

		$mainCSS['body.fixed-footer'] = {
			'padding-bottom': $footerHeight + 'px',
		};





	    $.extend(handle, $mainCSS);
	    $.extend(handle, $skeletonCSS);

	    $sprayCSS.unstyle();
		$sprayCSS = spray(handle);
		// console.log("spray");
	};


})(window, jQuery)