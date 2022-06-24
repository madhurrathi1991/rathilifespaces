<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<?php include 'head.php'; ?>
	<body class="" style="">
		<h1 class="seoHeaderText">Blog</h1>
		<div class="">
			<div class="desktopMenuOverlay"></div>

<?php include 'header.php'; ?>
<div class="header__search__popup">
	<div class="header__search__popup__close">
		<img class="w-100" width="30" height="30" src="<?= base_url() ?>assets/images/icons/close.svg" alt="Close" title="">
	</div>
	<div class="header__search__popupInner d-flex align-items-center justify-content-center w-100 h-100">
		<div class="searchboxWrapper theme_section w-100 text-center">
			<div class="navbar-brand">
				<a href="index.html">
					<img class="logo w-100" width="150" height="53" src="<?= base_url() ?>assets/images/chandak-logo.svg" alt="Chandak Group" title="Chandak Group">
				</a>
			</div>
	     	<div class="theme_top_bottom pt-0 pb-0">
	         	<div class="searchboxWrpInn">
		            <div class="container">
		               	<div class="searchBox d-flex flex-wrap">
		                  	<div class="searchBoxDropdown d-flex flex-wrap">
		                     	<div class="customDropDown filter_regions" rel="regions">
			                        <select id="selectRegion1" rel="Select location">
			                           <option value="" class="select-dropdown__list-item">All Location</option>
																					<option value="magathane-borivali-east" class="select-dropdown__list-item">Borivali WEH</option>
																					<option value="worli" class="select-dropdown__list-item">Worli</option>
																					<option value="andheri-w" class="select-dropdown__list-item">Andheri(W)</option>
																					<option value="andheri-e" class="select-dropdown__list-item">Andheri(E)</option>
																					<option value="vile-parle" class="select-dropdown__list-item">Vile Parle(W)</option>
																					<option value="goregaon-w" class="select-dropdown__list-item">Goregaon(W)</option>
																					<option value="near-borivali-e-station" class="select-dropdown__list-item">Near Borivali(E) Station</option>
																					<option value="mulund" class="select-dropdown__list-item">Mulund(W)</option>
													                        </select>
			                    </div>
		                     	<div class="customDropDown filter_types" rel="types">
			                        <select id="selectType1" rel="Select Type">
			                           	<option value="" class="select-dropdown__list-item">All types</option>
			                           													<option value="residential" class="select-dropdown__list-item">residential</option>
																						<option value="commercial" class="select-dropdown__list-item">commercial</option>
													                        </select>
		                     	</div>
		                     	<div class="customDropDown filter_status" style="display:none;" rel="status">
			                        <select id="selectStatus1" rel="Select Status">
			                           	<option value="" class="select-dropdown__list-item">All status</option>
			                           	<option value="ongoing" class="select-dropdown__list-item">Ongoing</option>
			                           	<option value="completed" class="select-dropdown__list-item">Completed </option>
			                        </select>
		                     	</div>
		                     	<div class="customDropDown filter_configuration" rel="configuration">
			                        <select id="selectConfig1" rel="select configuration">
			                           	<option value="" class="select-dropdown__list-item">All configurations</option>
			                           				                                	<option value="1-bhk" class="select-dropdown__list-item">1 BHK</option>
			                           				                                	<option value="2-bhk" class="select-dropdown__list-item">2 BHK</option>
			                           				                                	<option value="2-5-bhk" class="select-dropdown__list-item">2.5 BHK</option>
			                           				                                	<option value="3-bhk" class="select-dropdown__list-item">3 BHK</option>
			                           				                        </select>
		                     	</div>
		                  	</div>
		                  	<div class="searchBtn d-flex align-items-center justify-content-center" id="main_search">
		                     	<svg viewBox="0 0 20 20" fill="none"><path d="M18.1239 17.2411L13.4039 12.5211C14.5382 11.1595 15.1038 9.41291 14.9831 7.64483C14.8624 5.87675 14.0647 4.22326 12.7559 3.02834C11.4472 1.83341 9.72813 1.18906 7.95639 1.22932C6.18465 1.26958 4.49663 1.99134 3.2435 3.24448C1.99037 4.49761 1.2686 6.18562 1.22834 7.95736C1.18808 9.7291 1.83244 11.4482 3.02736 12.7569C4.22228 14.0657 5.87577 14.8634 7.64385 14.9841C9.41194 15.1047 11.1585 14.5391 12.5202 13.4049L17.2402 18.1249L18.1239 17.2411ZM2.49891 8.12489C2.49891 7.01237 2.82881 5.92483 3.4469 4.99981C4.06498 4.07478 4.94348 3.35381 5.97132 2.92807C6.99915 2.50232 8.13015 2.39093 9.2213 2.60797C10.3124 2.82501 11.3147 3.36074 12.1014 4.14741C12.8881 4.93408 13.4238 5.93636 13.6408 7.02751C13.8579 8.11865 13.7465 9.24965 13.3207 10.2775C12.895 11.3053 12.174 12.1838 11.249 12.8019C10.324 13.42 9.23643 13.7499 8.12391 13.7499C6.63258 13.7482 5.2028 13.1551 4.14826 12.1005C3.09373 11.046 2.50057 9.61622 2.49891 8.12489Z" fill="#5C5447"></path></svg>
		                     	<h3>search properties</h3>
		                  	</div>
		               	</div>
		            </div>
		        </div>
	      	</div>
	   	</div>
	</div>
