// 82169863016674

(function() {
    class UROPT {
        constructor() {
            this.code_segment = "2825850";
            this.code_type = "bd";
            this.action = false;
            this.allow_crawl_content = true;
            this.allow_log_scroll_content = false;
            this.hostname = window.location.hostname;
            this.host = window.location.host;
            this.href = window.location.href;
            this.referrer = window.document.referrer;
            this.uuid = "82169863016674";
            this.callBack = "";
        }

        async init() {
            await this.getOPTUID();
            //callBack
            if(this.callBack != undefined && this.callBack != null){
                window[this.callBack] != undefined && window[this.callBack].call(this,this.uuid);
            }
            this.optimize();
            try{
                this.allow_crawl_content ? this.getcategory() : this.setupGTag("");
            }catch(err){
                console.log(err);
            }
            this.allow_log_scroll_content && this.listenerEventScroll();
            
            this.setCookiesNewDomain();
        }

        optimize(){
            try {
                let OPTUID = this.uuid;
                if(OPTUID){
                    let TIMESTAMP = new Date().getTime();
                    let url_tracking = "https://optimize.urekamedia.com/optimize/tracking";
                    let params = {
                        uid: OPTUID,
                        code_segment: this.code_segment,
                        code_type: this.code_type,
                        referrer: this.referrer,
                        url: this.href,
                        action: this.action
                    };
                    let q = encodeURI(window.btoa(JSON.stringify(params)));
                    let src = url_tracking + "?q=" + q + "&v=" + TIMESTAMP;
                    let currentScript = document.currentScript ? document.currentScript.parentElement : document.body;
                    var iframeOptimize = document.createElement('iframe');
                    iframeOptimize.style.width = '1px';
                    iframeOptimize.style.height = '1px';
                    iframeOptimize.style.display = 'none';
                    iframeOptimize.id = 'uk-optimize-'+this.code_segment;
                    iframeOptimize.src = src;
                    currentScript.appendChild(iframeOptimize);
                }
            } catch (error) {
                console.log(error);
            }
        }

        checkCookieEnabled() {
            return true;
            let cookieEnabled = navigator.cookieEnabled;
            if(!cookieEnabled){
                return false;
            }
            return true;
        }
    
        getcategory(){
            const selectorConfig = this.getSelectorConfig()
            const categorySelector = (selectorConfig[this.hostname] && selectorConfig[this.hostname]['categorySelector']) ? selectorConfig[this.hostname]['categorySelector'] : false;
            if(categorySelector){
                let elSelector = window.document.querySelector(categorySelector);
                if(elSelector){
                    let content = elSelector.innerText || elSelector.textContent;
                        content = content.replace(/\s+/g, ' ');
                        let category = this.formatStrCategory(content);
                    if(category){
                        this.setupGTag(category);
                    }
                }
            }
        }
    
        setupGTag(category){
            try {
                var script = document.createElement('script');
                script.src = "https://www.googletagmanager.com/gtag/js?id=G-DRR9FLR74Q";
                script.async = true;
                window.document.head.appendChild(script);
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'G-DRR9FLR74Q', {
                    'user_id': this.uuid,
                    'user_properties': {
                        'code_segment': this.code_segment,
                    },
                    'custom_map':{
                        'dimension1': 'category'
                    }
                });
                if(category){
                    gtag('event', 'category', {"send_to":'G-DRR9FLR74Q', 'category': category});
                }
            } catch (error) {
                console.log(error)
            }
        }
    
        // setupGA(category){
        //     try {
        //         (function (i, s, o, g, r, a, m) {
        //             i['GoogleAnalyticsObject'] = r;
        //             i[r] = i[r] || function () {
        //                 (i[r].q = i[r].q || []).push(arguments)
        //             }, i[r].l = 1 * new Date();
        //             a = s.createElement(o),
        //             m = s.getElementsByTagName(o)[0];
        //             a.async = 1;
        //             a.src = g;
        //             m.parentNode.insertBefore(a, m)
        //         })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
                
        //         ga('create', 'UA-172139508-1', 'auto', 'uk_optimize');
        //         ga('uk_optimize.set', {
        //             'campaignSource': this.host,
        //             'campaignName': "", 
        //             'campaignMedium': this.href, // url
        //             'campaignContent': category, // cate
        //         });
        //         ga('uk_optimize.send', 'pageview');
        //         ga('uk_optimize.send', 'event', this.host, category, this.href);
        //     } catch (error) {
        //         console.log(error)
        //     }
        // }
    
        listenerEventScroll(){
            let time_begin_scroll = new Date();
            let time_end_scroll = new Date();
    
            let innerHeight = this.getInnerHeight();
            let contentHeight = this.getContentHeight();
    
            let page4 = Math.floor(contentHeight / 4);
            let page15 = Math.floor((contentHeight / 100) * 15);
    
            let scroll = 0;
            let current_scroll = "0%";
            let number_scroll = 0;
    
            window.addEventListener("scroll", (event) => {
                scroll = (window.scrollY + innerHeight);
                if (scroll > page15 && number_scroll == 0) {
                    current_scroll = "25%";
                    time_end_scroll = new Date();
                }
                if (scroll > page4 + page15 && number_scroll == 0) {
                    current_scroll = "50%";
                    time_end_scroll = new Date();
                }
                if (scroll > page4 * 2 + page15 && number_scroll == 0) {
                    current_scroll = "75%";
                    time_end_scroll = new Date();
                }
                if (scroll > page4 * 3 && number_scroll == 0) {
                    current_scroll = "100%";
                    time_end_scroll = new Date();
                    number_scroll = number_scroll + 1;
                }
            });
    
            let isOnIOS = this.isOnIOS();
            let eventName = isOnIOS ? "pagehide" : "beforeunload";
            window.addEventListener(eventName, (event) => {
                this.logScroll(time_begin_scroll, time_end_scroll, current_scroll);
            });
        }
    
        logScroll(time_begin_scroll, time_end_scroll, current_scroll){
            try {
                let OPTUID = this.uuid;
                if (OPTUID) {
                    let time_out = new Date();
                    let time_on = parseInt(time_out.getTime() / 1000) - parseInt(time_begin_scroll.getTime() / 1000);
                    let url = "https://optimize.urekamedia.com/log/scroll";
                    let params = {
                        name: OPTUID,
                        url: this.href,
                        code_segment: this.code_segment,
                        screen_width: screen.width,
                        screen_height: screen.height,
                        current_scroll: current_scroll,
                        device_pixel_ratio: window.devicePixelRatio,
                        time_begin_scroll: parseInt(time_begin_scroll.getTime()),
                        time_end_scroll: parseInt(time_end_scroll.getTime()),
                        time_out: parseInt(time_out.getTime()),
                        time_on: time_on
                    }
                    this.xhttp(url, params);
                }
            } catch (error) {
                console.log(error);
            }
        }
    
        eventTriggers(){
            try {
                
            } catch (error) {
                console.log(error);
            }
        }
    
        listenerEventTriggers(uuid, conditions){
            try {
                const _this = this;
                var listButon = [];
                conditions.forEach((item, index) => {
                    let btn = document.querySelectorAll(item.value);
                    if(btn.length){
                        listButon.push(btn);
                    }
                });
                if(listButon.length){
                    var window_width = window.screen.availWidth;
                    listButon.forEach(function(item) {
                        item.forEach(function(elem) {
                            let eventName = "click"
                            if (window_width < 768) {
                                eventName = "touchstart"
                            }
                            elem.addEventListener(eventName, (event) => {
                                _this.logTriggers(uuid);
                            });
                        });
                    });
                }
            } catch (error) {
                console.log(uuid, error);
            }
        }
    
        appendHTMLCode(uuid, htmlcode){
            try {
                let currentScript = document.currentScript.parentElement;
                var pbDiv = window.document.createElement("div");
                pbDiv.setAttribute("id", 'uk-triggers-'+uuid);
                currentScript.appendChild(pbDiv);
                this.write(pbDiv, htmlcode)
            } catch (error) {
                console.log(uuid, error);
            }
        }
    
        logTriggers(uuid){
            try {
                let OPTUID = this.uuid;
                if(OPTUID){
                    let url = "https://optimize.urekamedia.com/log/trigger";
                    let params = {
                        uuid: uuid,
                        name: OPTUID,
                        code_segment: this.code_segment,
                        url: this.href,
                        referrer: this.referrer,
                    }
                    this.xhttp(url, params);
                }
            } catch (error) {
                console.log(error);
            }
        }
    
        write(element, html) {
            var wrapper = document.createElement("ins");
            wrapper.innerHTML = html;
            this.insertNode(element, wrapper);
        }
    
        insertNode(parent, obj, insert) {
            const _this = this;
            obj.childNodes.forEach(function (node, index) {
                _this.createNode(parent, node, insert);
            });
        }
    
        createNode(parent, node, insert) {
            const _this = this;
            var newNode = null;
            switch (node.nodeType) {
                case 1:
                    newNode = document.createElement(node.tagName);
                    if (node.tagName.toLowerCase() === "script") {
                        newNode.async = node.async;
                    }
                    Array.prototype.slice
                        .call(node.attributes)
                        .forEach(function (item) {
                            newNode.setAttribute(item.name, item.value);
                        });
                        _this.insertNode(newNode, node);
                    break;
                case 2:
                    break;
                case 3:
                    newNode = document.createTextNode(node.textContent);
                    break;
                case 8:
                    newNode = document.createComment(node.textContent);
                    break;
                default:
                    newNode = node;
                    break;
            }
            if (insert === "after") {
                _this.insertAfter(newNode, parent);
            } else {
                parent.appendChild(newNode);
            }
            return newNode;
        }
    
        insertAfter(n, b) {
            var a = b.nextSibling;
            try {
                a ? a.parentNode.insertBefore(n, a) : b.parentNode.appendChild(n);
            } catch (err) { }
        }
    
        xhttp(url, params, method = "GET"){
            try {
                let TIMESTAMP = new Date().getTime();
                let data = encodeURI(window.btoa(JSON.stringify(params)));
                url.includes('?') ? url : url += '?'
                let src = url + "&q=" + data + "&v=" + TIMESTAMP;
                
                    const xhttp = new XMLHttpRequest();
                    xhttp.open(method, src, true);
                    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhttp.send();
                
            } catch (error) {
                console.log(error);
            }
        }
    
        async getOPTUID(){
            if(this.uuid == ""){
                let uuid = "82169863016674";
                if(this.action === true){
                    let cenabled = this.checkCookieEnabled();
                    if(!cenabled){
                        let { cuuid, action } = await this.getCKOLD();
                        this.uuid = cuuid;
                        this.action = action;
                    }else{
                        this.uuid = uuid;
                    }
                }else{
                    this.uuid = uuid;
                }
            }
        }

        async getfingerID(){
            try {
                // Initialize the agent at application startup.
                // const _this = this;
                const FIDPromise = import('https://openfpcdn.io/fingerprintjs/v3').then(FingerprintJS => FingerprintJS.load());
                const FingerID = await FIDPromise.then(fp => fp.get()).then(result => {
                    // This is the visitor identifier:
                    let fingerID = result.visitorId || "";
                    return fingerID;
                });
                return await FingerID;
            } catch (error) {
                console.log(error)
            }
        }

        async getCKOLD(){
            let TIMESTAMP = new Date().getTime();
            let uuid = await this.getfingerID();
            let params = {
                uuid: uuid,
                ckn: "82169863016674",
            }
            let url = "https://optimize.urekamedia.com/optimize/cookies";
            let data = encodeURI(window.btoa(JSON.stringify(params)));
            let theUrl = url + "?q=" + data + "&v=" + TIMESTAMP;
            const xhttp = new XMLHttpRequest();
            xhttp.open( "GET", theUrl, false ); // false for synchronous request
            xhttp.send( null );
            let response = JSON.parse(xhttp.responseText);
            let cuuid = response.uuid || ""; 
            let action = response.action; 
            return {cuuid, action};
        }
    
        formatStrCategory(str){
            try {
                let category = str.trim().toLowerCase();
                return category;
            } catch (error) {
                console.log(error);
            }
        }
    
        isOnIOS(){
            try {
                let isIOS = navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i);
                return isIOS;
            } catch (error) {
                console.log(error);
                return false;
            }
        }
    
        getInnerHeight() {
            var height = window.innerHeight;
            return height;
        }
    
        getContentHeight() {
            var body = window.document.body;
            var html = window.document.documentElement;
            var height = Math.max(body.scrollHeight, body.offsetHeight, body.getBoundingClientRect().height, html.clientHeight, html.scrollHeight, html.offsetHeight);
            return height;
        }
    
        getSelectorConfig(){
            const selectorConfig = {"tienphong.vn":{"domain":"tienphong.vn","categorySelector":".main-cate a"},"yeugiadinh.vn":{"domain":"yeugiadinh.vn","categorySelector":".sub-cate-details a"},"tamnhin.trithuccuocsong.vn":{"domain":"tamnhin.trithuccuocsong.vn","categorySelector":".bx-breadcrumb li:nth-child(2) a"},"yummyday.vn":{"domain":"yummyday.vn","categorySelector":"#breadcrumb li:nth-child(2) a span"},"molistar.com":{"domain":"molistar.com","categorySelector":"div.bridcrumb"},"urk.localhost.com":{"domain":"thanhnien.vn","categorySelector":"a.category-page__name"},"thanhnien.vn":{"domain":"thanhnien.vn","categorySelector":"a.category-page__name","contentSelector":".detail-cmain .detail-content"},"vtv.vn":{"domain":"vtv.vn","categorySelector":"a.mt-category"},"tuoitre.vn":{"domain":"tuoitre.vn","categorySelector":"div.detail-cate a"},"phunusuckhoe.giadinhonline.vn":{"domain":"phunusuckhoe.giadinhonline.vn","categorySelector":"a.post-category"},"tapchibonbanh.com":{"domain":"tapchibonbanh.com","categorySelector":".tdb-breadcrumbs span.tdb-bred-no-url-last"},"webthethao.vn":{"domain":"webthethao.vn","categorySelector":".py-3 div:nth-child(1)"},"emdep.vn":{"domain":"emdep.vn","categorySelector":".breadcrumb"},"tapchitaichinh.vn":{"domain":"tapchitaichinh.vn","categorySelector":".breadcrumb"},"thuongtruong24h.vn":{"domain":"thuongtruong24h.vn","categorySelector":".category-name"},"khoahoc.vietjack.com":{"domain":"khoahoc.vietjack.com","categorySelector":".main-course-breadcrumb li:nth-child(3)"},"www.saostar.vn":{"domain":"www.saostar.vn","categorySelector":".jsx-bcee891bded8773f p"},"thebank.vn":{"domain":"thebank.vn","categorySelector":".breadcrumbs span"},"dantri.com.vn":{"domain":"dantri.com.vn","categorySelector":".e-magazine__maincate a, .breadcrumb-wrap.article"},"luatvietnam.vn":{"domain":"luatvietnam.vn","categorySelector":".breadcrumb a:nth-child(3)"},"lichngaytot.com":{"domain":"lichngaytot.com","categorySelector":".breadcrumb1 li:nth-child(3)"},"danviet.vn":{"domain":"danviet.vn","categorySelector":".breadcum .title-main"},"suckhoedoisong.vn":{"domain":"suckhoedoisong.vn","categorySelector":".breadcrumb .box-breadcrumb-name"},"baoquocte.vn":{"domain":"baoquocte.vn","categorySelector":".breadcrumb .menu-alias"},"thethaovanhoa.vn":{"domain":"thethaovanhoa.vn","categorySelector":"[data-role*=\"cate-name\"]"},"m.docbao.vn":{"domain":"m.docbao.vn","categorySelector":".title_box h1"},"tinmoi.vn":{"domain":"tinmoi.vn","categorySelector":".breadcrumb-item:last-child"}};
            return selectorConfig;
        }

        setCookiesNewDomain(){
            try {
                let OPTUID = this.uuid;
                if(OPTUID){
                    let TIMESTAMP = new Date().getTime();
                    let img = "https://optimize.ulinq.asia/optimize/set";
                    let params = {
                        uuid: OPTUID,
                    };
                    let q = encodeURI(window.btoa(JSON.stringify(params)));
                    let src = img + "?q=" + q + "&v=" + TIMESTAMP;
                    let currentScript = document.currentScript ? document.currentScript.parentElement : document.body;
                    var iframeOptimize = document.createElement('iframe');
                    iframeOptimize.style.width = '1px';
                    iframeOptimize.style.height = '1px';
                    iframeOptimize.style.display = 'none';
                    iframeOptimize.id = 'img-optimize-'+this.code_segment;
                    iframeOptimize.src = src;
                    currentScript.appendChild(iframeOptimize);
                }
            } catch (error) {
                console.log(error);
            }
        }

        crawlContent(categorySelector){
            try {
                let elSelector = window.document.querySelector(categorySelector);
                let content = elSelector.innerText || elSelector.textContent;
                content = content.replace(/\s+/g, ' ');
                if(content){
                    let url = "https://optimize.urekamedia.com/log/content";
                    var data = new FormData();
                    data.append('content', content);
                    data.append('code_segment', this.code_segment);
                    data.append('url', this.href);
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', url, true);
                    xhr.send(data);
                }
            } catch (error) {
                console.log(error);
            }
        }
    }

    var uk_opt = new UROPT();
    uk_opt.init();
})();
