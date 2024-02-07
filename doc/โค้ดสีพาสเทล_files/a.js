(function(z){function M(a){return B(a)?Math.floor(a):parseInt(a,10)}function B(a){return C(a,"number")}function F(a){return C(a,"object")}function C(a,b){var c=typeof a;return b?c==b:c}function N(){}function w(a){throw Error(a?"com.adloox.pubint: "+a:z);}function G(a){function b(d){return encodeURIComponent(d).replace(/[!'()*]/g,function(f){return"%"+f.charCodeAt(0).toString(16)})}for(var c=[],p=a.length;0<p--;)a[p][1]!==z&&null!==a[p][1]&&!1!==a[p][1]&&c.unshift(b(a[p][0])+(!0!==a[p][1]?"="+b(a[p][1]):
""));return c.join("&")}function I(){q||w("init not called")}function J(a){if(null==a)return"e";if(!(B(a)&&0<=a))return a;for(var b=[],c=q.thresholds.length;0<c--;)q.thresholds[c]<=a&&b.push(q.thresholds[c]);return b}function Q(a,b){var c="#";try{c+=CSS.escape(a.getSlotElementId())}catch(m){c+=a.getSlotElementId().replace(/^\d/,"\\3$& ")}var p=document.querySelector(c);if(!p)return b(null);if("none"==getComputedStyle(p).display)return b(NaN);try{if(D)throw!1;var d=function(m){try{var g=a.getSizes();
for(var k=0;k<g.length;k++)g[k]=[g[k].getWidth(),g[k].getHeight()]}catch(n){g=[]}if(0==g.length)return!1;if(1==g.length&&1>=g[0][0]*g[0][1]||m.top<=-this.pageYOffset&&m.left<=-this.pageXOffset&&m.top==m.bottom)return!0;for(var l=k=Infinity,e=0;e<g.length;e++){var u=g[e][0]*g[e][1];!(400>u)&&u<k*l&&(k=g[e][0],l=g[e][1])}g=Math.min(1,(m.right-m.left)/k);return{left:m.left,right:m.left+Math.max(20,g*k),top:m.top,bottom:m.top+Math.max(20,g*l)}}(p.getBoundingClientRect());if(!1===d)return b(NaN);if(!0===
d)return b(1);var f=d.right-d.left,v=d.bottom-d.top;if(400>f*v)return b(NaN);for(c=this;;){var r=Math.max(c.document.documentElement.clientWidth||0,c.innerWidth||0),y=Math.max(c.document.documentElement.clientHeight||0,c.innerHeight||0);d.left=Math.min(Math.max(d.left,0),r);d.right=Math.min(Math.max(d.right,0),r);d.top=Math.min(Math.max(d.top,0),y);d.bottom=Math.min(Math.max(d.bottom,0),y);if(c==top)return b((d.right-d.left)*(d.bottom-d.top)/(f*v));var x=c.frameElement;if(!x)throw!1;c=c.parent;var h=
x.getBoundingClientRect();d.left+=h.left;d.right=Math.min(d.right+h.left,h.right);d.top+=h.top;d.bottom=Math.min(d.bottom+h.top,h.bottom)}}catch(m){if(D===z)try{D=new IntersectionObserver(function(g){g.forEach(function(k){var l=400>k.intersectionRect.width*k.intersectionRect.height?NaN:k.intersectionRatio,e=E.findIndex(function(u){return u.element==k.target});E[e].l.forEach(function(u){return u(l)});E.splice(e,1);D.unobserve(k.target)})})}catch(g){D=!1}if(!D)return b(null);d=E.findIndex(function(g){return g.element==
p});-1==d?(E.push({element:p,l:[b]}),D.observe(p)):E[d].l.push(b)}}var q=null,D=this==top?!1:z,E=[],H=!1,t=[],O=!1,P=(this.adloox_pubint||{}).cmd||[];this.adloox_pubint={cmd:{push:function(a){a()}},init:function(a){q&&w("init already called");F(a)||w("params not an object");B(a.clientid)||w("missing clientid");513==a.clientid&&(a.platformid=230);B(a.tagid)||w("missing tagid");B(a.platformid)||w("invalid platformid");"slotinpath"in a&&(C(a.slotinpath,"boolean")||w("invalid slotinpath"));"imps"in a&&
(B(a.imps)&&0<a.imps||w("invalid imps"));var b=[50,60,70,80,90];if("thresholds"in a){b=a.thresholds;b instanceof Array&&b.length||w("invalid thresholds");for(var c=0;c<b.length;c++)b[c]=M(b[c]),0<b[c]&&100>=b[c]||w("invalid thresholds")}"freqcap_ip"in a&&(B(a.freqcap_ip)||w("invalid freqcap_ip"));"freqcap_ipua"in a&&(B(a.freqcap_ipua)||w("invalid freqcap_ipua"));q={h:Math.floor(a.clientid),j:Math.floor(a.tagid),i:Math.floor(a.platformid),u:a.slotinpath||z,m:Math.floor(a.imps)||z,thresholds:b,g:{o:Math.floor(a.freqcap_ip)||
z,s:Math.floor(a.freqcap_ipua)||z}};a=document.createElement("link");a.setAttribute("href","https://p.adlooxtracking.com");a.setAttribute("rel","preconnect");a.setAttribute("crossorigin","");document.getElementsByTagName("head")[0].appendChild(a)},gpt:function(a,b){function c(e){f+=e;if(!f)try{b()}catch(u){}}function p(){x.forEach(function(e){return e()})}function d(e,u,n){switch(!0){case C(n,"boolean"):if(!n)break;n=1;case B(n):if(!n)break;n=n.toString();case C(n,"string"):if(!n.length)break;n=[n];
case n instanceof Array:var A=n.length;if(A){for(;0<A--;)n[A]=n[A].toString();e.setTargeting("adl_"+u,n);return}}e.getTargeting(u).length&&e.clearTargeting(u)}I();F(a)&&C(b,"function")||w("incorrectly called");for(var f=1,v=a.pubads(),r=v.getSlots(),y=t.length,x=[],h=0;h<r.length;h++){for(var m=r[h].getSlotElementId(),g=!1,k=0;k<t.length;k++)if(t[k].getSlotElementId()==m){g=!0;break}g||t.push(r[h]);c(1);x.push(function(e){return function(){Q(e,function(u){var n=document.visibilityState===z||"visible"==
document.visibilityState;try{n=n&&top.document.hasFocus()}catch(A){}e.getAdUnitPath();e.getSlotElementId();n&&d(e,"atf",J(M(100*u)));c(-1)})}}(r[h]))}if(H&&t.length==y)return c(-1);"loading"==document.readyState?document.addEventListener("DOMContentLoaded",p,!1):p();r=[["v","gpt-f309ed1"],["c",q.h],["t",q.j],["p",q.i],["imp",q.m],["fc_ip",q.g.o],["fc_ipua",q.g.s],["pn",document.location.pathname]];h=20<t.length-y;m=[];for(g=y;g<t.length;g++)k=[t[g].getAdUnitPath()],q.u||k.push(t[g].getSlotElementId()),
(h?m:r).push(["s",k.join("\t")]);try{var l=new XMLHttpRequest;if(!("withCredentials"in l))throw!1;}catch(e){try{l=new XDomainRequest}catch(u){return c(-1)}}l.open(h?"POST":"GET","https://p.adlooxtracking.com/q?"+G(r));h&&l.setRequestHeader("content-type","application/x-www-form-urlencoded");l.timeout=3E3;l.onerror=l.ontimeout=function(){c(-1)};l.onprogress=N;l.onreadystatechange=function(){if(4==l.readyState&&0!=l.status){if(!(200<=l.status&&400>l.status))return l.onerror();var e;l.responseText?e=
JSON.parse(l.responseText):e={};for(var u={a:"aud",d:"dis",v:"vid"},n=0;n<(e._||[]).length;n++)for(var A in e._[n])d(t[y+n],A in u?u[A]:A,J(e._[n][A]));delete e._;for(var K in e)K in u||d(v,K,e[K]);H=!0;d(v,"ok",!0);c(-1)}};d(v,"ok",!1);l.send(h?G(m):null)},seg:function(a,b,c,p){function d(m){(f+=m)||p()}I();F(googletag)&&C(p,"function")||w("incorrectly called");var f=1,v=t.length;for(b=0;b<c.length;b++){for(var r=c[b].id,y=!1,x=0;x<t.length;x++)if(t[x].id==r){y=!0;break}y||t.push(c[b])}if(H&&t.length==
v)return d(-1);c=[["v","gpt-seg-f309ed1"],["c",q.h],["t",q.j],["p",q.i],["imp",q.m],["fc_ip",q.g.o],["fc_ipua",q.g.s],["pn",document.location.pathname]];for(b=v;b<t.length;b++)r=[t[b].name],q.u||r.push(t[b].id),c.push(["s",r.join("\t")]);try{var h=new XMLHttpRequest;if(!("withCredentials"in h))throw!1;}catch(m){try{h=new XDomainRequest}catch(g){return d(-1)}}h.open("GET","https://p.adlooxtracking.com/q?"+G(c));h.timeout=3E3;h.onerror=h.ontimeout=function(){d(-1)};h.onprogress=N;h.onload=function(){if(200>
h.status||400<=h.status)return h.onerror();for(var m=this.JSON?JSON.parse(h.responseText):eval("("+h.responseText+")"),g={a:"aud",d:"dis",v:"vid"},k=0;k<(m._||[]).length;k++)for(var l in m._[k])t[v+k].set("adl_"+(l in g?g[l]:l),J(m._[k][l]));delete m._;for(var e in m)e in g||a.set("adl_"+e,m[e]);H=!0;a.set("adl_ok",!0);d(-1)};a.set("adl_ok",!1);h.send(null)},gpt_js:function(a,b){I();F(a)&&b===z||F(b)||w("incorrectly called");var c=a.pubads();b=b||{id1:function(f){return f.slot.getSlotElementId()},
id2:function(f){return f.slot.getAdUnitPath()},id3:function(f){return f.advertiserId},id4:function(f){return f.campaignId},id5:function(f){return f.creativeId},id6:function(f){return f.lineItemId},id7:function(f){return f.size.join("x")},id8:function(){return c.getTagSessionCorrelator()},id9:function(){return c.getCorrelator()},id11:"$ADLOOX_WEBSITE"};if(O)console.warn("com.adloox.pubint: incorrect integration, gpt_js has already been called!");else{O=!0;var p="https://j.adlooxtracking.com/ads/js/tfav_adl_"+
q.h+".js",d=!1;c.addEventListener("slotRequested",function(){if(!d){d=!0;var f=document.createElement("link");f.setAttribute("href",p);f.setAttribute("rel","preload");f.setAttribute("as","script");document.getElementsByTagName("head")[0].appendChild(f)}});c.addEventListener("slotRenderEnded",function(f){var v=f.slot;if(!f.isEmpty){var r=v.getSlotElementId();if(v=document.getElementById(r)){r=[["tagid",q.j],["platform",q.i],["targetelt",r],["fwtype",4]];for(var y in b){var x=b[y];if(C(x,"function"))try{x=
x(f)}catch(h){x="ERROR: "+h.message}r.push([y,x])}f=document.createElement("script");f.src=p+"#"+G(r);v.parentNode.insertBefore(f,v.nextSibling)}}})}}};for(var L=0;L<P.length;L++)P[L]()}).call(this);
//# sourceMappingURL=a.js.map