</div>				<div class="light_bg">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb">
					<a data-aos="fade-in" class="breadcrumb-item h2" href="index.html">Home</a>
					<a data-aos="fade-in" data-aos-delay="200" class="breadcrumb-item h2 active" href="#">Blog</a>
				</div>
			</div>
		</div>
	</div>

   	<div class="otherPagesHead position-relative pb-0">
		<div class="container">
			<div class="theme_header">
			   <h2 data-aos="fade-in" class="big_title">Blog</h2>
			</div>
		</div>
	</div>

		   	<div class="chandak_insider theme_section position-relative first_load">
	      	<div class="theme_top_bottom pt-0">
	         	<div class="container">
		            <div class="svgDrawingEle">
		               <svg class="w-100" viewBox="0 0 287 387" fill="none">
		                  <mask id="insiderEle0" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="69" y="231" width="136" height="104">
		                  <path d="M202.608 299.721L120.279 233.148L70.6959 326.828L140.892 333.46L202.608 299.721Z" fill="#C4C4C4" stroke="black" stroke-width="2"/>
		                  </mask>
		                  <g mask="url(#insiderEle0)">
		                  <path d="M69.4697 324.586L140.794 331.566L203.402 297.063M73.6599 317.023L139.02 322.931L196.569 291.766M77.6287 309.314L137.396 315.031L190.066 286.209M81.6353 301.789L135.735 306.948L183.233 280.911M85.8256 294.226L134.112 299.048L176.4 275.614M89.8321 286.701L132.451 290.964L169.751 270.278M93.8764 279.36L130.789 282.88L163.139 265.127M97.8829 271.835L129.128 274.796L156.49 259.791M102.219 264.05L127.467 266.713L149.803 254.272M106.042 256.563L125.806 258.629L142.97 248.974M110.049 249.038L124.107 250.361L136.137 243.677M114.239 241.475L122.446 242.278L129.304 238.379M117.619 233.696L120.747 234.01L123.314 232.525" stroke="#E9DBC1" stroke-width="2"/>
		                  </g>
		                  <mask id="insiderEle1" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="14" y="117" width="115" height="109">
		                  <path d="M16.4345 194.383L118.045 224.137L127.749 118.59L60.4082 139.488L16.4345 194.383Z" fill="#C4C4C4" stroke="black" stroke-width="2"/>
		                  </mask>
		                  <g mask="url(#insiderEle1)">
		                  <path d="M129.745 120.188L61.2295 141.199L16.7256 197.142M128.789 128.781L66.1909 148.486L25.0713 199.402M128.093 137.423L70.73 155.152L33.2124 202.027M127.292 145.911L75.3748 161.974L41.5581 204.286M126.336 154.504L79.9139 168.64L49.9038 206.546M125.534 162.991L84.5586 175.462L58.0945 208.911M124.627 171.324L89.2033 182.283L66.1795 211.121M123.826 179.811L93.8481 189.105L74.3702 213.485M122.82 188.665L98.4928 195.926L82.6664 216.005M122.174 197.047L103.137 202.747L91.0121 218.265M121.373 205.534L107.888 209.724L99.3577 220.524M120.416 214.127L112.532 216.546L107.703 222.783M120.291 222.608L117.283 223.522L115.485 225.881" stroke="#E9DBC1" stroke-width="2"/>
		                  </g>
		                  <mask id="insiderEle2" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="122" y="115" width="110" height="109">
		                  <path d="M134.495 117.063L124.003 222.419L229.528 212.48L196.562 150.152L134.495 117.063Z" fill="#C4C4C4" stroke="black" stroke-width="2"/>
		                  </mask>
		                  <g mask="url(#insiderEle2)">
		                  <path d="M228.324 214.735L195.03 151.273L131.835 117.856M219.702 215.381L188.784 157.494L131.155 126.476M211.079 216.292L183.07 163.185L130.077 134.961M202.59 217.07L177.222 169.009L129.396 143.581M193.968 217.716L171.508 174.7L128.715 152.2M185.478 218.495L165.661 180.524L127.903 160.686M177.121 219.141L159.814 186.347L127.223 169.04M168.632 219.919L153.966 192.171L126.41 177.527M159.745 220.565L148.119 197.995L125.464 186.146M151.387 221.476L142.272 203.819L124.783 194.765M142.898 222.255L136.292 209.775L124.103 203.384M134.276 222.9L130.444 215.598L123.422 212.003M125.917 224.343L124.464 221.554L121.814 220.223" stroke="#E9DBC1" stroke-width="2"/>
		                  </g>
		                  <mask id="insiderEle3" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="123" y="160" width="106" height="139">
		                  <path d="M206.962 161.761L125.225 229.059L207.051 296.429L227.633 228.991L206.962 161.761Z" fill="#C4C4C4" stroke="black" stroke-width="2"/>
		                  </mask>
		                  <g mask="url(#insiderEle3)">
		                  <path d="M204.607 297.18L225.756 228.707L204.517 160.449M198.039 291.558L216.941 228.712L197.956 166.08M191.283 286.123L208.876 228.718L191.207 171.336M184.715 280.688L200.623 228.723L184.647 176.967M178.147 275.065L192.558 228.729L178.086 182.598M171.579 269.631L184.306 228.734L171.525 188.042M165.198 264.196L176.053 228.739L165.151 193.485M158.63 258.761L167.8 228.745L158.59 198.929M151.874 252.951L159.548 228.75L151.842 204.373M145.306 247.703L151.295 228.756L145.281 210.004M138.737 242.269L142.855 228.761L138.72 215.635M132.169 236.646L134.602 228.767L132.159 221.266M125.226 231.774L126.162 228.773L125.222 225.96" stroke="#E9DBC1" stroke-width="2"/>
		                  </g>
		                  <mask id="insiderEle4" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="13" y="198" width="105" height="128">
		                  <path d="M66.3684 323.661L115.819 230.042L14.3384 199.45L21.3636 269.608L66.3684 323.661Z" fill="#C4C4C4" stroke="black" stroke-width="2"/>
		                  </mask>
		                  <g mask="url(#insiderEle4)">
		                  <path d="M16.3027 197.814L23.2039 269.146L69.1298 323.928M24.5315 200.468L31.3347 265.74L73.0107 316.202M32.8608 202.876L38.7735 262.624L77.2095 308.749M41.0172 205.356L46.3854 259.436L81.0904 301.023M49.246 208.01L53.8242 256.32L84.9713 293.297M57.4023 210.491L61.436 253.131L88.9247 285.744M65.3857 213.044L69.0478 249.943L92.705 278.263M73.542 215.524L76.6597 246.754L96.6584 270.71M82.0163 218.278L84.2715 243.566L100.785 263.084M90.1002 220.586L91.8833 240.378L104.666 255.358M98.2565 223.067L99.6681 237.117L108.547 247.632M106.485 225.72L107.28 233.928L112.427 239.906M114.77 227.537L115.065 230.667L117.017 232.9" stroke="#E9DBC1" stroke-width="2"/>
		                  </g>
		                  <mask id="insiderEle5" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="88" y="28" width="111" height="85">
		                  <path d="M90.4145 37.4038L133.011 111.011L197.141 55.0155L146.403 29.8512L90.4145 37.4038Z" fill="#C4C4C4" stroke="black" stroke-width="2"/>
		                  </mask>
		                  <g mask="url(#insiderEle5)">
		                  <path d="M197.415 57.0503L145.932 31.3005L89.0539 39.1687M192.097 61.5169L144.779 38.2867L92.6546 45.1071M186.904 66.1567L143.724 44.6784L95.9336 51.145M181.734 70.6479L142.645 51.2187L99.5344 57.0834M176.417 75.1146L141.59 57.6104L103.135 63.0218M171.247 79.6058L140.511 64.1507L106.587 68.9357M166.103 83.9483L139.432 70.691L110.064 74.7009M160.934 88.4395L138.352 77.2314L113.516 80.6148M155.443 93.0303L137.273 83.7717L116.944 86.6773M150.422 97.546L136.194 90.312L120.545 92.6157M145.253 102.037L135.09 97.001L124.145 98.5541M139.935 106.504L134.011 103.541L127.746 104.492M135.163 111.366L132.907 110.23L130.555 110.606" stroke="#E9DBC1" stroke-width="2"/>
		                  </g>
		                  <mask id="insiderEle6" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="135" y="56" width="86" height="112">
		                  <path d="M201.906 57.8657L137.423 113.313L204.291 166.009L219.66 111.499L201.906 57.8657Z" fill="#C4C4C4" stroke="black" stroke-width="2"/>
		                  </mask>
		                  <g mask="url(#insiderEle6)">
		                  <path d="M202.34 166.654L218.147 111.303L199.919 56.8536M196.969 162.251L211.068 111.459L194.747 61.4884M191.45 158.003L204.592 111.602L189.417 65.8253M186.082 153.751L197.965 111.748L184.246 70.46M180.711 149.349L191.488 111.891L179.074 75.0948M175.343 145.097L184.861 112.037L173.898 79.5789M170.126 140.842L178.234 112.183L168.874 84.0598M164.758 136.591L171.607 112.329L163.698 88.5439M159.233 132.041L164.98 112.475L158.372 93.0314M153.868 127.94L158.352 112.622L153.2 97.6662M148.5 123.689L151.575 112.771L148.029 102.301M143.129 119.286L144.947 112.917L142.857 106.936M137.47 115.493L138.17 113.067L137.367 110.824" stroke="#E9DBC1" stroke-width="2"/>
		                  </g>
		                  <mask id="insiderEle7" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="46" y="37" width="84" height="105">
		                  <path d="M47.8117 140.246L128.444 113.212L86.3877 39.1892L51.5955 83.8771L47.8117 140.246Z" fill="#C4C4C4" stroke="black" stroke-width="2"/>
		                  </mask>
		                  <g mask="url(#insiderEle7)">
		                  <path d="M88.4363 39.3254L52.9214 84.6273L49.2692 141.931M91.7506 45.4283L59.5365 87.1525L55.8072 139.589M95.2595 51.4442L65.5887 89.4627L62.3785 137.582M98.6276 57.4063L71.7816 91.8267L68.9165 135.24M101.942 63.5092L77.8337 94.137L75.4545 132.898M105.31 69.4714L84.0267 96.501L81.9387 130.697M108.537 75.3798L90.2196 98.865L88.2823 128.442M111.905 81.3419L96.4125 101.229L94.7665 126.241M115.307 87.6393L102.605 103.593L101.392 124.093M118.729 93.4607L108.798 105.957L107.93 121.751M122.097 99.4228L115.132 108.375L114.468 119.409M125.411 105.526L121.325 110.739L121.006 117.067M129.222 111.173L127.659 113.156L127.556 115.536" stroke="#E9DBC1" stroke-width="2"/>
		                  </g>
		               </svg>
		            </div>
		            <div class="row">
		               	<div class="col-7 position-relative col-sm-12">
		                  	<div class="chandak_insider_desc">
		                     	<div class="small_title h2" data-aos="fade-in" data-aos-offset="0">FEATURED ARTICLE OF THE WEEK</div>
		                     	<h2 class="big_title mb" data-aos="fade-in" data-aos-delay="100" data-aos-offset="0">Green Living - how impactful is it?</h2>
		                     	<p data-aos="fade-in" data-aos-delay="200" data-aos-offset="0"></p>
		                     	<div class="btnColor1 btn" data-aos="fade-in" data-aos-delay="400" data-aos-offset="0"><a href="<?= base_url('green-living-how-impactful-is-it') ?>">Read More</a></div>
		                  	</div>
		                  
		               	</div>
		               	<div class="col-5 col-sm-12">
		                  	<div class="Insider_img" data-aos="fade-in" data-aos-delay="100" data-aos-offset="0">
		                  				                      	<img class="w-100 lazyload" src="assets/images/placeholder/square.jpg" data-src="https://cdn.chandakgroup.com/chandakgroup/uploads/media/source/Blog_1600px-X-900px_06_oYyJ.jpg" alt="" title="">
		                  	</div>
		               	</div>
		            </div>
	         	</div>
	      	</div>
	   	</div>
	
   	<div class="recent_newsletter_section theme_section position-relative">
      	<div class="theme_top_bottom pt-0">
         	<div class="container">
	            <div class="theme_header d-flex justify-content-between align-items-center">
	               <h2 data-aos="fade-in" class="big_title">recent articles</h2>
	            </div>
	            <div class="row" id="data">
	               
			<div class="col-3 col-md-6 col-xs-12">
				<div class="project_box p-0" data-aos-delay="100">
				 	<a href="#">
				    	<div class="project_box_img">

				    		
				       		<img class="w-100 lazyload" src="assets/images/placeholder/square.jpg" data-src="https://cdn.chandakgroup.com/chandakgroup/uploads/media/source/Blog4_IMG3_wdNX.jpg" alt="" title="">
				       		<div class="project_bx_overlay d-flex align-items-center justify-content-center">
				          		<div class="btn btnColor2"><div>Read Now</div></div>
				       		</div>
				    	</div>
				        <div class="project_location">
				        	<div class="small_title h2">Home Buying</div>
				           <h2 class="uppercase">Top questions to ask when buying a Flat</h2>
				           <p class="mb-0"></p>
				        </div>
				 	</a>
				</div>
			</div>

			<div class="col-3 col-md-6 col-xs-12">
				<div class="project_box p-0" data-aos-delay="100">
				 	<a href="#">
				    	<div class="project_box_img">

				    		
				       		<img class="w-100 lazyload" src="assets/images/placeholder/square.jpg" data-src="https://cdn.chandakgroup.com/chandakgroup/uploads/media/source/Blog3_IMG1_1600x900px_aKkN.jpg" alt="" title="">
				       		<div class="project_bx_overlay d-flex align-items-center justify-content-center">
				          		<div class="btn btnColor2"><div>Read Now</div></div>
				       		</div>
				    	</div>
				        <div class="project_location">
				        	<div class="small_title h2">Home Buying</div>
				           <h2 class="uppercase">Buying a house? Here's a documents checklist</h2>
				           <p class="mb-0"></p>
				        </div>
				 	</a>
				</div>
			</div>

			<div class="col-3 col-md-6 col-xs-12">
				<div class="project_box p-0" data-aos-delay="100">
				 	<a href="#">
				    	<div class="project_box_img">

				    		
				       		<img class="w-100 lazyload" src="assets/images/placeholder/square.jpg" data-src="https://cdn.chandakgroup.com/chandakgroup/uploads/media/source/Blog3_IMG1_UiQK_ttID.jpg" alt="" title="">
				       		<div class="project_bx_overlay d-flex align-items-center justify-content-center">
				          		<div class="btn btnColor2"><div>Read Now</div></div>
				       		</div>
				    	</div>
				        <div class="project_location">
				        	<div class="small_title h2">Home Decor</div>
				           <h2 class="uppercase">Here’s Why - Homes Need Modular Furniture</h2>
				           <p class="mb-0"></p>
				        </div>
				 	</a>
				</div>
			</div>

				<div class="col-3 col-md-6 col-xs-12">
					<div class="project_box p-0" data-aos-delay="100">
						<a href="#">
							<div class="project_box_img">

								
								<img class="w-100 lazyload" src="assets/images/placeholder/square.jpg" data-src="https://cdn.chandakgroup.com/chandakgroup/uploads/media/source/02_bEDk.jpg" alt="" title="">
								<div class="project_bx_overlay d-flex align-items-center justify-content-center">
									<div class="btn btnColor2"><div>Read Now</div></div>
								</div>
							</div>
							<div class="project_location">
								<div class="small_title h2">Lifestyle</div>
							   <h2 class="uppercase">TIPS TO MAKE A HOME LOOK BIGGER</h2>
							   <p class="mb-0"></p>
							</div>
						</a>
					</div>
				</div>

	            </div>

	            <input type="hidden" id="page_no" value="2">
				<input type="hidden" id="total_count" value="9">
				<input type="hidden" id="list_true" value="0" />
				
	            <div class="btn btnColor1 text-center" data-aos="fade-in" data-aos-delay="200"><a href="javascript:void(0);" class="page_map" style="display:none;">Load More</a></div>
         	</div>
      	</div>
   	</div>
