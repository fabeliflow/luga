var _ehmysh =  function() {	
	 this._mys_addEvent = function (elementAdd, type, handler) {
		if (elementAdd.addEventListener) {
			elementAdd.addEventListener(type, handler, false);
		} else {
			if (!handler.$$guid) { 
				handler.$$guid = this._mys_addEvent.guid++;
			}
			if (!elementAdd.events) { 
				elementAdd.events = {}; 
			}
			var handlers = elementAdd.events[type];
			if (!handlers) {
				handlers = elementAdd.events[type] = {};
				if (elementAdd["on" + type]) {
					handlers[0] = elementAdd["on" + type];
				}
			}
			handlers[handler.$$guid] = handler;
			elementAdd["on" + type] = this._mys_handleEvent;
		}
	};
	this._mys_addEvent.guid = 1;

	this._mys_removeEvent = function(elementRemove, type, handler) {
		if (elementRemove.removeEventListener) {
			elementRemove.removeEventListener(type, handler, false);
		} else {
			if (elementRemove.events && element.events[type]) {
				delete elementRemove.events[type][handler.$$guid];
			}
		}
	};
	
	this._mys_handleEvent = function(event) {
		var returnValue = true;
		event = event || _mys_fixEvent(((this.ownerDocument || this.document || this).parentWindow || window).event);
		var handlers = this.events[event.type];
		for (var i in handlers) {
			this.$$_mys_handleEvent = handlers[i];
			if (this.$$_mys_handleEvent(event) === false) {
				returnValue = false;
			}
		}
		return returnValue;
	};
	
	function _mys_fixEvent(event) {
		event.preventDefault = _mys_fixEvent.preventDefault;
		event.stopPropagation = _mys_fixEvent.stopPropagation;
		return event;
	};
	_mys_fixEvent.preventDefault = function() {
		this.returnValue = false;
	};
	_mys_fixEvent.stopPropagation= function() {
		this.cancelBubble = true;
	};
};

