(function () {
	if(window._min_launcher_active)return;window._min_launcher_active=true;
	!function(){var a=[function(){return new XMLHttpRequest},function(){return new ActiveXObject("Msxml2.XMLHTTP")},function(){return new ActiveXObject("Msxml3.XMLHTTP")},function(){return new ActiveXObject("Microsoft.XMLHTTP")}];function b(a){var b=a&&a.stack,d=a&&a.message;b&&/(MIN\-)/.test(b)&&c({message:"Launcher died: "+d,stack:JSON.stringify(b)})}function c(a){"string"==typeof a&&(a={message:a}),a.level="error";var b=function(){for(var d={},b=0;b<arguments.length;b+=1)for(var e=arguments[b],c=Object.keys(e),a=0;a<c.length;a+=1)d[c[a]]=e[c[a]];return d}({ver:"launcher",env:"prod",url:window.location.href,referrer:document.referrer},a);d(JSON.stringify(b))}function d(a){e("//errors.tldw.me/",a)}function e(b,c){navigator.sendBeacon?navigator.sendBeacon(b+"_.gif",c):function(d,c){var b=function(){for(var c=!1,b=0;b<a.length;b++){try{c=a[b]()}catch(d){continue}break}return c}();if(b){var e="POST";b.open(e,d,!0),b.setRequestHeader("User-Agent","XMLHTTP/1.0"),c&&b.setRequestHeader("Content-type","application/x-www-form-urlencoded"),4!=b.readyState&&b.send(c)}}(b+"_.gif",c)}window.addEventListener("error",function(a){b(a.error)}),window.addEventListener("unhandledrejection",function(a){b(a.reason)})}();

	var min_validator = function () {
		var _userAgent = navigator.userAgent.toLowerCase();
		var _os = _blackList() || _tweezersOS(_userAgent);
		var _browser = _blackList() || _tweezersBrowser(_userAgent);
		var _isLPM = false;

		function isDeviceMobile() {
			return (/android|ios/).test(_os.name) || (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(_userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(_userAgent.substr(0, 4)));
		}

		function isDeviceDesktop() {
			return !isDeviceMobile()
		}

		function isDeviceIPad() {
            return (navigator.platform === "iPad") || (/iPad/i).test(_userAgent) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
		}

		function isOSiOS() {
			return (_os.name === "ios") || (/(?:iPhone|iPod|iPad)/i).test(_userAgent);
		}

		function isOSAndroid() {
			return _os.name === "android";
		}

		function isOSWindows() {
			return _os.name === "windows"
		}

		function isOSMac() {
			return _os.name === "mac os x"
		}

		function isOSOther() {
			return !isOSiOS() && !isOSAndroid() && !isOSWindows() && !isOSMac();
		}

		function isBrowserIE() {
			return _browser.name === "msie"
		}

		function isBrowserSafari() {
			return (isOSiOS() || (isDeviceDesktop() && _os.name === "mac os x")) && _browser.name === "safari";
		}

		function isBrowserChrome() {
			return _browser.name === "chrome";
		}

		function isBrowserEdge() {
			return _browser.name === "edge";
		}

		function isBrowserFirefox() {
			return _browser.name === "firefox";
		}


		function isBrowserOpera() {
			return _browser.name === "opera";
		}

		function isBrowserOther() {
			return _browser.name === "none" || (!isBrowserIE() && !isBrowserSafari() && !isBrowserChrome() && !isBrowserEdge() && !isBrowserFirefox() && !isBrowserOpera());
		}

		function osVersion() {
			return _os.version
		}

		function osName() {
			return _os.name
		}

		function browserVersion() {
			return _browser.version || [0];
		}

		function browserMajorVersion() {
			return _browser.version && _browser.version[0];
		}

		function browserName() {
			return _browser.name;
		}

		function isBrowserSupportsNonMuteAutoPlay() {
			return !isDeviceMobile() && (!isBrowserSafari() || browserMajorVersion() <= 10);
		}

		function isPromise(promise) {
			return promise && (typeof Promise === "function") && (promise instanceof Promise);
		}

		// pass error case and success case callback functions
		if (isDeviceMobile() && isBrowserSafari()) {
            var vid = document.createElement("video");
            vid.setAttribute("muted", "");
            vid.setAttribute("playsinline", "");
            vid.setAttribute("inline", "");
            vid.setAttribute("webkit-playsinline", "");
            vid.muted = true
            var playPromise = vid.play();
            if (isPromise(playPromise) && playPromise.then && playPromise.catch) {
                playPromise.then(function (data) {
                    _isLPM = false;
                }).catch(function (err) {
                    if (err.code === 0) {
                        _isLPM = true;
                    }
                });
            } else {
                _isLPM = false;
            }
		}else{
			_isLPM = false;
		}

		function isLPM() {
			return _isLPM;
		}

		function isDataSaverOn() {
			return navigator && navigator.connection && navigator.connection.saveData
		}

// Private methods

		function _tweeze_rv(userAgent) {
			var value = userAgent.match(/rv:([\d.]+)/) || userAgent.match(/\b(?:MS)?IE\s+([\d\.]+)/i);
			return value && value[1];
		}

		function _tweeze_version(userAgent) {
			var value = userAgent.match(/version\/([\d.]+)/);
			return value ? value[1] : "0.0";
		}

		function _tweeze_fbios(userAgent) {
			var value = userAgent.match(/fbsv\/([\d]+)/);
			return value ? value[1] : "0.0";
		}

		function iosVersion(userAgent) {
            const value = userAgent.match(/([\d_]+) like mac os/);
            return value && value[1];
        }

		function _tweezersOS(userAgent) {
			return _tweezers(userAgent, {
				orders: "iphone os|cpu os|mac os x|mac os|windows nt|android|linux|cpu os",
				tweezeVer: "item ([\\d._]+)",
				transformMap: "iphone os|mac os|cpu os|->ios windows nt->windows",
				verEngine: {msie: _tweeze_rv, safari: _tweeze_version},
			});
		}

		function _tweezersBrowser(userAgent) {
			var BuildVersion = /^(.*)(?:build\/[^\s\)]+)(.*)$/i;
			userAgent = userAgent.replace(BuildVersion, "$1$2");
			return _tweezers(userAgent, {
				orders: "fbios|trident|edge|msie|fxios|firefox|opr|opera|crios|chrome|safari",
				tweezeVer: "item\\/([\\d._]+)",
				transformMap: "trident|msie->msie opera opr->opera firefox fxios->firefox crios->chrome",
				verEngine: {msie: _tweeze_rv, safari: _tweeze_version, fbios: _tweeze_fbios},
			});
		}


		function _tweezers(userAgent, config) {
			var name = "other";
			var orders = config.orders;
			var tweezeVer = config.tweezeVer;
			userAgent = userAgent.toLowerCase();
			var items = userAgent.match(RegExp(orders, "ig"));
			var versionParse;

			/* If we found some items */
			if (items) {
				/* Sort item by relevent, mean by config.orders*/
				items.sort(function (a, b) {
					return orders.indexOf(a) - orders.indexOf(b);
				});

				/* get the most relevant item*/
				/* and convert rawName to normalize name*/
				name = config.transformMap.match(RegExp(items[0] + ".*?->(\\w*)?")) || [];
				name = name[1] || items[0];

				/* select engine to extract version from userAgent */
				var verEngine = config.verEngine[name] || function () {
						var verReg = RegExp(tweezeVer.replace("item", items[0]), "i");
						var match = userAgent.match(verReg);
						return match && match[1];
					};
				versionParse = _parseRawVersion(verEngine(userAgent));

			} else {
				//uiwebview

				var standalone = ("standalone" in window.navigator) && !window.navigator.standalone,
					ios = /iphone|ipod|ipad/.test(userAgent);

				if (ios) {
					if (standalone) {
						//standalone
						name = "safari";
					} else {
						//uiwebview
						name = "safari";
					}
					versionParse = _parseRawVersion(iosVersion(userAgent));
				}
			}

			name = (name === "fbios") ? "safari" : name;

			return {
				name: name,
				version: versionParse,
			};
		}

		function _blackList() {
			var BLACK_LIST = /Yandex|SeaMonkey|Maxthon|Avant|Deepnet|Comodo_Dragon|Dooble|Palemoon|Flock|facebookexternalhit|Facebot|bb\d+|PlayBook|Googlebot|SMART-TV|Kindle/i;
			if (!!_userAgent.match(BLACK_LIST)) {
				return {
					name: "none",
					version: [-1],
				};
			}
			return null;
		}

		function _parseRawVersion(_version) {
			var version = [-1];
			if (_version) {
				version = _version.split(/[._]/);
				version[0] = version.major = version[0] ? parseInt(version[0]) : 0;
				version[1] = version.minor = version[1] ? parseInt(version[1]) : 0;
				version[2] = version.patch = version[2] ? parseInt(version[2]) : 0;
				version[3] = version.build = version[3] ? parseInt(version[3]) : 0;
			}
			return version;
		}

		return {
			"isDeviceMobile": isDeviceMobile,
			"isDeviceDesktop": isDeviceDesktop,
			"isDeviceIPad": isDeviceIPad,
			"isOSiOS": isOSiOS,
			"isOSAndroid": isOSAndroid,
			"isOSWindows": isOSWindows,
			"isOSMac": isOSMac,
			"isOSOther": isOSOther,
			"isBrowserIE": isBrowserIE,
			"isBrowserSafari": isBrowserSafari,
			"isBrowserChrome": isBrowserChrome,
			"isBrowserEdge": isBrowserEdge,
			"isBrowserFirefox": isBrowserFirefox,
			"isBrowserOpera": isBrowserOpera,
			"isBrowserOther": isBrowserOther,
			"osVersion": osVersion,
			"osName": osName,
			"browserVersion": browserVersion,
			"browserMajorVersion": browserMajorVersion,
			"browserName": browserName,
			"isBrowserSupportsNonMuteAutoPlay": isBrowserSupportsNonMuteAutoPlay,
			"isLPM": isLPM,
			"isPromise": isPromise,
			"isDataSaverOn": isDataSaverOn
		}
	}();

	!function(){var e="minUnifiedSessionToken10",t={sessionId:"__sidts__",uid:"__uidts__"},n="sessionId",i=function e(){try{var t;if((t=navigator.cookieEnabled)||(document.cookie="testcookie",t=-1!=document.cookie.indexOf("testcookie")),t)return{getItem:function e(t){var n=document.cookie.match(RegExp("(?:^|; )"+t.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g,"\\$1")+"=([^;]*)"));return n?decodeURIComponent(n[1]):void 0},setItem:function e(t,n){var i=encodeURIComponent(t)+"="+encodeURIComponent(n);i+="; path=/; domain="+location.hostname.split(".").slice(-2).join(".")+"; max-age=2592000;",document.cookie=i}};if(o(localStorage))return localStorage;if(o(sessionStorage))return sessionStorage;return null}catch(n){return null}}(),r={};function o(e){try{e.setItem("_minTest","test value"),e.removeItem("_minTest")}catch(t){return!1}return!0}function u(){i.setItem(e,JSON.stringify(r)),s()}function s(){window._minUnifiedSessionToken10=r}function c(){(r={})[n]=f(),r.uid=f(),r[t[n]]=a(),r[t.uid]=a()}function f(){function e(){return Math.floor((1+Math.random())*a()).toString(16).substring(1)}return e()+"-"+e()+"-"+e()+"-"+e()+"-"+e()}function a(){return new Date().getTime()}!function o(){var $,d;if(!i){c(),s();return}if(!((r=JSON.parse(i.getItem(e)||"{}"))[n]&&r.uid&&r[t[n]]&&r[t.uid])){c(),u();return}$=r[t[n]],(Math.abs(a()-$)>18e5||function e(t){let n=6e4*new Date().getTimezoneOffset();function i(e){return new Date(e+n)}let r=new Date(t).getTime(),o=a(),u=i(r),s=i(o),c=s.getYear(),f=u.getYear(),$=s.getMonth(),d=u.getMonth(),m=s.getDate(),g=u.getDate();return c>f||$>d||m>g}($))&&(r[n]=f()),d=r[t.uid],Math.abs(a()-d)>2592e6&&(r.uid=f()),r[t[n]]=a(),r[t.uid]=a(),u()}()}();
	
	!function(e,t){var r,n=document.currentScript?document.currentScript.src:null,a=a||new Date().getTime();if(window._min_tv=window._min_tv||{},window._min_tv.launcher=window._min_tv.launcher||{},window._min_tv.launcher.logger=window._min_tv.launcher.logger||[],window._min_tv.launcher.config=e,window._min_tv.launcher.packages_list=t,window._min_tv.launcher.placements=e.urlPlacementsConfig,window._tvp={markerIsReady:s},window._editor_tv_loaded){window._min_tv.launcher.logger.push("launcher was tried to load twice and blocked");return}if(function t(){for(var r,n=e.blackList||[],a=0;a<n.length;a++)if((r=RegExp(n[a])).test(location.href))return!0;return!1}()){window._min_tv.launcher.logger.push("top videos blocked due to black list");return}function i(){window._min_tv.launcher.logger.push("Searching for top videos placements"),s(),setInterval(s,1e3)}function s(){n=document.querySelector("div.editor-tv-wrapper:not(.editor-tv-active):not(.editor-tv-progress)"),n&&(t=n.dataset.embedName||n.dataset.embedId,r=n.dataset.placementName||"publisherDomMarker",f({embed:t},o.bind(null,{publisherDomMarker:n,embed:t,name:r})));var t,r,n,a,i,s,l,c,u,m,h,b,$,y,k,T,w=function t(){for(var r=null,n=e.urlPlacementsConfig||[],a=0;a<n.length;a++){if(!n[a].hasNoPackage){if(r=g(n[a]),(n[a].allowMultiInstances||!n[a].injected)&&r&&d(n[a]))return n[a]}}return!1}();w&&(window._min_tv.launcher.logger.push("found matching placement"),window._min_tv.launcher.logger.push("Matching placement:"),window._min_tv.launcher.logger.push(w),w.abTest&&(a=w,i=JSON.parse(function e(t){for(var r=t+"=",n=decodeURIComponent(document.cookie).split(";"),a=0;a<n.length;a++){for(var i=n[a];" "==i.charAt(0);)i=i.substring(1);if(0===i.indexOf(r))return i.substring(r.length,i.length)}return""}("minTVexp")||"{}"),(s=i,l=a,c=p(JSON.stringify(l.abTest)),s.experiment==c&&s.bucket_name)?function e(t,r){let n=r.abTest.buckets.find(function(e){return t.bucket_name===v(e)});n.active=!0,r.embed=n.embed||r.embed,window._min_tv.launcher.logger.push("abTest bucket is "+JSON.stringify(n))}(i,a):(u=a,m=function e(t){for(var r=t.abTest.buckets.filter(function(e){return e.weight>0}),n=Math.floor(100*Math.random()),a=0,i=0;i<r.length;i++)if(n<(a+=parseInt(r[i].weight)))return i}(u),h=u.abTest,b=m,$=JSON.stringify({experiment:p(JSON.stringify(h)),bucket_name:v(h.buckets[b])}),(y=new Date).setTime(y.getTime()+31536e6),k="expires="+y.toUTCString(),document.cookie="minTVexp="+$+";"+k+";path=/",window._min_tv.launcher.logger.push("abTest bucket set to "+JSON.stringify(h.buckets[b])),u.abTest.buckets[m].active=!0,u.embed=u.abTest.buckets[m].embed||u.embed)),f(w,o.bind(null,w)))}function l(){for(var e={},t=0;t<arguments.length;t+=1){var r=arguments[t];for(var n in r)e[n]=r[n]}return e}function o(t,r){var a;if(r){if(window._min_tv.launcher.logger.push("found matching package in list"),window._min_tv.launcher.logger.push(r),!(a=t.publisherDomMarker?t.publisherDomMarker:function e(t){r=t.selectors.xpath?[document.evaluate(t.selectors.xpath.target,document,null,XPathResult.FIRST_ORDERED_NODE_TYPE,null).singleNodeValue]:document.querySelectorAll(t.selectors.target);for(var r,n=0;n<r.length;n++){var a=r[n];if(t.selectors.method&&a&&!a.dataset.minTvRunning)return markerEle=u(markerEle=c(t),t),"replaceInnerTarget"==t.selectors.method?(a.innerHTML="",a.insertAdjacentElement("afterbegin",markerEle)):a.insertAdjacentElement(t.selectors.method,markerEle),a.dataset.minTvRunning=!0,t.injected=!0,markerEle}}(t)))return;var i,s=JSON.parse(JSON.stringify(e));if(s.placementName=t.name,s.placementId=t.id,t.configOverrides)for(var o=Object.keys(t.configOverrides),d=0;d<o.length;d++){var g=o[d];s[g]=t.configOverrides[g]}if(t.abTest){for(var f=t.abTest.buckets.findIndex(function(e){return!!e.active}),v=t.abTest.buckets[f],p=Object.keys(v),h=0;h<p.length;h++){var b=p[h];"embed"!=b&&"weight"!=b&&(s[b]=v[b])}s.bucketName=v.name}var $,y,k,T,w,S,E,C,_=($=a,y=s.allowedThirdPartyConfigOverrides,E=y?y.split(","):[],C=(k=$,T=E,w=k.dataset,S={},T.forEach(function(e){void 0!==w[e]&&(S[e]=w[e])}),S),l(C,function e(t){if(!n)return{};var r={},a=function e(t){if(!t)return{};for(var r={},n=t.split("&"),a=0;a<n.length;a++){var i=n[a].split("=");i[0]&&i[1]&&(r[i[0]]=i[1])}return r}(n.split("?")[1]);return a.AdConsent&&(r.concentValue=a.AdConsent),a.source&&(r.product=a.source),r}(["product","concentValue"])));if(Object.keys(_).length>0&&(s=l(s,_)),t.featureFlagConfigOverrides){var x=t.featureFlagConfigOverrides.flagName;if(x){if(location.href.includes(x)){window._min_tv.launcher.logger.push("url match featureFlagConfigOverrides overriding configs");for(var o=Object.keys(t.featureFlagConfigOverrides),d=0;d<o.length;d++){var g=o[d];s[g]=t.featureFlagConfigOverrides[g]}}}else window._min_tv.launcher.logger.push("Placement has featureFlagConfigOverrides but missing flagName")}a.classList.add("editor-tv-progress");var L,M,O,A,D,I=a.querySelector(".editor-tv-title"),N=(L=a,M=document.createElement("div"),M.setAttribute("id","minute-size-container"),M.style.width="100%",M.style.position="relative",L.querySelector(".editor-tv-component").appendChild(M),M);"dom"===s.hostElement?(i=function e(t,r){try{var n=document.createElement("div");return n.classList.add("tvp-host-element"),r&&(n.style=r),t.appendChild(n),n}catch(a){return console.warn(a),!1}}(N,t.hostElementStyle),window._min_tv.launcher.logger.push("tvp hostElement = dom")):(i=function e(t,r){try{var n=document.createElement("iframe");n.classList.add("tvp-host-element"),n.setAttribute("src","about:blank"),n.setAttribute("frameborder","0"),n.setAttribute("scrolling","no"),n.setAttribute("title","Must watch - top videos player"),r?n.style=r:(n.style.width="100%",n.style.height="100%",n.style.position="absolute",n.style.top="0",n.style.left="0"),t.appendChild(n),n.contentWindow.document.open().close();var a=document.createElement("tag");return a.setAttribute("name","viewport"),a.setAttribute("content","width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"),n.contentDocument.head.appendChild(a),n}catch(i){return console.warn(i),!1}}(N,t.iframeStyle),window._min_tv.launcher.logger.push("tvp hostElement = iframe")),I&&(I.innerText=r.package_name),i&&(s.hostElement,O=i,A=m.bind(null,i,a,N,r,s),(D=document.createElement("script")).src=function t(){var r;try{if(localStorage.minuteTvpUrl)return localStorage.minuteTvpUrl}catch(n){}return"//snippet.tldw.me/tv/"+e.versions.split("@")[0]+"/tvp.js"}(),D.type="text/javascript",D.async=!0,D.onload=A,O.contentWindow?O.contentWindow.document.head.appendChild(D):document.head.appendChild(D))}else{t.hasNoPackage=!0,window._min_tv.launcher.logger.push("Couldn't find matching package for placement");try{window.webkit.messageHandlers.MinuteMessageHandler.postMessage({didSucceed:!1})}catch(P){try{mobileHandler.onLoadingFailed()}catch(V){}}}}function c(e){var t=document.createElement("div"),r=document.createElement("div");t.classList.add("editor-tv-wrapper"),t.classList.add("editor-tv-progress");var n=e.wrapperStyle,a=e.wrapperClasses;if(e.abTest){var i=e.abTest.buckets.find(function(e){return!!e.active});i&&i.wrapperStyle&&(n=i.wrapperStyle),i&&i.wrapperClasses&&(a=i.wrapperClasses)}return n&&(t.style=n),a&&a.map(function(e){t.classList.add(e)}),t.style.display="none !important",r.classList.add("editor-tv-component"),t.appendChild(r),t}function u(e,t){var r,n=t.titleElement,a=t.selectors.titleStyle;if(t.abTest){var i=t.abTest.buckets.find(function(e){return!!e.active});i&&i.selectors&&i.selectors.titleStyle&&(a=i.selectors.titleStyle),i&&i.titleElement&&(n=i.titleElement)}return n&&e.insertAdjacentHTML("afterbegin",n),a&&function e(t,r){if(null==t||null==r)return!1;var n,a,i,s=t.currentStyle||document.defaultView.getComputedStyle(t,null);if(!s)return null;for(i in s)void 0!==(a=s[i])&&"object"!=typeof a&&"function"!=typeof a&&a.length>0&&a!=parseInt(a)&&(r.style[i]=s[i])}(r=document.querySelector(i.selectors.titleStyle),e.querySelector(".editor-tv-title")),e}function d(t){if(t.feature_flag&&!location.href.includes("minutely-tv-feature-flag"))return!1;var r=!0;t.selectors.validator&&(r=!!document.querySelector(t.selectors.validator));var n=!0;if(t.JSValidator){var a=Function("min_validator",t.JSValidator);n=a(min_validator)}var i=!0;if(e.generalPlacementValidator){var a=Function("placement",e.generalPlacementValidator);i=a(t)}var s=!!t.selectors.target&&document.querySelector(t.selectors.target),l=!!t.selectors.xpath&&!!t.selectors.xpath.target&&document.evaluate(t.selectors.xpath.target,document,null,XPathResult.FIRST_ORDERED_NODE_TYPE,null).singleNodeValue;return i&&r&&n&&(s||l)}function g(e){e.regexList=e.regexList||[];for(var t,r,n=0;n<e.regexList.length;n++)if(r=e.regexList[n],e.feature_flag&&r.endsWith("$")&&(r=r.substring(0,r.length-1)+"\\?minutely-tv-feature-flag$"),(t=RegExp(r)).test(location.href))return!0;return!1}function f(e,r){var n,a,i,s,l,o,c,u,d,g,f=isNaN(parseInt(e.embed))?"alias":"embed_id",m=e.embed;t.length>0?function e(r,n,a){for(var i=!1,s=0;s<t.length;s++)t[s][r]==n&&(i=t[s]);a(i)}(f,m,r):(n=f,a=m,i=r,l="",o=!1,l=(c=n,u=a,d="//tv.tldw.me/api/v1/editor/configuration/MIN-900270.json?",d+=c="alias"==c?"alias_name":c,d+="[]=",d+=u),g=new XMLHttpRequest,g.onreadystatechange=function(){if(4==this.readyState&&200==this.status)try{o=(s=JSON.parse(g.responseText)).packages[0],i(o)}catch(e){}},g.open("GET",l,!0),g.send())}function m(e,t,r,n,i){try{window.webkit.messageHandlers.MinuteMessageHandler.postMessage({height:.5625*parseFloat(getComputedStyle(e).width.slice(0,-2))+32})}catch(s){}(e.contentWindow?e.contentWindow:window).startMinTopVideo({minuteGenesis:a,pageGenesis:window.performance.timing.navigationStart,config:i,package:n,sizeContainer:r,sessionData:Object.assign({},window._minUnifiedSessionToken10),wrapperEle:t,hostElement:e,min_validator:min_validator}),t.classList.add("editor-tv-active"),t.classList.remove("editor-tv-progress")}window._editor_tv_loaded=!0,(r=e.beforeInit?Function(e.beforeInit):function(){return Promise.resolve()})().then(function e(){"interactive"===document.readyState||"complete"===document.readyState?i():document.addEventListener("DOMContentLoaded",i)});function v(e){return e.name||p(JSON.stringify(e))}function p(e){var t=0;if(0==e.length)return t;for(var r=0;r<e.length;r++)t=(t<<5)-t+e.charCodeAt(r),t&=t;return t}}({"publisherId":"900270","publisherName":"Taboola | Thairath","rezVideo":{"tvxs":200,"tvs":300,"tvm":350,"tvl":400},"limitNumberOfVideoToFourInNewChromeAndEdge":"true","customIabVisibleName":"taboolaVisibleImpression","customIabVisibleDuration":"1000","onCompatibleScript":"top.window.minutelyTaboolaAPI.tvpIsCompatible()","titleStyle":"3","versions":"0.42.27-chunks","showLogo":"false","disable_utm":"true","viewableDuration":"1000","onReportClickScript":"top.window.minutelyTaboolaAPI.onReportClickScript(payload)","onReportReadyToPlayScript":"top.window.minutelyTaboolaAPI.onReportReadyToPlayScript(payload)","link_target":"_top","onAvailableScript":"top.window.minutelyTaboolaAPI.onAvailable()","onNotCompatibleScript":"top.window.minutelyTaboolaAPI.tvpIsNotCompatible()","background_color":"black","shuffleAPVS":"true","customCss":".apv-number{font-size: 1.1em !important;} .title-no-wrap{font-size: 0.75em !important;} .minute-tvp-root-element-container#minute-tvp-root-element-container .minute-tv-component-wrap#minute-tv-component-wrap .minute-overflow-ellipsis{line-height:1.8em !important;} .minute-tvp-root-element-container#minute-tvp-root-element-container .minute-tv-component-wrap#minute-tv-component-wrap .minute-is-white {color: #ffffff !important; white-space: nowrap !important;}.minute-tvp-root-element-container#minute-tvp-root-element-container .minute-tv-component-wrap#minute-tv-component-wrap .nav-bg.unified .min-reveal {background: #00b400 !important;} .minute-tvp-root-element-container#minute-tvp-root-element-container .minute-tv-component-wrap#minute-tv-component-wrap .call-to-action {padding: 3% 3.5% !important; font-size: 0.75em !important;}","background_lowerthird_number":"#00b400","callToActionText":"ดูคลิปเต็ม","enableCallToAction":"true","clickableArea":"tvp","enableGoogleCompliance":"true","urlPlacementsConfig":[{"name":"Sample Placement","embed":4717217,"regexList":["https://www.thairath.co.th/home"],"selectors":{"target":".tab-pane.Homepage-ShortcutMenu_Home.active","method":"beforebegin"},"wrapperStyle":"max-width: 750px; margin: 10px auto;","XXXconfigOverrides":{"background_lowerthird_number":"#00b400","enableCallToAction":"true","callToActionText":"ดูคลิปเต็ม","customCss":".apv-number{font-size: 1.1em !important;} .title-no-wrap{font-size: 0.75em !important;} .minute-tvp-root-element-container#minute-tvp-root-element-container .minute-tv-component-wrap#minute-tv-component-wrap .minute-overflow-ellipsis{line-height:1.8em !important;} .minute-tvp-root-element-container#minute-tvp-root-element-container .minute-tv-component-wrap#minute-tv-component-wrap .minute-is-white {color: #ffffff !important;}.minute-tvp-root-element-container#minute-tvp-root-element-container .minute-tv-component-wrap#minute-tv-component-wrap .nav-bg.unified .min-reveal {background: #00b400 !important;} .minute-tvp-root-element-container#minute-tvp-root-element-container .minute-tv-component-wrap#minute-tv-component-wrap .call-to-action {padding: 3% 3.5% !important; font-size: 0.75em !important;}"},"feature_flag":true,"id":3992}]},[{"id":6399886,"template":"","embed_id":"4717217","package_type":"auto","package_name":"default package","videos":[{"id":58269963,"title":"สุดเหี้ยม! หนุ่มโหดจับพ่อ-น้องสาว ลงกล่องเหล็ก ถ่วงน้ำดับทั้งเป็น 2 ศพ","link":"https://www.thairath.co.th/news/crime/2753862","video":"//apv-static.tldw.me/videos/v-3efa7bfc-cd53-4bb8-3521166-88f3-9feb7746fbfa-s36.68-44.12"},{"id":58261515,"title":"ท่านเจ้าคุณระบุ \"ตบหัว-เท้ายัน\" สามเณรนั่งหลับ เป็นการสั่งสอนตามปกติ","link":"https://www.thairath.co.th/news/local/northeast/2753828","video":"//apv-static.tldw.me/videos/v-f45f0d5d-5bed-4cc8-3520775-8adf-c9fe9b5b57bf-s42.84-51.72"},{"id":58243394,"title":"เกิดเหตุไฟไหม้โรงงานกระดาษอัดแท่ง เมืองปทุมธานี กลางดึก","link":"https://www.thairath.co.th/news/local/central/2753700","video":"//apv-static.tldw.me/videos/v-861afd7f-debd-4be3-3519761-a80e-77011381c03d-s19.791-26.228"},{"id":58257953,"title":"ฟังคำตอบ นนกุล หลัง หมอช้าง แนะหมั้น-แต่ง แอฟ ทักษอร ก่อนเมษาจะดีราบรื่น","link":"https://www.thairath.co.th/entertain/celeb/2753618","video":"//apv-static.tldw.me/videos/v-51071f8b-e52b-4747-3520248-aae3-cb4699ed771d-s0.0-6.16"},{"id":58226765,"title":"สาวถูกฆ่าฝังดิน คล้ายฝังทั้งเป็น พ่อสงสัยแฟนหนุ่ม ตร.เร่งลากคอสอบ","link":"https://www.thairath.co.th/news/crime/2753660","video":"//apv-static.tldw.me/videos/v-7ab9af33-8aed-4ec8-3519173-b418-c0ec8e38bad6-s78.615-87.532"}],"alias":"taboola-thairathcoth-all"}]);
	
	!function(n){function e(n){window._min.launcher.logger.push(n)}if(_min={config:n,sessionData:Object.assign({},window._minUnifiedSessionToken10),debug:false,compatibility:min_validator,_publisher:n.system.publisher},window._min=window._min||{},window._min.launcher=window._min.launcher||{},window._min.launcher.logger=window._min.launcher.logger||[],function(){var n=_min.config.config.pubDomains;if(!n)return!0;"string"==typeof n&&(n=[n]);for(var e=0;e<n.length;e++)if(new RegExp(n[e]).test(window.location.hostname))return!0;return!1}())if(0==_min.debug&&o("bLkV"))e("Production is blocked by cookie");else{!function(){const i=function(){const n=window.location.href.split("?")[1];return new URLSearchParams(n).get("qadtFlavor")}();if(!i)return;e("found qadt flavor. name = "+i);const o=n.config.flavors.find(function(n){return n.name===i});o?(e("setting the flavor in cookies"),t(o)):e("qadt flavor name doesn't match any flavor in the configuration")}(),_min.flavor=function(){if(void 0!==n.config.flavors){var i=a();if(i)return i;for(var o=Math.floor(100*Math.random()),r=0,s=0;s<n.config.flavors.length;s++)if(i=n.config.flavors[s],r+=parseInt(i.weight),0!=i.weight){if(o<r)return e("Flavors: New flavor selection"),t(i),i}else e("Minute Launcher - version "+i.name+" with 0 weight");100!=r&&e("'versions' weights are not 100")}else e("Flavors: Minute Launcher - Disabled by no version")}();var i=document.createElement("script");i.src=function(){if(_min.flavor.groupName)var e="https://"+n.system.snippetEnv+"/"+_min.flavor.groupName+"/"+_min.flavor.file;else e="https://"+n.system.snippetEnv+"/"+_min._publisher+"/"+_min.flavor.file;return e}(),i.type="text/javascript",i.async=!0,i.setAttribute("crossorigin","anonymous"),document.getElementsByTagName("head")[0].appendChild(i)}else e("the current domain is not set on config");function o(n){for(var e=n+"=",i=decodeURIComponent(document.cookie).split(";"),o=0;o<i.length;o++){for(var r=i[o];" "==r.charAt(0);)r=r.substring(1);if(0===r.indexOf(e))return r.substring(e.length,r.length)}return""}function r(n){return n.name+n.file+n.weight}function t(e){var i={experiment:s(JSON.stringify(n.config.flavors)),minFlavor:r(e)};!function(n,e,i){var o=new Date;o.setTime(o.getTime()+24*i*60*60*1e3);var r="expires="+o.toUTCString();document.cookie=n+"="+e+";"+r+";path=/"}("minVersion",JSON.stringify(i),365)}function a(){var i=null,t=JSON.parse(o("minVersion")||"{}");if(t.experiment!=""+s(JSON.stringify(n.config.flavors)))return e("Flavors: AB test has changed"),i;for(var a=t.minFlavor||"",f=0;f<n.config.flavors.length;f++){var l=n.config.flavors[f];if(a==r(l)){e("Flavors: Return same flavor as known from cookies"),i=l;break}}return i}function s(n){var e=0;if(0==n.length)return e;for(var i=0;i<n.length;i++){e=(e<<5)-e+n.charCodeAt(i),e&=e}return e}}({"fallbackUsed":true,"videos":[],"config":{"general":{"welcomeToMinuteSize":"off"},"scraper":{"IAContainers":".video, #TV_player_live_player, .dugout-video","featuredWrapper":".video, #TV_player_live_player, .dugout-video, #video-player, .__item_article-highlight-image","type2":false,"filter":{"white":["https://www.thairath.co.th/"],"black":["^https://www.thairath.co.th/[^/]*$","^https://www.thairath.co.th/[^/]*/[^/]*$","^https://www.thairath.co.th/tv/live$","^https://www.thairath.co.th/sport/video$","https://www.thairath.co.th/sport/video/.+","https://www.thairath.co.th/sport/.+"]}},"flavors":[{"name":"Thairath QA3","file":"mi-scraper-1.17.0.97.js","weight":100}]},"overrides":{},"system":{"snippetEnv":"snippet.minute.ly/publishers","publisher":900270,"publisherName":"Taboola | Thairath","baseVideoUrl":"apv-static.minute.ly/videos/v-","rezVideo":{"s":100,"m":200,"l":300},"server_version":"v4","builder_version":"[ApvConfiguration::PublisherConfigurationBuilderV4][Publisher-900270]"}});

    

}());