</div>


<script>

	var data = {};
	data["page_no"] = '2';
	var csrf_token = '';

	$(document).on("click touch", ".page_map", function(){
		var page = $("#page_no").val();
		data["page_no"] = page;
		load_filter_data(data);

		window.history.pushState("", "", modifyUrl(data));
		
    });


    function modifyUrl(data){
		var str = '';
		var i = 0;
		$.each(data, function(a, b) {
			if(a != 'page_no'){		                
				var and = (i>0) ? '&' : '';
				str += and+a+'='+b;
				i++;
			}

		});

		//return  window.location.protocol+'//'+window.location.hostname+window.location.pathname+'?'+str
    }

   	function load_filter_data(data){

   		if(csrf_token == ''){
         	csrf_token = '79affac9048d68aef8a3f60b12bac6b3';
         	$("#final_csrf_token").val(csrf_token);
     	}

    	$.ajax({
			url: 'https://www.chandakgroup.com/blog/load_ajax_data',
			type: 'POST',
			dataType: 'JSON',
			data:  {
				'page_no': data['page_no'],
				'last_page': '1',
				'csrf_chandakgroup': $("#final_csrf_token").val()
			},
			beforeSend: function() {		                
			},
			success: function(result){
				if(result["status"] == true){
					if(result["data"]){
						if(result["page_no"] == 2){
             			$("#data").html(result["data"]);
             		}else{
             			$("#data").append(result["data"]);
             		}

					}else{
						$("#data").html(result['message']);
					}
					$("#total_count").val(result["total_count"]);
				}

				$("#page_no").val(result["page_no"]);
				if(result["show_more"] == 0){
					$("#list_true").val(0);
					$(".page_map").fadeOut();
				}

				if(result["show_more"] == 1){
					$("#list_true").val(1);
					$(".page_map").fadeIn();
				}

				$('input[name=csrf_chandakgroup]').val(result['token']);
            	csrf_token = result['token'];
            	$("#final_csrf_token").val(result['token']);
			},
			complete:function(){
			}
		});
   	}
</script>
	 <?php include 'footer.php'; ?>
	 <?php include 'scripts.php'; ?>
		</div>
	</body>
</html>