var _mysin = function() {
	var isMBD = false;
	var modalBox;

	this.getDocHeight = function() {
		var D = document;
		return Math.max(
			Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
			Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
			Math.max(D.body.clientHeight, D.documentElement.clientHeight)
		);
	};

	this.pageWidth = function() {
		return window.innerWidth != null? window.innerWidth: document.documentElement && document.documentElement.clientWidth ? document.documentElement.clientWidth:document.body != null? document.body.clientWidth:null;
	};
	
	this.pageHeight = function() {
		return window.innerHeight != null? window.innerHeight: document.documentElement && document.documentElement.clientHeight ? document.documentElement.clientHeight:document.body != null? document.body.clientHeight:null;
	};
	
	this.posLeft = function() {
		return typeof window.pageXOffset != 'undefined' ? window.pageXOffset:document.documentElement && document.documentElement.scrollLeft? document.documentElement.scrollLeft:document.body.scrollLeft? document.body.scrollLeft:0;
	};
	
	this.posTop = function() {
		return typeof window.pageYOffset != 'undefined' ? window.pageYOffset:document.documentElement && document.documentElement.scrollTop? document.documentElement.scrollTop: document.body.scrollTop?document.body.scrollTop:0;
	};
	
	this.elemID = function(x){
		return document.getElementById(x);
	};
	
	this.scrollFix = function(){
		var obol=this.elemID('ol');
		if (obol) {
			obol.style.top=this.posTop()+'px';
			obol.style.left=this.posLeft()+'px';
		}
	};
	
	this.sizeFix = function(){
		var obol=this.elemID('ol');
		if (obol) {
			obol.style.height=this.pageHeight()+'px';
			obol.style.width=this.pageWidth()+'px';
		}
	};
	
	this.kp = function(e){
		var ky=e?e.which:event.keyCode;
		if(ky==88||ky==120)hm();
		return false;
	};
	
	this.inf = function(h){
		var tag=document.getElementsByTagName('select');
		for(i=tag.length-1;i>=0;i--)
			tag[i].style.visibility=h;
		tag=document.getElementsByTagName('iframe');
		for(i=tag.length-1;i>=0;i--)
			tag[i].style.visibility=h;
		tag=document.getElementsByTagName('object');
		for(i=tag.length-1;i>=0;i--)
			tag[i].style.visibility=h;
	};

	this.sm = function(obl,wd, ht) {
		var h='hidden';
		var b='block';
		var p='px';
		var obol=this.elemID('mys_ol');
		obol.style.height=this.getDocHeight() +p;
		obol.style.width='100%'
		obol.style.top=0;
		obol.style.left=0;
		obol.style.display=b;
		var tp=this.posTop()+((this.pageHeight()-ht)/2)-12;
		var lt=this.posLeft()+((this.pageWidth()-wd)/2)-12;
		var obbx=this.elemID('mys_box');
		obbx.style.top=(tp<0?0:tp)+p;
		obbx.style.left=(lt<0?0:lt)+p;
		obbx.style.width=wd+p;
		obbx.style.height=ht+p;
		this.inf(h);
		obbx.style.display=b;
		return false;
	};

	this.pinMarklet = function() {
		var e = document.createElement('script');
		e.setAttribute('type', 'text/javascript');
		e.setAttribute('charset', 'UTF-8');
		e.setAttribute('src', 'http://assets.pinterest.com/js/pinmarklet.js?r=' + Math.random() * 99999999);
		document.body.appendChild(e);
	};
	
	this.hm = function(){
		var v='visible';
		var n='none';
		this.elemID('mys_ol').style.display=n;
		this.elemID('mys_box').style.display=n;
		this.inf(v);
		document.onkeypress='';
	};

	this.initmb = function(){
		if (!isMBD) {
			var obody=document.getElementsByTagName('body')[0];

			var obbxi=document.createElement('iframe');
			obbxi.setAttribute('id','mys_boxframe');
			obbxi.setAttribute('name','mys_boxframe');
			obbxi.style.display='none';
			obody.appendChild(obbxi);

			window.onscroll = this.scrollFix;
			window.onresize = this.sizeFix;

			isMBD = true;
		}
	};

	this.getOffset = function(el) {
		var _x = 0;
		var _y = 0;
		while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
			_x += el.offsetLeft - el.scrollLeft;
			_y += el.offsetTop - el.scrollTop;
			el = el.offsetParent;
		}
		return { top: _y, left: _x };
	};
	
	this.chooserImg = function(elem) {
		var elemTop = this.getOffset(elem);
			
		var images = document.getElementsByTagName('img');
		var i = 0;
		var lastimg = '' ;
		
		if ( images && images[0] && images[0].width >=100) {
			lastimg = images[0];
		}
		
		var fd = false;
		var offsetImage = null;
		var imageSrc = '';
		while ( (elementImage = images[i++]) && (fd == false) ) {	
			offsetImage = this.getOffset(elementImage);
			imageSrc = elementImage.src;
			if ( (elementImage.src!='') && (offsetImage.top < elemTop.top) && (imageSrc.search(/moquadv.com/i)==-1) && elementImage.width>=100) {
				lastimg = elementImage;
			}
			
			if ( offsetImage.top > elemTop.top ) {
				fd = true;
			}
		}
		return lastimg;
	};
	
	this.s_mys = function(elem) {
		this.sm('myshare_box', 400,400);
		
		var newurl = elem.getAttribute('myshare_url');
		if (!newurl) {
			newurl = elem.getAttribute('myshare:url');
		}
		var lang = elem.getAttribute('myshare_lang');
		if (!lang){
			lang = elem.getAttribute('myshare:lang');
		}
		if (!this.elemID('mys_box')){
			this.initmb();
		}
		var a = new _ehmysh();
		a._mys_addEvent(this.elemID('mys_ol'), "click", _mysin.hm);

		var i =0;
		var tourl_link;
		var tourl_title;
		var alist = document.getElementsByTagName('a');

		if (newurl) {
			tourl_link = _mysobj.urlencode(newurl);
			newtitle = elem.getAttribute('myshare_title');
			if (!newtitle){
				newtitle = elem.getAttribute('myshare:title');
			}
			newdescription = elem.getAttribute('myshare_description');
			if (!newdescription){
				newdescription = elem.getAttribute('myshare:description');
			}
			if (newtitle) {
				tourl_link = tourl_link + "&t=" +_mysobj.urlencode(newtitle);
				tourl_title = newtitle;
			}
			if (newdescription) {
				tourl_link = tourl_link + "&d=" +_mysobj.urlencode(newdescription);
			}
		} else {
			tourl_link = _mysobj.urlencode(location.href);
			newtitle = document.title;
			tourl_title = newtitle;
			if (newtitle) {
				tourl_link = tourl_link + "&t=" +_mysobj.urlencode(newtitle);
			}
			var metas = document.getElementsByTagName('meta');
			var len = metas.length;
			if (len>0) {
				var newdescription;
				for (var x=0,y=metas.length; x<y; x++) {
					if (metas[x].name.toLowerCase() == "description") {
						newdescription = metas[x];
					}
				}
				if (newdescription) {
					if (newdescription.content) {
						tourl_link = tourl_link + "&d=" + _mysobj.urlencode(newdescription.content);
					}
				}
			}
		}
		if (lang) {
			tourl_link = tourl_link + "&l=" + _mysobj.urlencode(lang);
		}
		
		if ( self._myswpplugin == true ) {
			tourl_link = tourl_link + "&myswpplugin=1";
		}

		var tmp = self.location.host;
		if ( !tmp ){
			tmp = _mysobj.tracy_vars['from'];
		}
		tourl_link = tourl_link + "&f=" + _mysobj.urlencode(tmp);

		var outChooserImg = this.chooserImg(elem);
		if (  outChooserImg !='' ) {
			tourl_link = tourl_link + "&imgsrc=" + _mysobj.urlencode(outChooserImg.src)+ "&imgalt=" + _mysobj.urlencode(outChooserImg.alt);
		}
 		
		//tourl_link = tourl_link + "&cc=" +_mysobj.cc;
		
		var isbot = /(altavista|baidu|bing|blackwidow|bot|chinaclaw|collector|crawler|curl|custo|demon|disco|download|downloader|ecatch|eirgrabber|email|express|extractor|eyenetie|flashget|foto|getright|getweb!|go-ahead-got-it|go!zilla|google|grabnet|grafula|hmview|htmlparser|httrack|indy|interget|jetcar|larbin|leechftp|libwww|msnbot|navroad|nearsite|netants|netzip|ninja|octopus|offline|pagegrabber|pavuk|pcbrowser|perl|pycurl|pyq|pyth|python|quester|rafula|realdownload|reget|scan|sitesnagger|slurp|smartdownload|spider|stripper|sucker|superhttp|takeout|teleport|tool|urllib|vampire|voideye|web(auto|collector|copier|copy|craw|fetch|go|leacher|pictures|reaper|sauger|whacker|zip)|wget|widow|wwwoffle|yahoo|yandex|zeus)/i.test(navigator.userAgent);
		
		var element,c,y;
		while (element = alist[i++]) {
			if ( _mysobj.hasClass(element,"mys_partners")) {
				if ( isbot) {
					element.href = 'javascript:void(0)';
				} else {				
					c = element.href;
					y = c.indexOf('&');
					if (y>0) {
						c = c.substr(0,y);
					}
					if (c.indexOf('?')>0) {
						element.href = c +"&u=" + tourl_link;
					} else {
						element.href = c +"?u=" + tourl_link;
					}
				}
			}
		}

		return false;
	};
	
	this.h_mys = function(){
		this.hm();
		return false;
	};

	this.h_pinMarklet = function(){
		this.pinMarklet();
		return false;
	};	

	return {
		sm: function() {s_mys(this);},
		hm: function() {h_mys();},
		pinMarklet: function(){h_pinMarklet();}
	};
}();

var _mys = function() {
	//this.cc = '';
	
	this.urlencode = function(s) {
		var ue = self.encodeURIComponent ? encodeURIComponent : escape;
		return ue( s ).replace( /\+/g, '%20' ).replace( /!/g, '%21' ).replace( /\'/g, '%27' ).replace( /\(/g, '%28' ).replace( /\)/g, '%29' ).replace( /\* /g, '%2A' ).replace( /\~/g, '%7E' );
	};
	
	this.hasClass = function(el,className) {
		if ( el.classList && el.classList.contains ) {
			return el.classList.contains(className);
		}
		return new RegExp('(^| )' + className + '( |$)', 'gi').test(el.className);
	};
};

window._mysobj = new _mys();
this.a = new _ehmysh();
var aclas;
var i = 0;
aclas= document.getElementsByTagName("a");
while (element = aclas[i++]) {
	if (element.getAttribute('myshare:id') == "mys_shareit" || element.getAttribute('myshare_id') == "mys_shareit" || element.className == "mys_shareit") {
		element.setAttribute('rel', 'nofollow');	
		this.a._mys_addEvent(element, "click", _mysin.sm);
	}
}

