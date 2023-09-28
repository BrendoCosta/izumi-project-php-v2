:root {
			
			/* https://iconify.design/icon-sets/ */
			
			/*
			
			--logo-small-outline: url(https://izumiproject.com.br/images/global/logo_small_white.png);
			--logo-small-fill: url(https://izumiproject.com.br/images/global/logo_small.png);
			
			*/
			
			--logo-white: url(https://izumiproject.com.br/images/logos/v7/v7_full_white.png);
			--logo-full: url(https://izumiproject.com.br/images/logos/v7/v7_full.png);
			
			--themeA: #0051ff;
			--themeB: #9c55ff;
			--themeC: #ff67c1;
			--themeD: #F0F2F5; /* #F0F2F5; f7f8fb; */
			
			--themeAopacity: #0051ffC8;
			--themeBopacity: #9c55ffC8;
			--themeCopacity: #ff67c1C8;
			
			--titleA: var(--themeA);
			--titleB: var(--themeB);
			
			--link: var(--themeA);
			--link-hover: var(--themeB);
			--menu-color: white;
			--light-text: #bdc5cb;
			--highlight-text: white;
			
			--border: var(--themeD);
			
			--post-body: white;
			--post-body-shadow: rgba(0, 0, 0, 0.05);
			
			--post-body-text: #909B9E;
			
			--facebook: #007BFF;
			--facebook-hover: #0069D9;
			--twitter: #45AAF2;
			--twitter-hover: #3B90CE;
			--tumblr: #36465D;
			--tumblr-hover: #283445;
			--whatsapp: #26DE81;
			--whatsapp-hover: #20BD6E;
			--reddit: #FF4500;
			--reddit-hover: #D93B00;
			
			--red: #ff3b5d;
            --pink: #ff4584;
            --purple: #ac2dd6;
            --deepPurple: #673BB7;
            --indigo: #3F51B5;
            --blue: #2196F3;
            --lightBlue: #03A9F3;
            --cyan: #00BCD5;
            --teal: #24CAA1;
            --green: #4CAF52;
            --lightGreen: #8BC24A;
            --lime: #CCDD37;
            --yellow: #FFEA3C;
            --amber: #FFC006;
            --orange: #FF9700;
            --deepOrange: #FE5723;
            --brown: #7A5545;
            --grey: #9E9E9E;
            --blueGrey: #607C87;
            --black: #333333;
            --white: #FFFFFF;
			
			
		}
		html[data-theme="dark"] {
			
			/*
			--themeA: #232738;
			--themeB: #2C344A;
			--themeC: #2C344A;
			--themeD: #232738;
			
			--post-body: #2C344A;
			--post-body-text: #AEB4BE;
			*/
			
			--themeA: #252730;
			--themeB: #303440;
			--themeC: #303440;
			--themeD: #252730;
			
			--themeAopacity: #252730C8;
			--themeBopacity: #303440C8;
			--themeCopacity: #303440C8;
			
			--titleA: var(--post-body-text);
			--titleB: var(--post-body-text);
			
			--link: #d4d4d4;
			--link-hover: white;
			--light-text: var(--post-body-text);
			
			--border: var(--themeD);
			
			--post-body: #2C2F3A;
			--post-body-shadow: rgba(0, 0, 0, 0.1);
			
			--post-body-text: #B0B3B8;
			
			--facebook: var(--themeA);
			--facebook-hover: #007BFF;
			--twitter: var(--themeA);
			--twitter-hover: #45AAF2;
			--tumblr: var(--themeA);
			--tumblr-hover: #36465D;
			--whatsapp: var(--themeA);
			--whatsapp-hover: #26DE81;
			--reddit: var(--themeA);
			--reddit-hover: #FF4500;
			
		}
		* {
			
			box-sizing: border-box;
			-webkit-tap-highlight-color: transparent;
			outline: none;
			
			font-family: "Quicksand", sans-serif;
	
		}
		
		/* CHROME FONT ISSUE
		
		p, a, span, h1, h2, h3, h4, label {
			-webkit-transform: translate3d(0, 0, 0);
		} */
		
		.main-wrapper .header, .main-wrapper .header *, .main-wrapper .page-wrapper .content-wrapper, .main-wrapper .page-wrapper .content-wrapper * {
			
			transition: all 300ms ease-in-out;
			
		}
		html, body {
			
			width: 100%;
			height: auto;
			
			font-size: 1.1vw;
			
			margin: 0;
			
		}
		body {
			
			padding: 1em 2em;
			
			background: fixed linear-gradient(to bottom right, var(--themeA), var(--themeB), var(--themeC));
			
		}
		body a {
			
			display: contents;
			
			text-decoration: none;
			
		}
		
		/* IMAGE PRELOAD */
		
		body::after{
            position: absolute; width:0; height:0; overflow:hidden; z-index:-1;
            content: var(--logo-white) var(--logo-full);
        }
        body .notificationBox {
            
            position: fixed;
            
            width: 30rem;
            height: 9rem;
            
            right: -100%;
            bottom: 1rem;

            padding-left: 1.5rem;
            padding-right: 1.5rem;
            padding-bottom: 1rem;

            font-size: 0.85rem;
            text-align: left;
            color: var(--post-body-text);
            
            border: solid 0.1rem var(--border);
            border-radius: 1rem;
            box-shadow: 1px 2px 5px 0px var(--post-body-shadow);
            
            background: var(--post-body);
            
            overflow: hidden;
            transition: all 300ms ease;
            
        }
        body .notificationBox.sucess h2 {
            color: var(--teal);
        }
        body .notificationBox.error h2 {
            color: var(--red);
        }
		.main-wrapper {
			
			width: 100%;
			height: auto;
			
			display: flex;
			flex-flow: row;
			flex-direction: row;
			flex-wrap: wrap;
			align-content: center;
			justify-content: flex-start;
			
			margin: 0 auto;
			
			border-radius: 2rem;
			
			background: rgba(0, 0, 0, 0.15);
			box-shadow: 0px 5px 10px rgb(0, 0, 0, 0.2);
			
			overflow: hidden;
			
		}
		.main-wrapper .header {
			
			width: 15%;
			height: auto;
			display: flex;
			flex-direction: column;
			flex-wrap: nowrap;
			align-content: center;
			justify-content: flex-start;
			align-items: center;
			
			background: transparent;
			
		}
		.main-wrapper .header .open-button {
			
			display: none;
			
		}
		.main-wrapper .header .close-button {
			
			display: none;
			
		}
		.main-wrapper .header .logo {
			
			width: 100%;
			height: 10vh;
			
			margin-top: 2rem;
			margin-bottom: 2rem;
			
			background-image: var(--logo-white);
			background-position: center;
			background-size: contain;
			background-repeat: no-repeat;
			
			opacity: 0.8;
			-webkit-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
			
		}
		.main-wrapper .header .logo:hover {
			
			background-image: var(--logo-full);
			
			opacity: 1;
			
		}
		.main-wrapper .header .menu {
			
			width: 100%;
			height: auto;
			display: block;
			
			color: var(--highlight-text);
			font-size: 1.1rem;
			font-weight: 450;
			
			padding: 1rem 0;
			padding-left: 1.5rem;
			
			background: transparent;
			cursor: pointer;
			opacity: 0.8;
			
		}
		.main-wrapper .header .menu-panel {
			
			width: 100%;
			max-height: 0;
			overflow: hidden;
			
			background: rgba(255, 255, 255, 0.1);
			
		}
		.main-wrapper .header .menu-panel .menu {
			
			padding-left: 3rem;
			
			background: transparent;
			
		}
		.main-wrapper .header .menu-panel .menu:hover {
			
			padding-left: 3.5rem;
			
		}
		.main-wrapper .header .menu-active, .main-wrapper .header .menu:hover {
			
			padding-left: 1.8em;
			
			background: rgba(255, 255, 255, 0.1);
			opacity: 1;
			
		}
		.main-wrapper .header .theme-wrapper {
			
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: center;
			
			color: white;
			font-size: 1.5rem;
			
			margin-top: 1rem;
			
			opacity: 0.8;
		}
		.main-wrapper .header .theme-wrapper:hover {
			
			opacity: 1;
			
		}
		.main-wrapper .header .theme-wrapper .switcher-wrapper {
			
			position: relative;
			
			width: 3.7rem;
			height: 2rem;
			display: flex;
			align-items: center;
			
			margin: auto 0.5rem;
			
			border: solid 0.15rem var(--highlight-text);
			border-radius: 5rem;
			
		}
		.main-wrapper .header .theme-wrapper .switcher-wrapper .rounded {
			
			position: absolute;
			
			width: 1.5rem;
			height: 1.5rem;
			
			transform: none;
			margin: auto 0.1rem;
			
			border: none;
			border-radius: 50%;
			
			background: var(--highlight-text);
			
		}
		.main-wrapper .header .theme-wrapper .switcher-wrapper input[type=checkbox] {
			
			width: 100%;
			height: 100%;

			margin: 0 auto;

			cursor: pointer;
			opacity: 0;
			
		}
		.main-wrapper .page-wrapper {
			
			width: 85%;
			height: 100%;
			
			display: flex;
			flex-direction: column;
			flex-wrap: nowrap;
			align-content: center;
			justify-content: flex-start;
			
		}
		.main-wrapper .footer {
			
			width: 100%;
			height: auto;
			display: flex;
			flex-direction: column;
			flex-wrap: nowrap;
			align-content: center;
			align-items: center;
			justify-content: center;
			
			padding: 2rem 1rem;
			
			background: rgba(0, 0, 0, 0.15);
			
			opacity: 0.8;
			
		}
		.main-wrapper .footer p {
			
			color: var(--highlight-text);
			text-align: justify;
			
		}
		.main-wrapper .footer p.disclaimer {
			
			margin: 1rem 1rem 0 1rem;
			
		}
		.main-wrapper .footer a {
		
			color: inherit;
		
		}
		.main-wrapper .footer img {
			
			height: 7rem;
			margin-bottom: 1rem;
			
		}
		.main-wrapper .footer label {
			
			color: var(--highlight-text);
			
			font-weight: 500;
			text-align: center;
			
			padding: 0.5rem 1rem;
			
			border: solid 0.15rem var(--highlight-text);
			border-radius: 5rem;
			
		}
		.main-wrapper .footer h2 {
			
			display: flex;
			align-items: center;
			justify-content: center;
			align-content: center;
			
			color: var(--highlight-text);
			text-align: center;
			text-transform: uppercase;

			margin: 2rem auto;
			
		}
		.main-wrapper .footer h2::before, .main-wrapper .footer h2::after {
			
			content: " ";
			
			width: 3rem;
			height: 0.2rem;
			
			background: var(--highlight-text);
			
		}
		.main-wrapper .footer h2::before {
			
			margin-right: 1rem;
			
		}
		.main-wrapper .footer h2::after {
			
			margin-left: 1rem;
			
		}
		.main-wrapper .page-wrapper .carrousel-wrapper {
			
			width: 100%;
			height: auto;
			max-height: 75vh; /* TO HIDE SLICK STACKING BUG; SAME AS .carrousel HEIGHT */
			
			background: white;
			background-size: cover;
			
			overflow: hidden;
			
		}
		.main-wrapper .page-wrapper .carrousel-wrapper .carrousel {
			
			width: 100%;
			height: 75vh;
			display: flex;
			flex-direction: column;
			justify-content: flex-end;
			align-items: center;
			
			background: unset;
			background-size: cover;
            background-position: center;
			
		}
		
		.main-wrapper .page-wrapper .carrousel-wrapper .carrousel .carrousel-shadow {
			
			width: 100%;
			height: auto;
			display: flex;
			flex-direction: column;
			justify-content: flex-end;
			align-items: center;
			
			color: white;
			text-shadow:
				-0.05rem 0 0.15rem rgba(0, 0, 0, 0.4),  
				 0.05rem 0 0.15rem rgba(0, 0, 0, 0.4),
				-0.05rem 0 0.15rem rgba(0, 0, 0, 0.4),
				 0.05rem 0 0.15rem rgba(0, 0, 0, 0.4);
			
			bottom: 0;
			
			padding-bottom: 2rem;
			
			background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
			
		}
		.main-wrapper .page-wrapper .carrousel-wrapper .carrousel .carrousel-shadow h1 {
			
			text-transform: uppercase;
			text-align: center;
			
			margin: 0;
			
		}
		.main-wrapper .page-wrapper .carrousel-wrapper .carrousel .carrousel-shadow p {
			
			font-weight: 500;
			
			margin-top: 0.1rem;
			
		}
		.slick-arrow.slick-prev {
            
			left: 1rem;
            
			background: transparent;
            
			z-index: 1;
			
        }
        .slick-arrow.slick-next {
            
			right: 1rem;
            
			background: transparent;
			
        }
		.slick-prev, .slick-next {
			
			width: 1.5rem;
			height: 1.5rem;
			
		}
		.slick-prev:before, .slick-next:before {
			
			font-size: 1.5rem;
			color: var(--themeA);
			
			opacity: 0.2;
			transition: all 300ms ease-in-out;
			
		}
        .slick-dots {
            
			bottom: 1rem;
			
        }
        .slick-dotted.slick-slider {
            
			margin-bottom: 0;
			
        }
        .slick-dots li.slick-active button:before {
            
			color: var(--themeA);
			
        }
		.main-wrapper .page-wrapper .content-wrapper {
			
			width: 100%;
			height: auto;
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			justify-content: flex-start;
			align-content: flex-start;
			align-items: flex-start;
			
			padding: 1rem;
			
			background: var(--themeD);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .main-content-wrapper {
			
			width: 75%;
			height: auto;
			display: flex;
			flex-direction: column;
			flex-wrap: wrap;
			justify-content: flex-start;
			align-content: flex-start;
			align-items: flex-start;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .main-content-wrapper.page {
		
		    width: 100%;
		
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body {
			
			width: 100%;
			height: auto;
			min-height: 200vh;
			
			background: var(--post-body);
			
			border: none;
			border-radius: 2rem;
			box-shadow: 1px 2px 5px 0px var(--post-body-shadow);
			
			overflow: hidden;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-header {
			
			position: relative;
			
			width: 100%;
			height: 26rem;
			display: flex;
			flex-direction: column;
			align-content: center;
			justify-content: flex-end;
			align-items: center;
			
			background: white;
			background-image: unset;
			background-size: cover;
			background-position: center;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-header .post-header-shadow {
			
			width: 100%;
			height: 50%;
			
			background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-header .post-header-info {
			
			position: absolute;
			
			width: 100%;
			height: auto;

			display: flex;
			flex-wrap: wrap;
			flex-direction: row;
			justify-content: center;
			align-items: center;
			
			color: white;
			text-shadow:
				-0.05rem 0 0.15rem rgba(0, 0, 0, 0.4),  
				 0.05rem 0 0.15rem rgba(0, 0, 0, 0.4),
				-0.05rem 0 0.15rem rgba(0, 0, 0, 0.4),
				 0.05rem 0 0.15rem rgba(0, 0, 0, 0.4);
			
			padding: 1rem 2rem;
			
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-header .post-header-info h1 {
			
			width: 100%;
			
			text-align: center;
			font-size: 2rem;
			
			margin-bottom: 0.5rem;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-header .post-header-info .author-wrapper {
			
			display: flex;
			align-items: center;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-header .post-header-info .author-wrapper .author-rounded {
			
			width: 2rem;
			height: 2rem;

			border: none;
			border-radius: 50%;
			
			background: white;
			background-image: url(https://c.disquscdn.com/uploads/users/20531/7584/avatar92.jpg?1610067421);
			background-size: cover;
			background-position: center;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-header .post-header-info p {
			
			font-weight: 500;
			
			margin: 0.5rem 0.6rem;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-header .post-header-info a {
			
			color: inherit;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text {
			
			width: 100%;
			height: auto;
			
			padding: 2rem;

		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .share-wrapper {
			
			width: 100%;
			height: auto;
			display: flex;
			flex-direction: row;
			align-content: center;
			justify-content: center;
			align-items: center;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text a {
			
			color: var(--link);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text a:hover {
			
			color: var(--link-hover);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text p {
			
			color: var(--post-body-text);
			text-align: justify;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-publish *:first-child {
		    
		    margin-top: 0;
		    
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text h2, h3, h4, ul {
		
		    color: var(--post-body-text);
		    text-align: justify;

			margin-block-start: 0.83em;
			margin-block-end: 0.83em;
			
		}
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text h2.title {
			
			display: flex;
			align-items: center;
			justify-content: center;
			align-content: center;
			
			color: var(--titleA);
			text-transform: uppercase;
			text-align: center;
			
			margin: 2rem auto;
			
		}
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text h2.title::before, .main-wrapper .page-wrapper .content-wrapper .post-body .post-text h2.title::after {
			
			content: " ";
			
			width: 3rem;
			height: 0.2rem;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text h2.title::before {
			
			margin-right: 1rem;
			
			background: linear-gradient(to right, var(--titleB), var(--titleA));
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text h2.title::after {
			
			margin-left: 1rem;
			
			background: linear-gradient(to right, var(--titleA), var(--titleB));
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text h2.title-bar {
			
			width: max-content;
			height: 3rem;
			
			color: var(--highlight-text);
			
			padding: 0.5rem 3rem;
			
			margin: 0 auto;
			margin-block-start: 0;
			
			border-radius: 2rem;
			
			background: linear-gradient(to right, var(--themeB), var(--themeA), var(--themeB));
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text hr {
			
			width: 50%;
			height: 0.2rem;
			
			margin-bottom: 1rem;
			
			border: none;
			
			background: linear-gradient(to right, var(--titleB), var(--titleA), var(--titleB));
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text hr.split {
			
			background: var(--border);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-image {
            
            display: block;
			
			margin: 1rem auto;
			
			border: solid 0.1rem var(--border);
			
			padding: 0.5rem;
			
			box-shadow: 1px 2px 5px 0px var(--post-body-shadow);
		
		}
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-image.small { width: 30%; }
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-image.mid { width: 50%; }
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-image.large { width: 70%; }
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-image.full { width: 100%; }
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-image-box {
            
            width: 100%;
            
            display: flex;
            gap: 2rem;
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-image-box figure { margin: 0; }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-image-box figure figcaption { color: var(--post-body-text); text-align: center; }
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-box {
		
		    width: 100%;
            
            font-size: 0.85rem;
            text-align: left;
            
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            padding-bottom: 1rem;
            
            border: solid 0.1rem var(--border);
            border-radius: 2rem;
            
            box-shadow: 1px 2px 5px 0px var(--post-body-shadow);
            
            overflow: hidden;
		
		}
		
		
		/* TABLE STYLE */
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text table {
			
			width: 100%;
			table-layout: fixed;
			
			font-size: 0.9em;
			color: var(--post-body-text);
			text-align: center;
			
			overflow: hidden;
			
			margin-bottom: 2em;
			
			border-collapse: collapse;
			border-radius: 2rem;
			box-shadow: 1px 2px 5px 0px var(--post-body-shadow);
			
			background: transparent;
			
		}
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text table th {
			
			text-transform: uppercase;
			color: var(--menu-color);
			
			padding: 1em;
			
			background: var(--themeB);	
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text table th:nth-child(odd) {
			
			background: var(--themeA);
			
		}
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text table tr {
			
			background: transparent;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text table tr:nth-child(odd) {
			
			background: var(--themeD);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text table tr td {
			
			padding: 1em;
			
		}
		
		/* CARDS */
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .search-result {
			
			width: fit-content;
			width: -moz-fit-content;
			
			display: block;
			
			color: var(--titleA);
			font-weight: 600;
			text-align: center;
			text-transform: uppercase;
			
			margin: 2rem auto auto auto;
			
			padding: 0.5rem 1rem;
			
			border: solid 0.15rem var(--titleA);
			border-radius: 5rem;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .search-result.error {
			
			color: var(--red);
			
			border: solid 0.15rem var(--red);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper {
			
			display: flex;
			flex-direction: row;
			justify-content: space-between;
			flex-wrap: wrap;
			
			margin: 2rem 0 1rem 0;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card {
			
			width: 48.1%; /* 45% */
			height: auto;
			display: inline-block;
			
			margin-bottom: 2rem;
			
			padding-bottom: 0.8rem;
			
			border: solid 1px var(--post-body-shadow);
			border-radius: 2rem;
			
			background: var(--post-body);
			box-shadow: 1px 2px 5px 0px var(--post-body-shadow);
			
			overflow: hidden;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card:nth-last-child(-n+2) {
			
			margin-bottom: 0;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card .card-image {
			
			width: 100%;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card .card-title {
			
			color: var(--link);
			
			margin: 1rem 1.2rem;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card .card-description {
			
			margin: 1rem 1.2rem;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card .card-footer {
			
			color: var(--light-text);
			font-size: 0.8rem;
			
			margin: 0.5rem 1.2rem;
			
			transition: none !important;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card .card-footer .iconify {
			
			transition: none !important;
			
		}
		
		/* CARD HOVER */
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card:hover .card-title {
			
			color: var(--link-hover);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card:hover .card-image {
			
			opacity: 0.9;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card .card-footer.comments {
			
			width: max-content;
			
			color: var(--light-text);
			
			cursor: pointer;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card .card-footer.comments a {
			
			color: var(--light-text);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card .card-footer.comments:hover {
			
			color: var(--link-hover);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card .card-footer.comments:hover > span {
			
			color: var(--link-hover);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card .card-footer.comments:hover > a {
			
			color: var(--link-hover);
			
		}
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .pagination-wrapper {
			
			display: flex;
			flex-direction: row;
			justify-content: center;
			flex-wrap: wrap;
			align-items: center;
			
			padding: 1rem 0 0 0;
			
		}
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .pagination-wrapper .pagination {
			
			width: 2.5rem;
			height: 2.5rem;
			display: flex;
			align-items: center;
			justify-content: center;
			align-content: center;
			
			color: var(--themeD);
			font-size: 1em;
			font-weight: bold;
			
			margin-right: 0.5rem;
			
			border: solid 0.15rem var(--themeD);
			border-radius: 50%;
			
			background: transparent;
			
			cursor: pointer;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .pagination-wrapper .pagination * {
			
			transition: none !important;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .pagination-wrapper .pagination.active,  .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .pagination-wrapper .pagination:hover {
			
			color: var(--highlight-text);
			
			border: solid 0.15rem var(--themeA);
			
			background: var(--themeA);
			
		}
		
		/* INPUTS */
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text input[type=text], input[type=password], select, textarea {
			
			width: 100%;
			
			color: var(--post-body-text);
			font-size: 1rem;
			
			padding: 1rem 1.5rem;
			
			/* border: solid 0.2rem var(--border); */
			border: none;
			border-radius: 5em;
			
			background: var(--themeD);
			
			-webkit-appearance: none;
            appearance: none;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text textarea {
		
		    height: 8rem;
		    
		    border-radius: 1rem;
		    
		    resize: none;
		
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .select-wrapper {
            
            position: relative;
            
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-direction: row;
            flex-wrap: nowrap;
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .select-wrapper::after {
            
            position: absolute;
            
            content: "\f078";
            
            font-size: 1rem;
            font-family: "FontAwesome", sans-serif;
            color: var(--post-body-text);
            
            right: 1.5rem;
            
        }
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text ::placeholder {
			
			color: var(--post-body-text);
			opacity: 1; /* Firefox */
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text ::-ms-input-placeholder { /* Microsoft Edge */
			
			color: var(--post-body-text);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .search.index {
		
		    margin-top: 0;
		
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .search::placeholder {
			
			font-family: "FontAwesome", sans-serif;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .search::-ms-input-placeholder {
			
			font-family: "FontAwesome", sans-serif;
			
		}
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text button.post-button {
			
			width: fit-content;
			width: -moz-fit-content;
			height: auto;
			
			display: block;
			
			color: var(--post-body-text);
			font-weight: bold;
			text-transform: uppercase;
			text-decoration: none;
			
			margin: 1rem auto;
			
			padding: 1rem 1.5rem;
			
			border: none;
			border: solid 0.15rem var(--post-body-text);
			border-radius: 5rem;
			
			background: transparent;
			
			cursor: pointer;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text button.post-button a { color: inherit; }
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text button.post-button * { transition: none; }
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text button.post-button:hover {
			
			color: var(--highlight-text);
			
			border: solid 0.15rem var(--themeA);
			
			background: var(--themeA);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text button.post-button.green { color: var(--teal); border: solid 0.15rem var(--teal); }
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text button.post-button.green:hover { color: white; border: solid 0.15rem var(--teal); background: var(--teal); }
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text button.post-button.red { color: var(--red); border: solid 0.15rem var(--red); }
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text button.post-button.red:hover { color: white; border: solid 0.15rem var(--red); background: var(--red); }
		/* SHARE BUTTONS */
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .share-button {
			
			width: 2.5em;
			height: 2.5em;
			display: flex;
			align-items: center;
			justify-content: center;
			align-content: center;
			
			font-size: 1em;
			color: #fff;
			
			margin-right: 0.5em;
			
			border: none;
			border-radius: 50%;
			
			background: #000;
			
			cursor: pointer;
			
		}
		
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .share-button.facebook {
			
			background: var(--facebook);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .share-button.facebook:hover {
			
			background: var(--facebook-hover);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .share-button.twitter {
			
			background: var(--twitter);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .share-button.twitter:hover {
			
			background: var(--twitter-hover);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .share-button.tumblr {
			
			background: var(--tumblr);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .share-button.tumblr:hover {
			
			background: var(--tumblr-hover);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .share-button.whatsapp {
			
			background: var(--whatsapp);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .share-button.whatsapp:hover {
			
			background: var(--whatsapp-hover);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .share-button.reddit {
			
			background: var(--reddit);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .share-button.reddit:hover {
			
			background: var(--reddit-hover);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper {
			
			width: 25%;
			display: flex;
			flex-direction: column;
			
			padding-left: 1rem;
			
			background: transparent;
			
		}		
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .post-body {
			
			padding: 0.5em;
			
			border-top-left-radius: 0;
			border-top-right-radius: 0;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .post-body p {
			
			text-align: justify;
			
			margin: 0;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper {
			
			width: 100%;
			height: auto;
			display: flex;
			flex-direction: column;
			flex-wrap: nowrap;
			justify-content: flex-start;
			align-items: center;
			align-content: center;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper:not(:first-child) {
			
			margin-top: 1em;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper .sidehead {
			
			width: 100%;
			height: 3.5rem;
			display: flex;
			align-items: center;
			justify-content: center;
			align-content: center;
			
			color: var(--highlight-text);
			text-align: center;
			text-transform: uppercase;
			font-weight: bold;
			
			border-top-left-radius: 2rem;
			border-top-right-radius: 2rem;
			box-shadow: 1px 2px 5px 0px var(--post-body-shadow);
			
			background: fixed linear-gradient(to right, var(--themeB), var(--themeA), var(--themeB));
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper .sidecontainer {
			
			width: 100%;
			height: auto;
			
			color: var(--post-body-text);
			text-align: justify;
			
			padding: 0.5rem;
			
			border-bottom-left-radius: 2rem;
			border-bottom-right-radius: 2rem;
			
			background: var(--post-body);
			
			box-shadow: 1px 2px 5px 0px var(--post-body-shadow);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper .sidecontainer.status-container {
			
			padding: 0.2rem;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper .sidecontainer.discord {
			
			height: 25rem;
			
			background: #202225;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper .sidecontainer .status-update {
			
			color: var(--light-text);
			font-size: 0.8rem;
			text-align: center;
			
			margin: 0.5rem auto;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper .sidecontainer .status-background {
			
			width: 100%;
			height: 4rem;
			
			margin-bottom: 0.2rem;
			
			background-image: url(https://izumiproject.com.br/images/slider/nekopara.jpg);
			background-position-y: 30%;
			background-size: cover;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper .sidecontainer .status-wrapper {
			
			width: 100%;
			height: 100%;
			display: flex;
			flex-wrap: nowrap;
			justify-content: space-between;
			align-items: center;
			
			padding: 0.8rem;
			
			background: rgba(0, 0, 0, 0.25);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper .sidecontainer .status-wrapper:hover {
			
			background: transparent;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper .sidecontainer .status-wrapper span {
			
			font-size: 0.7rem;
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper .sidecontainer .status-wrapper p {
			
			color: white;
			line-height: 1rem;
			text-align: left;
			text-shadow:
				-0.05rem 0 0.15rem rgba(0, 0, 0, 0.4),  
				 0.05rem 0 0.15rem rgba(0, 0, 0, 0.4),
				-0.05rem 0 0.15rem rgba(0, 0, 0, 0.4),
				 0.05rem 0 0.15rem rgba(0, 0, 0, 0.4);
			
		}
		.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper .sidewrapper .sidecontainer .status-wrapper .rounded {
			
			width: 3.5em;
			height: 3.5em;
			display: flex;
			align-items: center;
			justify-content: center;
			align-content: center;
			
			font-size: 0.8em;
			text-align: center;
			border-radius: 50%;
			border: none;
			color: white;
			font-weight: 450;
			background: rgba(0, 0, 0, 0.4);
			
		}
		
		@media screen and (max-width: 768px) {
			
			html, body {
				
				font-size: 4.1vw;
				
			}
			body {
				
				padding: 0.5em;
				
				touch-action: pan-x pan-y;
				
			}
			body .notificationBox {
                width: 70%;
            }
			.main-wrapper {
				
				flex-direction: column;
				
			}
			.main-wrapper .header {
				
				position: fixed;
				
				width: 100%;
				height: 100%;

				display: block;
				overflow-y: scroll;
				
				left: -100%;
				top: 0;
				
				padding: 0 1rem 2rem 1rem;
				
				border-radius: 0;
				
				background: linear-gradient(to bottom right, var(--themeAopacity), var(--themeBopacity), var(--themeCopacity)); /* rgba(0, 0, 0, 0.7); */
				
				z-index: 1;
				touch-action: pan-y pan-x;
				
			}
			.main-wrapper .header .open-button {
				
				position: fixed;
				
				width: 3.5rem;
				height: 3.5rem;
				
				display: flex;
				align-items: center;
				justify-content: center;
				align-content: center;
				
				color: white;
				font-size: 1.8rem;
				font-weight: bold;
				
				right: 0;
				
				margin: 1rem 1rem 1rem 1rem;
				
				border-radius: 50%;
				
				background: rgba(0, 0, 0, 0.2);
				
				cursor: pointer;
				z-index: 1;
				opacity: 1;
				
			}
			.main-wrapper .header .close-button {
				
				position: fixed;
				
				width: 3.5rem;
				height: 3.5rem;
				
				display: none;
				align-items: center;
				justify-content: center;
				align-content: center;
				
				color: white;
				font-size: 1.8rem;
				font-weight: bold;

				right: 0;
				margin: 1rem;

				border-radius: 50%;
				
				background: rgba(255, 255, 255, 0.2); /* rgba(0, 0, 0, 0.5); */
				
				cursor: pointer;
				z-index: 1;
				opacity: 0;
				
			}
			.main-wrapper .header .logo {
				
				margin-top: 4rem;
				
			}
			.main-wrapper .page-wrapper {
				
				width: 100%;
				
			}
			.main-wrapper .page-wrapper .content-wrapper {
				
				flex-direction: column;
				
				padding: 0.5rem;
				
			}
			.main-wrapper .page-wrapper .content-wrapper .main-content-wrapper {
				
				width: 100%;
				
			}
			.main-wrapper .page-wrapper .content-wrapper .post-body .post-header {
				
				height: 35rem;
				
			}
			.main-wrapper .page-wrapper .content-wrapper .post-body .post-header .post-header-info {
				
				flex-direction: column;
				justify-content: flex-start;
				align-items: flex-start;
				
				overflow-wrap: break-word;
				
				padding: 1rem 1rem;
				
			}
			.main-wrapper .page-wrapper .content-wrapper .post-body .post-header .post-header-info .author-wrapper {
				
				margin: 0 auto;
				
			}
			.main-wrapper .page-wrapper .content-wrapper .post-body .post-text {
				
				padding: 1rem 1rem 2rem 1rem;
				
			}
			.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .search-result {
			
			    margin: 1rem auto auto auto;
			
			}
			.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper {
				
				flex-direction: column;
				align-items: center;
				
				margin: 1rem 0;
				
			}
			.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card {
				
				width: 100%;
				
				margin-bottom: 1rem;
				
			}
			.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .card-wrapper .card:nth-last-child(-n+2) {
				
				margin-bottom: 1rem;
				
			}
			.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .pagination-wrapper {
				
				padding: 0;
				
			}
			.main-wrapper .page-wrapper .content-wrapper .post-body .post-text table {
			    
			    display: block;
			    
			    overflow: scroll;
			
			}
			
			.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-image.small { width: 100%; }
		    .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-image.mid { width: 100%; }
		    .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-image.large { width: 100%; }
			
			.main-wrapper .page-wrapper .content-wrapper .post-body .post-text .post-image-box {
			
			    flex-direction: column;
			
			}
			.main-wrapper .page-wrapper .content-wrapper .sidebar-wrapper {
				
				width: 100%;
				padding-left: 0;
				padding-top: 1rem;
				
			}
			
		}
		
		/*
		
		:root {
		
		    --themeA: #ff3163;
		    --themeB: #ff3163;
		    --themeC: #ff3163;
		    --themeD: #F0F2F5;
		    --themeAopacity: #ff31636e;
		    --themeBopacity: #ff31636e;
		    --themeCopacity: #ff31636e;
		}
		
		@keyframes body-background-animation {
		
		    0%   { background-position-x: left; }
            50%  { background-position-x: right; }
            100% { background-position-x: left; }
            
        }
        
        @keyframes body-opacity-animation {
		
		    0%   { opacity: 0; }
            100% { opacity: 1; }
            
        }
		
		body {
		
		    background: unset;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position-x: center;
            background-position-y: center;
            animation: body-background-animation 60s infinite, body-opacity-animation 3s;
            animation-timing-function: ease-in-out;
            -webkit-animation-timing-function: ease-in-out;
		
		}
		
		.padoru { display: none; }
		
		@media screen and (min-width: 768px) {
		
		    body {
		    
		        background-size: 115%;
		    
		    }
		
		    html, body {
		
                width: 90%;
                margin: 0 auto;
            
            }
            
            .main-wrapper .header {
            
                background: var(--themeAopacity);
                
            }
            
            .main-wrapper .footer { background: var(--themeAopacity); }
            
            .padoru {
            
                display: block;
                position: fixed;
                bottom: 1em;
                left: 1em;
                width: 5em;
            
            }
		
		}
		
		*/