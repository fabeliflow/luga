<?php
$urlToShareEncoded = urlencode($_GET['u']);

switch ( $_GET['p'] ) {
	case 'facebook' :
		$url_to_redirect = 'http://www.facebook.com/share.php?u='.$urlToShareEncoded;
		if (!empty($_GET['t'])) {
			$url_to_redirect .= '&t='.urlencode($_GET['t']);
		}
		break;
	case 'twitter' :
		$url_to_redirect = 'http://twitter.com/share?url='.$urlToShareEncoded;
		if (!empty($_GET['t'])) {
			$url_to_redirect .= '&text='.urlencode($_GET['t']);
		}
		break;
	case 'googleplus' :
		$url_to_redirect = 'https://plus.google.com/share?url='.$urlToShareEncoded;
		break;
	case 'linkedin' :
		$url_to_redirect = 'http://www.linkedin.com/shareArticle?mini=true&url='.$urlToShareEncoded.'&ro=false&summary=&source=';
		if ( !empty($_GET['t']) ) {
			$url_to_redirect .= '&title='.urlencode($_GET['t']);
		}
		break;
	case 'tumblr' :
		$url_to_redirect = 'https://tumblr.com/widgets/share/tool?canonicalUrl='.$urlToShareEncoded;
		break;
	case 'wa' : 
		$url_to_redirect = 'whatsapp://send?text='.$urlToShareEncoded;
		break;
	case 'pinterest' :
		if ( !empty($_GET['imgalt']) ){
			$url_to_redirect = 'http://pinterest.com/pin/create/button/?url='.$urlToShareEncoded.'&media='.urlencode($_GET['imgsrc']).'&description='.urlencode($_GET['imgalt']);
		} else {
			$url_to_redirect = 'http://pinterest.com/pin/create/button/?url='.$urlToShareEncoded.'&media='.urlencode($_GET['imgsrc']).'&description='.urlencode($_GET['t']);
		}
		break;
	default:
		$url_to_redirect ='';
		break;
}

if ( !empty($url_to_redirect) ) {
	header("Location: $url_to_redirect");
	exit;
} else {
	return false;
}

?>
