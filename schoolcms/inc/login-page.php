<?php

add_action("login_head", "my_login_head2", 20);

function my_login_head2() {

	echo "

	<style>

	body.login #login h1 a {
		background: url('".get_template_directory_uri()."/images/login/innermedia-logo-small.png') no-repeat scroll center top transparent;
   		background-size: 255px 88px;
		height: 88px;
		width:255px;
	}
	@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
		body.login #login h1 a {
			background: url('".get_template_directory_uri()."/images/login/innermedia-logo-retina.png') no-repeat scroll center top transparent;
   			background-size: 255px 88px;
		}
	}

	body.login {
		background: url('".get_template_directory_uri()."/images/login/login-bg-large.png') no-repeat center top;
		text-align: center;
	}

	body.login .login form .forgetmenot {
    	float: none;
	}

	body.login #login .button-primary {
    	float: none;
    	margin-top: 20px;
    	width: 100%;
    	background: #da5f15;
    	border: 1px solid #da5f15;
    	font-family: 'Open Sans', sans-serif;
    	text-transform: uppercase;
    	font-size: 16px;
    	color: #fff;
	}

	body.login #login {
   		padding: 30px 20px 20px 20px;
    	background-color: rgba(255,255,255,0.3);
    	margin-top: 10px;
	}
		
	
	body.login #login form {
    	background: transparent;
    	border: none;
    	box-shadow: none;
		padding: 26px 24px 14px;
	}

	body.login #login label {
    	display: none;
	}
	body.login #login .forgetmenot label {
    	display: inline-block;
	}
	body.login #login form .input, body.login #login input[type=password], body.login #login input[type=text] {
    	margin: 0 6px 26px 0;
		border: none;
		font-size: 18px;
		padding-left: 10px;
	}
	body.login input:-internal-autofill-selected, 
	body.login input:-webkit-autofill,
	body.login input:-webkit-autofill:hover, 
	body.login input:-webkit-autofill:focus, 
	body.login input:-webkit-autofill:active{
    	-webkit-box-shadow: 0 0 0px 1000px white inset !important;
	}
	body.login  #login #login_error, .login .message, .login .success {
    	border-left: 4px solid #da5f15;
	}
	body.login .privacy-policy-link {
    display:none;
}
	.loginLink {
	    background: #5a5a5c;
    	border: 1px solid #5a5a5c;
    	font-family: 'Open Sans', sans-serif;
    	text-transform: uppercase;
    	color: #fff;
    	display: inline-block;
    	text-decoration: none;
    	font-size: 13px;
    	line-height: 2.1;
    	padding: 6px 13px 4px;
    	border-radius: 3px;
    	margin: 5px;
	}
	.loginLink:hover, .loginLink:active, .loginLink:focus {
	  border-color:#fff;
	  color:#fff;
	}

	.wp-admin #wp-auth-check-wrap #wp-auth-check {
		max-width:100%!important;
    	width: 420px!important;
	}

	@media only screen and (min-width : 768px) {
		body.login #login {
    		margin-top: 80px;
		}	
		.loginLink {
			margin:20px;
		}	
	}

	</style>

	";

}

add_filter( 'login_display_language_dropdown', '__return_false' );

add_filter( 'login_form_top', 'add_login_placeholders' );
function add_login_placeholders( $form ) {
    $form = str_replace( 'name="log"', 'name="log" placeholder="Username or email"', $form );
    $form = str_replace( 'name="pwd"', 'name="pwd" placeholder="Password"', $form );
    return $form;
}

// change url for login screen
add_filter('login_headerurl', function(){return 'https://www.innermedia.co.uk';}, 20);

function custom_login_footer_message() {
	$policy_link = get_privacy_policy_url();
    echo '<a class="loginLink" href="mailto:support@innermedia.co.uk">Contact support</a>';
	if ($policy_link) {
	echo '<a class="loginLink" href="'.$policy_link.'" target="_blank">Privacy Policy</a>';
	}
}
add_action( 'login_footer', 'custom_login_footer_message' );

?>