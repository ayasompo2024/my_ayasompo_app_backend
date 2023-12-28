
<!doctype html>
<html lang="mm">
<head>
	<meta name="csrf-token" content="vPgAqDZsFhTPj3bFGwyI6PuwRI8jvPJ5RVtYtPCU">
	<meta name="app-url" content="//shop.microland.cloud/">
	<meta name="file-base-url" content="//shop.microland.cloud/public/">

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicon -->
	<link rel="icon" href="http://shop.microland.cloud/public/assets/img/placeholder.jpg">
	<title>Microland eCommerce Platform | Best eCommerce Platform</title>

	<!-- google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	<!-- aiz core css -->
	<link rel="stylesheet" href="http://shop.microland.cloud/public/assets/css/vendors.css">
    	<link rel="stylesheet" href="http://shop.microland.cloud/public/assets/css/aiz-core.css">

    <style>
        body {
            font-size: 12px;
        }
    </style>
	<script>
    	var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: 'Nothing selected',
            nothing_found: 'Nothing found',
            choose_file: 'Choose File',
            file_selected: 'File selected',
            files_selected: 'Files selected',
            add_more_files: 'Add more files',
            adding_more_files: 'Adding more files',
            drop_files_here_paste_or: 'Drop files here, paste or',
            browse: 'Browse',
            upload_complete: 'Upload complete',
            upload_paused: 'Upload paused',
            resume_upload: 'Resume upload',
            pause_upload: 'Pause upload',
            retry_upload: 'Retry upload',
            cancel_upload: 'Cancel upload',
            uploading: 'Uploading',
            processing: 'Processing',
            complete: 'Complete',
            file: 'File',
            files: 'Files',
        }
	</script>

<link rel='stylesheet' type='text/css' property='stylesheet' href='//shop.microland.cloud/_debugbar/assets/stylesheets?v=1661842240&theme=auto' data-turbolinks-eval='false' data-turbo-eval='false'><script src='//shop.microland.cloud/_debugbar/assets/javascript?v=1661842240' data-turbolinks-eval='false' data-turbo-eval='false'></script><script data-turbo-eval="false">jQuery.noConflict(true);</script>
<script> Sfdump = window.Sfdump || (function (doc) { var refStyle = doc.createElement('style'), rxEsc = /([.*+?^${}()|\[\]\/\\])/g, idRx = /\bsf-dump-\d+-ref[012]\w+\b/, keyHint = 0 <= navigator.platform.toUpperCase().indexOf('MAC') ? 'Cmd' : 'Ctrl', addEventListener = function (e, n, cb) { e.addEventListener(n, cb, false); }; refStyle.innerHTML = '.phpdebugbar pre.sf-dump .sf-dump-compact, .sf-dump-str-collapse .sf-dump-str-collapse, .sf-dump-str-expand .sf-dump-str-expand { display: none; }'; (doc.documentElement.firstElementChild || doc.documentElement.children[0]).appendChild(refStyle); refStyle = doc.createElement('style'); (doc.documentElement.firstElementChild || doc.documentElement.children[0]).appendChild(refStyle); if (!doc.addEventListener) { addEventListener = function (element, eventName, callback) { element.attachEvent('on' + eventName, function (e) { e.preventDefault = function () {e.returnValue = false;}; e.target = e.srcElement; callback(e); }); }; } function toggle(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className, arrow, newClass; if (/\bsf-dump-compact\b/.test(oldClass)) { arrow = '▼'; newClass = 'sf-dump-expanded'; } else if (/\bsf-dump-expanded\b/.test(oldClass)) { arrow = '▶'; newClass = 'sf-dump-compact'; } else { return false; } if (doc.createEvent && s.dispatchEvent) { var event = doc.createEvent('Event'); event.initEvent('sf-dump-expanded' === newClass ? 'sfbeforedumpexpand' : 'sfbeforedumpcollapse', true, false); s.dispatchEvent(event); } a.lastChild.innerHTML = arrow; s.className = s.className.replace(/\bsf-dump-(compact|expanded)\b/, newClass); if (recursive) { try { a = s.querySelectorAll('.'+oldClass); for (s = 0; s < a.length; ++s) { if (-1 == a[s].className.indexOf(newClass)) { a[s].className = newClass; a[s].previousSibling.lastChild.innerHTML = arrow; } } } catch (e) { } } return true; }; function collapse(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className; if (/\bsf-dump-expanded\b/.test(oldClass)) { toggle(a, recursive); return true; } return false; }; function expand(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className; if (/\bsf-dump-compact\b/.test(oldClass)) { toggle(a, recursive); return true; } return false; }; function collapseAll(root) { var a = root.querySelector('a.sf-dump-toggle'); if (a) { collapse(a, true); expand(a); return true; } return false; } function reveal(node) { var previous, parents = []; while ((node = node.parentNode || {}) && (previous = node.previousSibling) && 'A' === previous.tagName) { parents.push(previous); } if (0 !== parents.length) { parents.forEach(function (parent) { expand(parent); }); return true; } return false; } function highlight(root, activeNode, nodes) { resetHighlightedNodes(root); Array.from(nodes||[]).forEach(function (node) { if (!/\bsf-dump-highlight\b/.test(node.className)) { node.className = node.className + ' sf-dump-highlight'; } }); if (!/\bsf-dump-highlight-active\b/.test(activeNode.className)) { activeNode.className = activeNode.className + ' sf-dump-highlight-active'; } } function resetHighlightedNodes(root) { Array.from(root.querySelectorAll('.sf-dump-str, .sf-dump-key, .sf-dump-public, .sf-dump-protected, .sf-dump-private')).forEach(function (strNode) { strNode.className = strNode.className.replace(/\bsf-dump-highlight\b/, ''); strNode.className = strNode.className.replace(/\bsf-dump-highlight-active\b/, ''); }); } return function (root, x) { root = doc.getElementById(root); var indentRx = new RegExp('^('+(root.getAttribute('data-indent-pad') || ' ').replace(rxEsc, '\\$1')+')+', 'm'), options = {"maxDepth":1,"maxStringLength":160,"fileLinkFormat":false}, elt = root.getElementsByTagName('A'), len = elt.length, i = 0, s, h, t = []; while (i < len) t.push(elt[i++]); for (i in x) { options[i] = x[i]; } function a(e, f) { addEventListener(root, e, function (e, n) { if ('A' == e.target.tagName) { f(e.target, e); } else if ('A' == e.target.parentNode.tagName) { f(e.target.parentNode, e); } else { n = /\bsf-dump-ellipsis\b/.test(e.target.className) ? e.target.parentNode : e.target; if ((n = n.nextElementSibling) && 'A' == n.tagName) { if (!/\bsf-dump-toggle\b/.test(n.className)) { n = n.nextElementSibling || n; } f(n, e, true); } } }); }; function isCtrlKey(e) { return e.ctrlKey || e.metaKey; } function xpathString(str) { var parts = str.match(/[^'"]+|['"]/g).map(function (part) { if ("'" == part) { return '"\'"'; } if ('"' == part) { return "'\"'"; } return "'" + part + "'"; }); return "concat(" + parts.join(",") + ", '')"; } function xpathHasClass(className) { return "contains(concat(' ', normalize-space(@class), ' '), ' " + className +" ')"; } addEventListener(root, 'mouseover', function (e) { if ('' != refStyle.innerHTML) { refStyle.innerHTML = ''; } }); a('mouseover', function (a, e, c) { if (c) { e.target.style.cursor = "pointer"; } else if (a = idRx.exec(a.className)) { try { refStyle.innerHTML = '.phpdebugbar pre.sf-dump .'+a[0]+'{background-color: #B729D9; color: #FFF !important; border-radius: 2px}'; } catch (e) { } } }); a('click', function (a, e, c) { if (/\bsf-dump-toggle\b/.test(a.className)) { e.preventDefault(); if (!toggle(a, isCtrlKey(e))) { var r = doc.getElementById(a.getAttribute('href').slice(1)), s = r.previousSibling, f = r.parentNode, t = a.parentNode; t.replaceChild(r, a); f.replaceChild(a, s); t.insertBefore(s, r); f = f.firstChild.nodeValue.match(indentRx); t = t.firstChild.nodeValue.match(indentRx); if (f && t && f[0] !== t[0]) { r.innerHTML = r.innerHTML.replace(new RegExp('^'+f[0].replace(rxEsc, '\\$1'), 'mg'), t[0]); } if (/\bsf-dump-compact\b/.test(r.className)) { toggle(s, isCtrlKey(e)); } } if (c) { } else if (doc.getSelection) { try { doc.getSelection().removeAllRanges(); } catch (e) { doc.getSelection().empty(); } } else { doc.selection.empty(); } } else if (/\bsf-dump-str-toggle\b/.test(a.className)) { e.preventDefault(); e = a.parentNode.parentNode; e.className = e.className.replace(/\bsf-dump-str-(expand|collapse)\b/, a.parentNode.className); } }); elt = root.getElementsByTagName('SAMP'); len = elt.length; i = 0; while (i < len) t.push(elt[i++]); len = t.length; for (i = 0; i < len; ++i) { elt = t[i]; if ('SAMP' == elt.tagName) { a = elt.previousSibling || {}; if ('A' != a.tagName) { a = doc.createElement('A'); a.className = 'sf-dump-ref'; elt.parentNode.insertBefore(a, elt); } else { a.innerHTML += ' '; } a.title = (a.title ? a.title+'\n[' : '[')+keyHint+'+click] Expand all children'; a.innerHTML += elt.className == 'sf-dump-compact' ? '<span>▶</span>' : '<span>▼</span>'; a.className += ' sf-dump-toggle'; x = 1; if ('sf-dump' != elt.parentNode.className) { x += elt.parentNode.getAttribute('data-depth')/1; } } else if (/\bsf-dump-ref\b/.test(elt.className) && (a = elt.getAttribute('href'))) { a = a.slice(1); elt.className += ' '+a; if (/[\[{]$/.test(elt.previousSibling.nodeValue)) { a = a != elt.nextSibling.id && doc.getElementById(a); try { s = a.nextSibling; elt.appendChild(a); s.parentNode.insertBefore(a, s); if (/^[@#]/.test(elt.innerHTML)) { elt.innerHTML += ' <span>▶</span>'; } else { elt.innerHTML = '<span>▶</span>'; elt.className = 'sf-dump-ref'; } elt.className += ' sf-dump-toggle'; } catch (e) { if ('&' == elt.innerHTML.charAt(0)) { elt.innerHTML = '…'; elt.className = 'sf-dump-ref'; } } } } } if (doc.evaluate && Array.from && root.children.length > 1) { root.setAttribute('tabindex', 0); SearchState = function () { this.nodes = []; this.idx = 0; }; SearchState.prototype = { next: function () { if (this.isEmpty()) { return this.current(); } this.idx = this.idx < (this.nodes.length - 1) ? this.idx + 1 : 0; return this.current(); }, previous: function () { if (this.isEmpty()) { return this.current(); } this.idx = this.idx > 0 ? this.idx - 1 : (this.nodes.length - 1); return this.current(); }, isEmpty: function () { return 0 === this.count(); }, current: function () { if (this.isEmpty()) { return null; } return this.nodes[this.idx]; }, reset: function () { this.nodes = []; this.idx = 0; }, count: function () { return this.nodes.length; }, }; function showCurrent(state) { var currentNode = state.current(), currentRect, searchRect; if (currentNode) { reveal(currentNode); highlight(root, currentNode, state.nodes); if ('scrollIntoView' in currentNode) { currentNode.scrollIntoView(true); currentRect = currentNode.getBoundingClientRect(); searchRect = search.getBoundingClientRect(); if (currentRect.top < (searchRect.top + searchRect.height)) { window.scrollBy(0, -(searchRect.top + searchRect.height + 5)); } } } counter.textContent = (state.isEmpty() ? 0 : state.idx + 1) + ' of ' + state.count(); } var search = doc.createElement('div'); search.className = 'sf-dump-search-wrapper sf-dump-search-hidden'; search.innerHTML = ' <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0<\/span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"\/><\/svg> <\/button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"\/><\/svg> <\/button> '; root.insertBefore(search, root.firstChild); var state = new SearchState(); var searchInput = search.querySelector('.sf-dump-search-input'); var counter = search.querySelector('.sf-dump-search-count'); var searchInputTimer = 0; var previousSearchQuery = ''; addEventListener(searchInput, 'keyup', function (e) { var searchQuery = e.target.value; /* Don't perform anything if the pressed key didn't change the query */ if (searchQuery === previousSearchQuery) { return; } previousSearchQuery = searchQuery; clearTimeout(searchInputTimer); searchInputTimer = setTimeout(function () { state.reset(); collapseAll(root); resetHighlightedNodes(root); if ('' === searchQuery) { counter.textContent = '0 of 0'; return; } var classMatches = [ "sf-dump-str", "sf-dump-key", "sf-dump-public", "sf-dump-protected", "sf-dump-private", ].map(xpathHasClass).join(' or '); var xpathResult = doc.evaluate('.//span[' + classMatches + '][contains(translate(child::text(), ' + xpathString(searchQuery.toUpperCase()) + ', ' + xpathString(searchQuery.toLowerCase()) + '), ' + xpathString(searchQuery.toLowerCase()) + ')]', root, null, XPathResult.ORDERED_NODE_ITERATOR_TYPE, null); while (node = xpathResult.iterateNext()) state.nodes.push(node); showCurrent(state); }, 400); }); Array.from(search.querySelectorAll('.sf-dump-search-input-next, .sf-dump-search-input-previous')).forEach(function (btn) { addEventListener(btn, 'click', function (e) { e.preventDefault(); -1 !== e.target.className.indexOf('next') ? state.next() : state.previous(); searchInput.focus(); collapseAll(root); showCurrent(state); }) }); addEventListener(root, 'keydown', function (e) { var isSearchActive = !/\bsf-dump-search-hidden\b/.test(search.className); if ((114 === e.keyCode && !isSearchActive) || (isCtrlKey(e) && 70 === e.keyCode)) { /* F3 or CMD/CTRL + F */ if (70 === e.keyCode && document.activeElement === searchInput) { /* * If CMD/CTRL + F is hit while having focus on search input, * the user probably meant to trigger browser search instead. * Let the browser execute its behavior: */ return; } e.preventDefault(); search.className = search.className.replace(/\bsf-dump-search-hidden\b/, ''); searchInput.focus(); } else if (isSearchActive) { if (27 === e.keyCode) { /* ESC key */ search.className += ' sf-dump-search-hidden'; e.preventDefault(); resetHighlightedNodes(root); searchInput.value = ''; } else if ( (isCtrlKey(e) && 71 === e.keyCode) /* CMD/CTRL + G */ || 13 === e.keyCode /* Enter */ || 114 === e.keyCode /* F3 */ ) { e.preventDefault(); e.shiftKey ? state.previous() : state.next(); collapseAll(root); showCurrent(state); } } }); } if (0 >= options.maxStringLength) { return; } try { elt = root.querySelectorAll('.sf-dump-str'); len = elt.length; i = 0; t = []; while (i < len) t.push(elt[i++]); len = t.length; for (i = 0; i < len; ++i) { elt = t[i]; s = elt.innerText || elt.textContent; x = s.length - options.maxStringLength; if (0 < x) { h = elt.innerHTML; elt[elt.innerText ? 'innerText' : 'textContent'] = s.substring(0, options.maxStringLength); elt.className += ' sf-dump-str-collapse'; elt.innerHTML = '<span class=sf-dump-str-collapse>'+h+'<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span>'+ '<span class=sf-dump-str-expand>'+elt.innerHTML+'<a class="sf-dump-ref sf-dump-str-toggle" title="'+x+' remaining characters"> ▶</a></span>'; } } } catch (e) { } }; })(document); </script><style> .phpdebugbar pre.sf-dump { display: block; white-space: pre; padding: 5px; overflow: initial !important; } .phpdebugbar pre.sf-dump:after { content: ""; visibility: hidden; display: block; height: 0; clear: both; } .phpdebugbar pre.sf-dump span { display: inline; } .phpdebugbar pre.sf-dump a { text-decoration: none; cursor: pointer; border: 0; outline: none; color: inherit; } .phpdebugbar pre.sf-dump img { max-width: 50em; max-height: 50em; margin: .5em 0 0 0; padding: 0; background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAHUlEQVQY02O8zAABilCaiQEN0EeA8QuUcX9g3QEAAjcC5piyhyEAAAAASUVORK5CYII=) #D3D3D3; } .phpdebugbar pre.sf-dump .sf-dump-ellipsis { display: inline-block; overflow: visible; text-overflow: ellipsis; max-width: 5em; white-space: nowrap; overflow: hidden; vertical-align: top; } .phpdebugbar pre.sf-dump .sf-dump-ellipsis+.sf-dump-ellipsis { max-width: none; } .phpdebugbar pre.sf-dump code { display:inline; padding:0; background:none; } .sf-dump-public.sf-dump-highlight, .sf-dump-protected.sf-dump-highlight, .sf-dump-private.sf-dump-highlight, .sf-dump-str.sf-dump-highlight, .sf-dump-key.sf-dump-highlight { background: rgba(111, 172, 204, 0.3); border: 1px solid #7DA0B1; border-radius: 3px; } .sf-dump-public.sf-dump-highlight-active, .sf-dump-protected.sf-dump-highlight-active, .sf-dump-private.sf-dump-highlight-active, .sf-dump-str.sf-dump-highlight-active, .sf-dump-key.sf-dump-highlight-active { background: rgba(253, 175, 0, 0.4); border: 1px solid #ffa500; border-radius: 3px; } .phpdebugbar pre.sf-dump .sf-dump-search-hidden { display: none !important; } .phpdebugbar pre.sf-dump .sf-dump-search-wrapper { font-size: 0; white-space: nowrap; margin-bottom: 5px; display: flex; position: -webkit-sticky; position: sticky; top: 5px; } .phpdebugbar pre.sf-dump .sf-dump-search-wrapper > * { vertical-align: top; box-sizing: border-box; height: 21px; font-weight: normal; border-radius: 0; background: #FFF; color: #757575; border: 1px solid #BBB; } .phpdebugbar pre.sf-dump .sf-dump-search-wrapper > input.sf-dump-search-input { padding: 3px; height: 21px; font-size: 12px; border-right: none; border-top-left-radius: 3px; border-bottom-left-radius: 3px; color: #000; min-width: 15px; width: 100%; } .phpdebugbar pre.sf-dump .sf-dump-search-wrapper > .sf-dump-search-input-next, .phpdebugbar pre.sf-dump .sf-dump-search-wrapper > .sf-dump-search-input-previous { background: #F2F2F2; outline: none; border-left: none; font-size: 0; line-height: 0; } .phpdebugbar pre.sf-dump .sf-dump-search-wrapper > .sf-dump-search-input-next { border-top-right-radius: 3px; border-bottom-right-radius: 3px; } .phpdebugbar pre.sf-dump .sf-dump-search-wrapper > .sf-dump-search-input-next > svg, .phpdebugbar pre.sf-dump .sf-dump-search-wrapper > .sf-dump-search-input-previous > svg { pointer-events: none; width: 12px; height: 12px; } .phpdebugbar pre.sf-dump .sf-dump-search-wrapper > .sf-dump-search-count { display: inline-block; padding: 0 5px; margin: 0; border-left: none; line-height: 21px; font-size: 12px; }.phpdebugbar pre.sf-dump, .phpdebugbar pre.sf-dump .sf-dump-default{word-wrap: break-word; white-space: pre-wrap; word-break: normal}.phpdebugbar pre.sf-dump .sf-dump-num{font-weight:bold; color:#1299DA}.phpdebugbar pre.sf-dump .sf-dump-const{font-weight:bold}.phpdebugbar pre.sf-dump .sf-dump-str{font-weight:bold; color:#3A9B26}.phpdebugbar pre.sf-dump .sf-dump-note{color:#1299DA}.phpdebugbar pre.sf-dump .sf-dump-ref{color:#7B7B7B}.phpdebugbar pre.sf-dump .sf-dump-public{color:#000000}.phpdebugbar pre.sf-dump .sf-dump-protected{color:#000000}.phpdebugbar pre.sf-dump .sf-dump-private{color:#000000}.phpdebugbar pre.sf-dump .sf-dump-meta{color:#B729D9}.phpdebugbar pre.sf-dump .sf-dump-key{color:#3A9B26}.phpdebugbar pre.sf-dump .sf-dump-index{color:#1299DA}.phpdebugbar pre.sf-dump .sf-dump-ellipsis{color:#A0A000}.phpdebugbar pre.sf-dump .sf-dump-ns{user-select:none;}.phpdebugbar pre.sf-dump .sf-dump-ellipsis-note{color:#1299DA}</style>
</head>
<body class="">

	<div class="aiz-main-wrapper">
        <div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="http://shop.microland.cloud/admin" class="d-block text-left">
                                    <img class="mw-100" src="http://shop.microland.cloud/public/uploads/all/lW5iqMrdtkx7AuzxHOSr0McQ8AxMpHsLey3xz4ci.png" class="brand-icon" alt="Microland Ecommerce Platform">
                            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="Search in menu" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                
                
                                    <li class="aiz-side-nav-item">
                        <a href="http://shop.microland.cloud/admin" class="aiz-side-nav-link">
                            <i class="las la-home aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Dashboard</span>
                        </a>
                    </li>
                
                <!-- POS Addon-->
                
                <!-- Product -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Products</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a class="aiz-side-nav-link" href="http://shop.microland.cloud/admin/products/create">
                                        <span class="aiz-side-nav-text">Add New Product</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/products/all" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">All products</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/products/admin" class="aiz-side-nav-link " >
                                        <span class="aiz-side-nav-text">In House Products</span>
                                    </a>
                                </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/products/seller" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Seller Products</span>
                                        </a>
                                    </li>
                                                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/digitalproducts" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Digital Products</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/product-bulk-upload/index" class="aiz-side-nav-link" >
                                        <span class="aiz-side-nav-text">Bulk Import</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/product-bulk-export" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Bulk Export</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/categories" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Category</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/brands" class="aiz-side-nav-link " >
                                        <span class="aiz-side-nav-text">Brand</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/attributes" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Attribute</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/colors" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Colors</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/reviews" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Product Reviews</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                
                <!-- Auction Product -->
                
                <!-- Wholesale Product -->
                                                            <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-luggage-cart aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Wholesale Products</span>
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a class="aiz-side-nav-link" href="http://shop.microland.cloud/admin/wholesale-product/create">
                                            <span class="aiz-side-nav-text">Add New Wholesale Product</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/wholesale/all-products" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">All Wholesale Products</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/wholesale/inhouse-products" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">In House Wholesale Products</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/wholesale/seller-products" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Seller Wholesale Products</span>
                                        </a>
                                    </li>
                                                            </ul>
                        </li>
                                    
                <!-- Sale -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-money-bill aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Sales</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/all_orders" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All Orders</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/inhouse-orders" class="aiz-side-nav-link " >
                                        <span class="aiz-side-nav-text">Inhouse orders</span>
                                    </a>
                                </li>
                            
                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/seller_orders" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Seller Orders</span>
                                    </a>
                                </li>
                                                        
                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/orders_by_pickup_point" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Pick-up Point Order</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                
                <!-- Deliver Boy Addon-->
                                                            <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-truck aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Delivery Boy</span>
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/delivery-boys" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">All Delivery Boy</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/delivery-boys/create" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Add Delivery Boy</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/delivery-boys-payment-histories" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Payment Histories</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/delivery-boys-collection-histories" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Collected Histories</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/delivery-boy/cancel-request" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Cancel Request</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/delivery-boy-configuration" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Configuration</span>
                                        </a>
                                    </li>
                                                            </ul>
                        </li>
                                    
                <!-- Refund addon -->
                
                <!-- Customers -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-friends aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Customers</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/customers" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Customer list</span>
                                    </a>
                                </li>
                                                                                </ul>
                    </li>
                
                <!-- Sellers -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Sellers</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                                                        <a href="http://shop.microland.cloud/admin/sellers" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All Seller</span>
                                                                            </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/seller/payments" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Payouts</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/withdraw_requests_all" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Payout Requests</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/vendor_commission" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Seller Commission</span>
                                    </a>
                                </li>
                                                        
                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/seller_packages" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Seller Packages</span>
                                                                            </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/verification/form" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Seller Verification Form</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                
                
                <li class="aiz-side-nav-item">
                    <a href="http://shop.microland.cloud/admin/uploaded-files" class="aiz-side-nav-link ">
                        <i class="las la-folder-open aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Uploaded Files</span>
                    </a>
                </li>

                <!-- Reports -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-file-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Reports</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/in_house_sale_report" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">In House Product Sale</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/seller_sale_report" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Seller Products Sale</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/stock_report" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Products Stock</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/wish_report" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Products wishlist</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/user_search_report" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">User Searches</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/commission-log" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Commission History</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/wallet-history" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Wallet Recharge History</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                                
                <!--Blog System-->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-bullhorn aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Blog System</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/blog" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All Posts</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/blog-category" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Categories</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                
                <!-- marketing -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-bullhorn aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Marketing</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/flash_deals" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Flash deals</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/newsletter" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Newsletters</span>
                                    </a>
                                </li>
                                                                                                                    <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/subscribers" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Subscribers</span>
                                    </a>
                                </li>
                                                                                    <li class="aiz-side-nav-item">
                                <a href="http://shop.microland.cloud/admin/coupon" class="aiz-side-nav-link ">
                                    <span class="aiz-side-nav-text">Coupon</span>
                                </a>
                            </li>
                                                    </ul>
                    </li>
                
                <!-- Support -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-link aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Support</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/support_ticket" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Ticket</span>
                                                                            </a>
                                </li>
                                                        
                                                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/conversations" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Product Conversations</span>
                                                                                    <span class="badge badge-info">1</span>
                                                                            </a>
                                </li>
                                                                                </ul>
                    </li>
                
                <!-- Affiliate Addon -->
                
                <!-- Offline Payment Addon-->
                                                            <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-money-check-alt aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Offline Payment System</span>
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/manual_payment_methods" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Manual Payment Methods</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/offline-wallet-recharge-requests" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Offline Wallet Recharge</span>
                                        </a>
                                    </li>
                                                                
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="http://shop.microland.cloud/admin/offline-seller-package-payment-requests" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Offline Seller Package Payments</span>
                                                                                    </a>
                                    </li>
                                                            </ul>
                        </li>
                                    
                <!-- Paytm Addon -->
                
                <!-- Club Point Addon-->
                
                <!--OTP addon -->
                
                
                <!-- Website Setup -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link " >
                            <i class="las la-desktop aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Website Setup</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/website/header" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Header</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/website/footer?lang=mm" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Footer</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/website/pages" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Pages</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/website/appearance" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Appearance</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                
                <!-- Setup & Configurations -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Setup &amp; Configurations</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/general-setting" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">General Settings</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/activation" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Features activation</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/languages" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Languages</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/currency" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Currency</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/tax" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Vat &amp; TAX</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/pick_up_points" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Pickup point</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/smtp-settings" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">SMTP Settings</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/payment-method" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Payment Methods</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/order-configuration" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Order Configuration</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/file_system" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">File System &amp; Cache Configuration</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/social-login" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Social media Logins</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Facebook</span>
                                        <span class="aiz-side-nav-arrow"></span>
                                    </a>
                                    <ul class="aiz-side-nav-list level-3">
                                                                                    <li class="aiz-side-nav-item">
                                                <a href="http://shop.microland.cloud/admin/facebook-chat" class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Facebook Chat</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="http://shop.microland.cloud/admin/facebook-comment" class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Facebook Comment</span>
                                                </a>
                                            </li>
                                                                            </ul>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Google</span>
                                        <span class="aiz-side-nav-arrow"></span>
                                    </a>
                                    <ul class="aiz-side-nav-list level-3">
                                                                                    <li class="aiz-side-nav-item">
                                                <a href="http://shop.microland.cloud/admin/google-analytics" class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Analytics Tools</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="http://shop.microland.cloud/admin/google-recaptcha" class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Google reCAPTCHA</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="http://shop.microland.cloud/admin/google-map" class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Google Map</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="http://shop.microland.cloud/admin/google-firebase" class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Google Firebase</span>
                                                </a>
                                            </li>
                                                                            </ul>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Shipping</span>
                                        <span class="aiz-side-nav-arrow"></span>
                                    </a>
                                    <ul class="aiz-side-nav-list level-3">
                                                                                    <li class="aiz-side-nav-item">
                                                <a href="http://shop.microland.cloud/admin/shipping_configuration" class="aiz-side-nav-link ">
                                                    <span class="aiz-side-nav-text">Shipping Configuration</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="http://shop.microland.cloud/admin/countries" class="aiz-side-nav-link ">
                                                    <span class="aiz-side-nav-text">Shipping Countries</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="http://shop.microland.cloud/admin/states" class="aiz-side-nav-link ">
                                                    <span class="aiz-side-nav-text">Shipping States</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="http://shop.microland.cloud/admin/cities" class="aiz-side-nav-link ">
                                                    <span class="aiz-side-nav-text">Shipping Cities</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="http://shop.microland.cloud/admin/zones" class="aiz-side-nav-link ">
                                                    <span class="aiz-side-nav-text">Shipping Zones</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="http://shop.microland.cloud/admin/carriers" class="aiz-side-nav-link ">
                                                    <span class="aiz-side-nav-text">Shipping Carrier</span>
                                                </a>
                                            </li>
                                                                            </ul>
                                </li>
                                                    </ul>
                    </li>
                
                <!-- Staffs -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Staffs</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/staffs" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All staffs</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/roles" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Staff permissions</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                
                
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">System</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="http://shop.microland.cloud/admin/system/update" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Update</span>
                                    </a>
                                </li>
                                                                                    <li class="aiz-side-nav-item">
                                <a href="http://shop.microland.cloud/admin/system/server-status" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Server status</span>
                                </a>
                            </li>
                                                    </ul>
                    </li>
                
                <!-- Addon Manager -->
                                    <li class="aiz-side-nav-item">
                        <a href="http://shop.microland.cloud/admin/addons" class="aiz-side-nav-link ">
                            <i class="las la-wrench aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Addon Manager</span>
                        </a>
                    </li>
                            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
		<div class="aiz-content-wrapper">
            <div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
    <div class="d-flex">
        <div class="aiz-topbar-nav-toggler d-flex align-items-center justify-content-start mr-2 mr-md-3 ml-0" data-toggle="aiz-mobile-nav">
            <button class="aiz-mobile-toggler">
                <span></span>
            </button>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
            <div class="d-flex justify-content-around align-items-center align-items-stretch">
                <div class="aiz-topbar-item">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-icon btn-circle btn-light" href="http://shop.microland.cloud" target="_blank" title="Browse Website">
                            <i class="las la-globe"></i>
                        </a>
                    </div>
                </div>
            </div>
                        <div class="d-flex justify-content-around align-items-center align-items-stretch ml-3">
                <div class="aiz-topbar-item">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-soft-danger btn-sm d-flex align-items-center" href="http://shop.microland.cloud/admin/clear-cache">
                            <i class="las la-hdd fs-20"></i>
                            <span class="fw-500 ml-1 mr-0 d-none d-md-block">Clear Cache</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch">

            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon p-0 d-flex justify-content-center align-items-center">
                            <span class="d-flex align-items-center position-relative">
                                <i class="las la-bell fs-24"></i>
                                                                    <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right"></span>
                                                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg py-0">
                        <div class="p-3 bg-light border-bottom">
                            <h6 class="mb-0">Notifications</h6>
                        </div>
                        <div class="px-3 c-scrollbar-light overflow-auto " style="max-height:300px;">
                            <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20230420-09242550 has been Placed
                                                    </p>
                                                    <small class="text-muted">
                                                        April 20 2023, 9:24 am
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                            </ul>
                        </div>
                        <div class="text-center border-top">
                            <a href="http://shop.microland.cloud/admin/all-notification" class="text-reset d-block py-2">
                                View All Notifications
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
                        <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown " id="lang-change">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon">
                            <img src="http://shop.microland.cloud/public/assets/img/flags/mm.png" height="11">
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">

                                                    <li>
                                <a href="javascript:void(0)" data-flag="en" class="dropdown-item ">
                                    <img src="http://shop.microland.cloud/public/assets/img/flags/en.png" class="mr-2">
                                    <span class="language">English</span>
                                </a>
                            </li>
                                                    <li>
                                <a href="javascript:void(0)" data-flag="mm" class="dropdown-item  active ">
                                    <img src="http://shop.microland.cloud/public/assets/img/flags/mm.png" class="mr-2">
                                    <span class="language">Myanmar</span>
                                </a>
                            </li>
                                                    <li>
                                <a href="javascript:void(0)" data-flag="cn" class="dropdown-item ">
                                    <img src="http://shop.microland.cloud/public/assets/img/flags/cn.png" class="mr-2">
                                    <span class="language">China</span>
                                </a>
                            </li>
                                            </ul>
                </div>
            </div>

            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <span class="avatar avatar-sm mr-md-2">
                                <img
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/avatar-place.png';"
                                >
                            </span>
                            <span class="d-none d-md-block">
                                <span class="d-block fw-500">admin</span>
                                <span class="d-block small opacity-60">admin</span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                        <a href="http://shop.microland.cloud/admin/profile" class="dropdown-item">
                            <i class="las la-user-circle"></i>
                            <span>Profile</span>
                        </a>

                        <a href="http://shop.microland.cloud/logout" class="dropdown-item">
                            <i class="las la-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div><!-- .aiz-topbar-item -->
        </div>
    </div>
</div><!-- .aiz-topbar -->
			<div class="aiz-main-content">
				<div class="px-15px px-lg-25px">
                        <div class="">
        <div class="alert alert-danger d-flex align-items-center">
            Please Configure SMTP Setting to work all email sending functionality,
            <a class="alert-link ml-2" href="http://shop.microland.cloud/admin/smtp-settings">Configure Now</a>
        </div>
    </div>
<div class="row gutters-10">
    <div class="col-lg-6">
        <div class="row gutters-10">
            <div class="col-6">
                <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
                    <div class="px-3 pt-3">
                        <div class="opacity-50">
                            <span class="fs-12 d-block">Total</span>
                            Customer
                        </div>
                        <div class="h3 fw-700 mb-3">
                            9
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
                    <div class="px-3 pt-3">
                        <div class="opacity-50">
                            <span class="fs-12 d-block">Total</span>
                            Order
                        </div>
                        <div class="h3 fw-700 mb-3">17</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
                    <div class="px-3 pt-3">
                        <div class="opacity-50">
                            <span class="fs-12 d-block">Total</span>
                            Product category
                        </div>
                        <div class="h3 fw-700 mb-3">43</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-grad-4 text-white rounded-lg mb-4 overflow-hidden">
                    <div class="px-3 pt-3">
                        <div class="opacity-50">
                            <span class="fs-12 d-block">Total</span>
                            Product brand
                        </div>
                        <div class="h3 fw-700 mb-3">3</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="row gutters-10">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0 fs-14">Products</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="pie-1" class="w-100" height="305"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0 fs-14">Sellers</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="pie-2" class="w-100" height="305"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row gutters-10">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0 fs-14">Category wise product sale</h6>
            </div>
            <div class="card-body">
                <canvas id="graph-1" class="w-100" height="500"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0 fs-14">Category wise product stock</h6>
            </div>
            <div class="card-body">
                <canvas id="graph-2" class="w-100" height="500"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h6 class="mb-0">Top 12 Products</h6>
    </div>
    <div class="card-body">
        <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4" data-md-items="3" data-sm-items="2" data-arrows='true'>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="http://shop.microland.cloud/product/hair-spray0" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    data-src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    alt="Hair spray"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$6,000.00</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="http://shop.microland.cloud/product/hair-spray0" class="d-block text-reset">Hair spray</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="http://shop.microland.cloud/product/fresho-banana-yelakki-1-kg" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    data-src="http://shop.microland.cloud/public/uploads/all/jABwtUB6vdYc1HqbV1xkboCUJ1RyXRqByyajkOZv.jpg"
                                    alt="Fresho Banana - Yelakki, 1 kg"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$1,500.00</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="http://shop.microland.cloud/product/fresho-banana-yelakki-1-kg" class="d-block text-reset">Fresho Banana - Yelakki, 1 kg</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="http://shop.microland.cloud/product/myanmar-beer" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    data-src="http://shop.microland.cloud/public/uploads/all/Xp7SorsWA6ZUDnqP3N76OtIuMUvOZ1w0Y8o7guDW.jpg"
                                    alt="Myanmar Beer"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$3,000.00</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="http://shop.microland.cloud/product/myanmar-beer" class="d-block text-reset">Myanmar Beer</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="http://shop.microland.cloud/product/sel-pro-aHGcL" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    data-src="http://shop.microland.cloud/public/uploads/all/pZw9Su97vHmY2jvbHhuLv2EjI5m8kFLXrN316qjq.jpg"
                                    alt="Sel Pro"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$1,300.00</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="http://shop.microland.cloud/product/sel-pro-aHGcL" class="d-block text-reset">Sel Pro</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="http://shop.microland.cloud/product/yi-smart-dash-camera" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    data-src="http://shop.microland.cloud/public/uploads/all/GtAnNj9X9w79d0LqCMmWOLm3dGCeTn49N4d8sk5f.png"
                                    alt="YI Smart Dash Camera"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$80,000.00</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="http://shop.microland.cloud/product/yi-smart-dash-camera" class="d-block text-reset">YI Smart Dash Camera</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="http://shop.microland.cloud/product/girl-t-shirt-khyaitha-akwetbbwansaet" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    data-src="http://shop.microland.cloud/public/uploads/all/ngr9yIovipVK3KTpKa4JphRm9p2zPXG1bWJLjgLy.jpg"
                                    alt="Girl T Shirt ချည်သား + အကွက်bbဝမ်းဆက်"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                    <del class="fw-600 opacity-50 mr-1">$9,000.00</del>
                                                                <span class="fw-700 text-primary">$8,910.00</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="http://shop.microland.cloud/product/girl-t-shirt-khyaitha-akwetbbwansaet" class="d-block text-reset">Girl T Shirt ချည်သား + အကွက်bbဝမ်းဆက်</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="http://shop.microland.cloud/product/vivo-y93-62-full-screen4g-lte-ram-4gb" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    data-src="http://shop.microland.cloud/public/uploads/all/x1F7i1yjsVb3QVHcVAMLb5F0OmE3d1CXWwkVOBxb.jpg"
                                    alt="Vivo Y93, 6.2&#039; Full Screen,4G LTE; Ram 4GB"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                    <del class="fw-600 opacity-50 mr-1">$280,000.00</del>
                                                                <span class="fw-700 text-primary">$249,200.00</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="http://shop.microland.cloud/product/vivo-y93-62-full-screen4g-lte-ram-4gb" class="d-block text-reset">Vivo Y93, 6.2&#039; Full Screen,4G LTE; Ram 4GB</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="http://shop.microland.cloud/product/sel-pro" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    data-src="http://shop.microland.cloud/public/uploads/all/pZw9Su97vHmY2jvbHhuLv2EjI5m8kFLXrN316qjq.jpg"
                                    alt="Sel Pro"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$1,300.00</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="http://shop.microland.cloud/product/sel-pro" class="d-block text-reset">Sel Pro</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="http://shop.microland.cloud/product/kzg-original-keypad-k805model-2022-121-months-warranty" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    data-src="http://shop.microland.cloud/public/uploads/all/ukRoDI9HpuCr4HnJanSMZjSgAMU7HjrK2ZIKevhz.png"
                                    alt="KZG Original Keypad K805,Model 2022, 12+1 Months Warranty"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                    <del class="fw-600 opacity-50 mr-1">$32,000.00</del>
                                                                <span class="fw-700 text-primary">$28,800.00</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="http://shop.microland.cloud/product/kzg-original-keypad-k805model-2022-121-months-warranty" class="d-block text-reset">KZG Original Keypad K805,Model 2022, 12+1 Months Warranty</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="http://shop.microland.cloud/product/beer" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    data-src="http://shop.microland.cloud/public/uploads/all/AcTxbdDT3b4HGZS9wzmwt2yKc43vWoIwOmRXUsIP.png"
                                    alt="Beer"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$10,000.00</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="http://shop.microland.cloud/product/beer" class="d-block text-reset">Beer</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="http://shop.microland.cloud/product/stugeron-cinnarizine-25mg" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    data-src="http://shop.microland.cloud/public/uploads/all/oFvUqNyPBV9Hwt2S50rpl4ykmUrnbtlbJqpYKUFg.jpg"
                                    alt="Stugeron ( Cinnarizine 25mg)"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$3,800.00</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="http://shop.microland.cloud/product/stugeron-cinnarizine-25mg" class="d-block text-reset">Stugeron ( Cinnarizine 25mg)</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="http://shop.microland.cloud/product/macbook-2020-51305" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="http://shop.microland.cloud/public/assets/img/placeholder.jpg"
                                    data-src="http://shop.microland.cloud/public/uploads/all/8NrRjScuTFI09wi9aA1aQfjPbSNclbi1CibiDCzC.webp"
                                    alt="macbook 2020"
                                    onerror="this.onerror=null;this.src='http://shop.microland.cloud/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$2,000,000.00</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="http://shop.microland.cloud/product/macbook-2020-51305" class="d-block text-reset">macbook 2020</a>
                            </h3>
                        </div>
                    </div>
                </div>
                    </div>
    </div>
</div>


				</div>
				<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
					<p class="mb-0">&copy; Microland Ecommerce Platform v6.3.0</p>
				</div>
			</div><!-- .aiz-main-content -->
		</div><!-- .aiz-content-wrapper -->
	</div><!-- .aiz-main-wrapper -->

    

	<script src="http://shop.microland.cloud/public/assets/js/vendors.js" ></script>
	<script src="http://shop.microland.cloud/public/assets/js/aiz-core.js" ></script>

    <script type="text/javascript">
    AIZ.plugins.chart('#pie-1',{
        type: 'doughnut',
        data: {
            labels: [
                'Total published products',
                'Total sellers products',
                'Total admin products'
            ],
            datasets: [
                {
                    data: [
                        19,
                        5,
                        14
                    ],
                    backgroundColor: [
                        "#fd3995",
                        "#34bfa3",
                        "#5d78ff",
                        '#fdcb6e',
                        '#d35400',
                        '#8e44ad',
                        '#006442',
                        '#4D8FAC',
                        '#CA6924',
                        '#C91F37'
                    ]
                }
            ]
        },
        options: {
            cutoutPercentage: 70,
            legend: {
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
                position: 'bottom'
            }
        }
    });

    AIZ.plugins.chart('#pie-2',{
        type: 'doughnut',
        data: {
            labels: [
                'Total sellers',
                'Total approved sellers',
                'Total pending sellers'
            ],
            datasets: [
                {
                    data: [
                        3,
                        3,
                        0
                    ],
                    backgroundColor: [
                        "#fd3995",
                        "#34bfa3",
                        "#5d78ff",
                        '#fdcb6e',
                        '#d35400',
                        '#8e44ad',
                        '#006442',
                        '#4D8FAC',
                        '#CA6924',
                        '#C91F37'
                    ]
                }
            ]
        },
        options: {
            cutoutPercentage: 70,
            legend: {
                labels: {
                    fontFamily: 'Montserrat',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
                position: 'bottom'
            }
        }
    });
    AIZ.plugins.chart('#graph-1',{
        type: 'bar',
        data: {
            labels: [
                                'ဖက်ရှင်',
                                'Food',
                                'Electronic',
                                'TV &amp; Home Appliances',
                                'Women&#039;s Fashion',
                                'Men&#039;s Fashion',
                                'Groceries &amp; Pets',
                                'Automotive &amp; Motorbike',
                                'Home &amp; Lifestyle',
                                'Watches &amp; Accessories',
                                'Medical',
                            ],
            datasets: [{
                label: 'Number of sale',
                data: [
                    46,10,7,0,0,0,0,0,0,0,1,
                ],
                backgroundColor: [
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                    ],
                borderColor: [
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                    ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    gridLines: {
                        color: '#f2f3f8',
                        zeroLineColor: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10,
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10
                    }
                }]
            },
            legend:{
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
            }
        }
    });
    AIZ.plugins.chart('#graph-2',{
        type: 'bar',
        data: {
            labels: [
                                'ဖက်ရှင်',
                                'Food',
                                'Electronic',
                                'TV &amp; Home Appliances',
                                'Women&#039;s Fashion',
                                'Men&#039;s Fashion',
                                'Groceries &amp; Pets',
                                'Automotive &amp; Motorbike',
                                'Home &amp; Lifestyle',
                                'Watches &amp; Accessories',
                                'Medical',
                            ],
            datasets: [{
                label: 'Number of Stock',
                data: [
                    10259,20,35,0,0,0,0,0,0,0,12,
                ],
                backgroundColor: [
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                    ],
                borderColor: [
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                    ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    gridLines: {
                        color: '#f2f3f8',
                        zeroLineColor: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10,
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10
                    }
                }]
            },
            legend:{
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
            }
        }
    });
</script>

    <script type="text/javascript">
	    

        if ($('#lang-change').length > 0) {
            $('#lang-change .dropdown-menu a').each(function() {
                $(this).on('click', function(e){
                    e.preventDefault();
                    var $this = $(this);
                    var locale = $this.data('flag');
                    $.post('http://shop.microland.cloud/language',{_token:'vPgAqDZsFhTPj3bFGwyI6PuwRI8jvPJ5RVtYtPCU', locale:locale}, function(data){
                        location.reload();
                    });

                });
            });
        }
        function menuSearch(){
			var filter, item;
			filter = $("#menu-search").val().toUpperCase();
			items = $("#main-menu").find("a");
			items = items.filter(function(i,item){
				if($(item).find(".aiz-side-nav-text")[0].innerText.toUpperCase().indexOf(filter) > -1 && $(item).attr('href') !== '#'){
					return item;
				}
			});

			if(filter !== ''){
				$("#main-menu").addClass('d-none');
				$("#search-menu").html('')
				if(items.length > 0){
					for (i = 0; i < items.length; i++) {
						const text = $(items[i]).find(".aiz-side-nav-text")[0].innerText;
						const link = $(items[i]).attr('href');
						 $("#search-menu").append(`<li class="aiz-side-nav-item"><a href="${link}" class="aiz-side-nav-link"><i class="las la-ellipsis-h aiz-side-nav-icon"></i><span>${text}</span></a></li`);
					}
				}else{
					$("#search-menu").html(`<li class="aiz-side-nav-item"><span	class="text-center text-muted d-block">Nothing found</span></li>`);
				}
			}else{
				$("#main-menu").removeClass('d-none');
				$("#search-menu").html('')
			}
        }
    </script>

<script type="text/javascript">
var phpdebugbar = new PhpDebugBar.DebugBar();
phpdebugbar.addIndicator("php_version", new PhpDebugBar.DebugBar.Indicator({"icon":"code","tooltip":"PHP Version"}), "right");
phpdebugbar.addTab("messages", new PhpDebugBar.DebugBar.Tab({"icon":"list-alt","title":"Messages", "widget": new PhpDebugBar.Widgets.MessagesWidget()}));
phpdebugbar.addIndicator("time", new PhpDebugBar.DebugBar.Indicator({"icon":"clock-o","tooltip":"Request Duration"}), "right");
phpdebugbar.addTab("timeline", new PhpDebugBar.DebugBar.Tab({"icon":"tasks","title":"Timeline", "widget": new PhpDebugBar.Widgets.TimelineWidget()}));
phpdebugbar.addIndicator("memory", new PhpDebugBar.DebugBar.Indicator({"icon":"cogs","tooltip":"Memory Usage"}), "right");
phpdebugbar.addTab("exceptions", new PhpDebugBar.DebugBar.Tab({"icon":"bug","title":"Exceptions", "widget": new PhpDebugBar.Widgets.ExceptionsWidget()}));
phpdebugbar.addTab("views", new PhpDebugBar.DebugBar.Tab({"icon":"leaf","title":"Views", "widget": new PhpDebugBar.Widgets.TemplatesWidget()}));
phpdebugbar.addTab("route", new PhpDebugBar.DebugBar.Tab({"icon":"share","title":"Route", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
phpdebugbar.addIndicator("currentroute", new PhpDebugBar.DebugBar.Indicator({"icon":"share","tooltip":"Route"}), "right");
phpdebugbar.addTab("queries", new PhpDebugBar.DebugBar.Tab({"icon":"database","title":"Queries", "widget": new PhpDebugBar.Widgets.LaravelSQLQueriesWidget()}));
phpdebugbar.addTab("models", new PhpDebugBar.DebugBar.Tab({"icon":"cubes","title":"Models", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
phpdebugbar.addTab("emails", new PhpDebugBar.DebugBar.Tab({"icon":"inbox","title":"Mails", "widget": new PhpDebugBar.Widgets.MailsWidget()}));
phpdebugbar.addTab("gate", new PhpDebugBar.DebugBar.Tab({"icon":"list-alt","title":"Gate", "widget": new PhpDebugBar.Widgets.MessagesWidget()}));
phpdebugbar.addTab("session", new PhpDebugBar.DebugBar.Tab({"icon":"archive","title":"Session", "widget": new PhpDebugBar.Widgets.VariableListWidget()}));
phpdebugbar.addTab("request", new PhpDebugBar.DebugBar.Tab({"icon":"tags","title":"Request", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
phpdebugbar.setDataMap({
"php_version": ["php.version", ],
"messages": ["messages.messages", []],
"messages:badge": ["messages.count", null],
"time": ["time.duration_str", '0ms'],
"timeline": ["time", {}],
"memory": ["memory.peak_usage_str", '0B'],
"exceptions": ["exceptions.exceptions", []],
"exceptions:badge": ["exceptions.count", null],
"views": ["views", []],
"views:badge": ["views.nb_templates", 0],
"route": ["route", {}],
"currentroute": ["route.uri", ],
"queries": ["queries", []],
"queries:badge": ["queries.nb_statements", 0],
"models": ["models.data", {}],
"models:badge": ["models.count", 0],
"emails": ["swiftmailer_mails.mails", []],
"emails:badge": ["swiftmailer_mails.count", null],
"gate": ["gate.messages", []],
"gate:badge": ["gate.count", null],
"session": ["session", {}],
"request": ["request", {}]
});
phpdebugbar.restoreState();
phpdebugbar.ajaxHandler = new PhpDebugBar.AjaxHandler(phpdebugbar, undefined, true);
phpdebugbar.ajaxHandler.bindToFetch();
phpdebugbar.ajaxHandler.bindToXHR();
phpdebugbar.setOpenHandler(new PhpDebugBar.OpenHandler({"url":"http:\/\/shop.microland.cloud\/_debugbar\/open"}));
phpdebugbar.addDataSet({"__meta":{"id":"Xa2abd0328a23d5277a88feaf7a627c50","datetime":"2023-09-28 10:43:59","utime":1695874439.870453,"method":"GET","uri":"\/admin","ip":"69.160.8.34"},"php":{"version":"7.4.33","interface":"fpm-fcgi"},"messages":{"count":0,"messages":[]},"time":{"start":1695874438.380433,"end":1695874439.8705,"duration":1.4900670051574707,"duration_str":"1.49s","measures":[{"label":"Booting","start":1695874438.380433,"relative_start":0,"end":1695874438.800521,"relative_end":1695874438.800521,"duration":0.4200878143310547,"duration_str":"420ms","params":[],"collector":null},{"label":"Application","start":1695874438.8051,"relative_start":0.4246668815612793,"end":1695874439.870503,"relative_end":2.86102294921875e-6,"duration":1.0654029846191406,"duration_str":"1.07s","params":[],"collector":null}]},"memory":{"peak_usage":28271760,"peak_usage_str":"27MB"},"exceptions":{"count":0,"exceptions":[]},"views":{"nb_templates":4,"templates":[{"name":"backend.dashboard (resources\/views\/backend\/dashboard.blade.php)","param_count":3,"params":["root_categories","cached_graph_data","categories"],"type":"blade"},{"name":"backend.layouts.app (resources\/views\/backend\/layouts\/app.blade.php)","param_count":11,"params":["__env","app","errors","root_categories","cached_graph_data","categories","__currentLoopData","product","key","loop","category"],"type":"blade"},{"name":"backend.inc.admin_sidenav (resources\/views\/backend\/inc\/admin_sidenav.blade.php)","param_count":11,"params":["__env","app","errors","root_categories","cached_graph_data","categories","__currentLoopData","product","key","loop","category"],"type":"blade"},{"name":"backend.inc.admin_nav (resources\/views\/backend\/inc\/admin_nav.blade.php)","param_count":11,"params":["__env","app","errors","root_categories","cached_graph_data","categories","__currentLoopData","product","key","loop","category"],"type":"blade"}]},"route":{"uri":"GET admin","middleware":"web, auth, admin","controller":"App\\Http\\Controllers\\AdminController@admin_dashboard","namespace":null,"prefix":"","where":[],"as":"admin.dashboard","file":"<a href=\"phpstorm:\/\/open?file=\/var\/www\/vhosts\/microland.cloud\/shop.taidictionary.com\/app\/Http\/Controllers\/AdminController.php&line=19\">app\/Http\/Controllers\/AdminController.php:19-51<\/a>"},"queries":{"nb_statements":42,"nb_failed_statements":0,"accumulated_duration":0.040859999999999994,"accumulated_duration_str":"40.86ms","statements":[{"sql":"select * from `users` where `id` = 9 limit 1","type":"query","params":[],"bindings":["9"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Auth\/EloquentUserProvider.php","line":53},{"index":16,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Auth\/SessionGuard.php","line":148},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Auth\/GuardHelpers.php","line":60},{"index":18,"namespace":"middleware","name":"auth","line":63},{"index":19,"namespace":"middleware","name":"auth","line":42}],"duration":0.00428,"duration_str":"4.28ms","stmt_id":"\/vendor\/laravel\/framework\/src\/Illuminate\/Auth\/EloquentUserProvider.php:53","connection":"microland_shop","start_percent":0,"width_percent":10.475},{"sql":"select * from `categories` where `level` = 0","type":"query","params":[],"bindings":["0"],"hints":null,"show_copy":false,"backtrace":[{"index":14,"namespace":null,"name":"\/app\/Http\/Controllers\/AdminController.php","line":22},{"index":15,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php","line":54},{"index":16,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php","line":45},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php","line":262},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php","line":205}],"duration":0.00074,"duration_str":"740\u03bcs","stmt_id":"\/app\/Http\/Controllers\/AdminController.php:22","connection":"microland_shop","start_percent":10.475,"width_percent":1.811},{"sql":"select * from `category_translations` where `category_translations`.`category_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 42)","type":"query","params":[],"bindings":[],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Controllers\/AdminController.php","line":22},{"index":20,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php","line":54},{"index":21,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php","line":45},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php","line":262},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php","line":205}],"duration":0.00065,"duration_str":"650\u03bcs","stmt_id":"\/app\/Http\/Controllers\/AdminController.php:22","connection":"microland_shop","start_percent":12.286,"width_percent":1.591},{"sql":"select * from `categories`","type":"query","params":[],"bindings":[],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":null,"name":"\/app\/Http\/Controllers\/AdminController.php","line":23},{"index":16,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php","line":54},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php","line":45},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php","line":262},{"index":19,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php","line":205}],"duration":0.00066,"duration_str":"660\u03bcs","stmt_id":"\/app\/Http\/Controllers\/AdminController.php:23","connection":"microland_shop","start_percent":13.877,"width_percent":1.615},{"sql":"select * from `category_translations` where `category_translations`.`category_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43)","type":"query","params":[],"bindings":[],"hints":null,"show_copy":false,"backtrace":[{"index":20,"namespace":null,"name":"\/app\/Http\/Controllers\/AdminController.php","line":23},{"index":21,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php","line":54},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php","line":45},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php","line":262},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php","line":205}],"duration":0.00066,"duration_str":"660\u03bcs","stmt_id":"\/app\/Http\/Controllers\/AdminController.php:23","connection":"microland_shop","start_percent":15.492,"width_percent":1.615},{"sql":"select `permissions`.*, `model_has_permissions`.`model_id` as `pivot_model_id`, `model_has_permissions`.`permission_id` as `pivot_permission_id`, `model_has_permissions`.`model_type` as `pivot_model_type` from `permissions` inner join `model_has_permissions` on `permissions`.`id` = `model_has_permissions`.`permission_id` where `model_has_permissions`.`model_id` = 9 and `model_has_permissions`.`model_type` = 'App\\Models\\User'","type":"query","params":[],"bindings":["9","App\\Models\\User"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/vendor\/spatie\/laravel-permission\/src\/Traits\/HasPermissions.php","line":288},{"index":20,"namespace":null,"name":"\/vendor\/spatie\/laravel-permission\/src\/Traits\/HasPermissions.php","line":152},{"index":21,"namespace":null,"name":"\/vendor\/spatie\/laravel-permission\/src\/Traits\/HasPermissions.php","line":205},{"index":22,"namespace":null,"name":"\/vendor\/spatie\/laravel-permission\/src\/PermissionRegistrar.php","line":141},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Auth\/Access\/Gate.php","line":554}],"duration":0.00099,"duration_str":"990\u03bcs","stmt_id":"\/vendor\/spatie\/laravel-permission\/src\/Traits\/HasPermissions.php:288","connection":"microland_shop","start_percent":17.107,"width_percent":2.423},{"sql":"select `roles`.*, `model_has_roles`.`model_id` as `pivot_model_id`, `model_has_roles`.`role_id` as `pivot_role_id`, `model_has_roles`.`model_type` as `pivot_model_type` from `roles` inner join `model_has_roles` on `roles`.`id` = `model_has_roles`.`role_id` where `model_has_roles`.`model_id` = 9 and `model_has_roles`.`model_type` = 'App\\Models\\User'","type":"query","params":[],"bindings":["9","App\\Models\\User"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/vendor\/spatie\/laravel-permission\/src\/Traits\/HasRoles.php","line":225},{"index":20,"namespace":null,"name":"\/vendor\/spatie\/laravel-permission\/src\/Traits\/HasPermissions.php","line":261},{"index":21,"namespace":null,"name":"\/vendor\/spatie\/laravel-permission\/src\/Traits\/HasPermissions.php","line":152},{"index":22,"namespace":null,"name":"\/vendor\/spatie\/laravel-permission\/src\/Traits\/HasPermissions.php","line":205},{"index":23,"namespace":null,"name":"\/vendor\/spatie\/laravel-permission\/src\/PermissionRegistrar.php","line":141}],"duration":0.0007099999999999999,"duration_str":"710\u03bcs","stmt_id":"\/vendor\/spatie\/laravel-permission\/src\/Traits\/HasRoles.php:225","connection":"microland_shop","start_percent":19.53,"width_percent":1.738},{"sql":"select count(*) as aggregate from `users` where `user_type` = 'customer' and `email_verified_at` is not null","type":"query","params":[],"bindings":["customer"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":25},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":20,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.0011899999999999999,"duration_str":"1.19ms","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:25","connection":"microland_shop","start_percent":21.268,"width_percent":2.912},{"sql":"select count(*) as aggregate from `orders`","type":"query","params":[],"bindings":[],"hints":null,"show_copy":false,"backtrace":[{"index":18,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":42},{"index":20,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":21,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":23,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00054,"duration_str":"540\u03bcs","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:42","connection":"microland_shop","start_percent":24.18,"width_percent":1.322},{"sql":"select count(*) as aggregate from `categories`","type":"query","params":[],"bindings":[],"hints":null,"show_copy":false,"backtrace":[{"index":18,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":57},{"index":20,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":21,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":23,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00075,"duration_str":"750\u03bcs","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:57","connection":"microland_shop","start_percent":25.502,"width_percent":1.836},{"sql":"select count(*) as aggregate from `brands`","type":"query","params":[],"bindings":[],"hints":null,"show_copy":false,"backtrace":[{"index":18,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":72},{"index":20,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":21,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":23,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00045,"duration_str":"450\u03bcs","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:72","connection":"microland_shop","start_percent":27.337,"width_percent":1.101},{"sql":"select * from `products` where `published` = 1 and `approved` = '1' and `published` = '1' and `auction_product` = 0 and (`added_by` = 'admin' or (`user_id` in (3, 13, 20))) order by `num_of_sale` desc limit 12","type":"query","params":[],"bindings":["1","1","1","0","admin","3","13","20"],"hints":null,"show_copy":false,"backtrace":[{"index":14,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":137},{"index":16,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":19,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00212,"duration_str":"2.12ms","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:137","connection":"microland_shop","start_percent":28.439,"width_percent":5.188},{"sql":"select * from `product_translations` where `product_translations`.`product_id` in (2, 6, 7, 8, 10, 11, 12, 13, 15, 16, 17, 18)","type":"query","params":[],"bindings":[],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":137},{"index":21,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":24,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.0006,"duration_str":"600\u03bcs","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:137","connection":"microland_shop","start_percent":33.627,"width_percent":1.468},{"sql":"select * from `product_taxes` where `product_taxes`.`product_id` in (2, 6, 7, 8, 10, 11, 12, 13, 15, 16, 17, 18)","type":"query","params":[],"bindings":[],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":137},{"index":21,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":24,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00087,"duration_str":"870\u03bcs","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:137","connection":"microland_shop","start_percent":35.095,"width_percent":2.129},{"sql":"select * from `uploads` where `uploads`.`id` is null and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":[],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.0006,"duration_str":"600\u03bcs","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":37.225,"width_percent":1.468},{"sql":"select * from `uploads` where `uploads`.`id` = '26' and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":["26"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00086,"duration_str":"860\u03bcs","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":38.693,"width_percent":2.105},{"sql":"select * from `uploads` where `uploads`.`id` = '33' and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":["33"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00095,"duration_str":"950\u03bcs","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":40.798,"width_percent":2.325},{"sql":"select * from `uploads` where `uploads`.`id` = '32' and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":["32"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00138,"duration_str":"1.38ms","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":43.123,"width_percent":3.377},{"sql":"select * from `uploads` where `uploads`.`id` = '17' and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":["17"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00354,"duration_str":"3.54ms","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":46.5,"width_percent":8.664},{"sql":"select * from `uploads` where `uploads`.`id` = '22' and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":["22"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00061,"duration_str":"610\u03bcs","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":55.164,"width_percent":1.493},{"sql":"select * from `uploads` where `uploads`.`id` = '23' and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":["23"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00122,"duration_str":"1.22ms","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":56.657,"width_percent":2.986},{"sql":"select * from `uploads` where `uploads`.`id` = '32' and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":["32"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00063,"duration_str":"630\u03bcs","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":59.643,"width_percent":1.542},{"sql":"select * from `uploads` where `uploads`.`id` = '24' and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":["24"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00117,"duration_str":"1.17ms","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":61.185,"width_percent":2.863},{"sql":"select * from `uploads` where `uploads`.`id` = '16' and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":["16"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00078,"duration_str":"780\u03bcs","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":64.048,"width_percent":1.909},{"sql":"select * from `uploads` where `uploads`.`id` = '38' and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":["38"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.0008,"duration_str":"800\u03bcs","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":65.957,"width_percent":1.958},{"sql":"select * from `uploads` where `uploads`.`id` = '43' and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":["43"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.0008100000000000001,"duration_str":"810\u03bcs","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":67.915,"width_percent":1.982},{"sql":"select count(*) as aggregate from `products` where `published` = 1","type":"query","params":[],"bindings":["1"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":189},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":20,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00093,"duration_str":"930\u03bcs","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:189","connection":"microland_shop","start_percent":69.897,"width_percent":2.276},{"sql":"select count(*) as aggregate from `products` where `published` = 1 and `added_by` = 'seller'","type":"query","params":[],"bindings":["1","seller"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":190},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":20,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.0005,"duration_str":"500\u03bcs","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:190","connection":"microland_shop","start_percent":72.173,"width_percent":1.224},{"sql":"select count(*) as aggregate from `products` where `published` = 1 and `added_by` = 'admin'","type":"query","params":[],"bindings":["1","admin"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":191},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":20,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00047,"duration_str":"470\u03bcs","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:191","connection":"microland_shop","start_percent":73.397,"width_percent":1.15},{"sql":"select count(*) as aggregate from `shops`","type":"query","params":[],"bindings":[],"hints":null,"show_copy":false,"backtrace":[{"index":18,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":236},{"index":20,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":21,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":23,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.0006,"duration_str":"600\u03bcs","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:236","connection":"microland_shop","start_percent":74.547,"width_percent":1.468},{"sql":"select count(*) as aggregate from `shops` where `verification_status` = 1","type":"query","params":[],"bindings":["1"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":237},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":20,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00074,"duration_str":"740\u03bcs","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:237","connection":"microland_shop","start_percent":76.016,"width_percent":1.811},{"sql":"select count(*) as aggregate from `shops` where `verification_status` = 0","type":"query","params":[],"bindings":["0"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":"view","name":"19b18e1a3ac807eb143d9da97c124babadb2522d","line":238},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":20,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00041999999999999996,"duration_str":"420\u03bcs","stmt_id":"view::19b18e1a3ac807eb143d9da97c124babadb2522d:238","connection":"microland_shop","start_percent":77.827,"width_percent":1.028},{"sql":"select * from `languages` where `code` = 'mm' limit 1","type":"query","params":[],"bindings":["mm"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":"view","name":"d1b7ff2699f7d194108f2dfd7cc1089cf546be0b","line":2},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":20,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00079,"duration_str":"790\u03bcs","stmt_id":"view::d1b7ff2699f7d194108f2dfd7cc1089cf546be0b:2","connection":"microland_shop","start_percent":78.855,"width_percent":1.933},{"sql":"select * from `uploads` where `uploads`.`id` is null and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":[],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00064,"duration_str":"640\u03bcs","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":80.788,"width_percent":1.566},{"sql":"select * from `languages` where `code` = 'mm' limit 1","type":"query","params":[],"bindings":["mm"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":"view","name":"d1b7ff2699f7d194108f2dfd7cc1089cf546be0b","line":25},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":20,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00078,"duration_str":"780\u03bcs","stmt_id":"view::d1b7ff2699f7d194108f2dfd7cc1089cf546be0b:25","connection":"microland_shop","start_percent":82.354,"width_percent":1.909},{"sql":"select * from `uploads` where `uploads`.`id` = '4' and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":["4"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00107,"duration_str":"1.07ms","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":84.263,"width_percent":2.619},{"sql":"select count(*) as aggregate from `shops` where `verification_status` = 0 and `verification_info` is not null","type":"query","params":[],"bindings":["0"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":"view","name":"5e543fa3d3d03d8287f64466e402bd6c597ad058","line":458},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":20,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00076,"duration_str":"760\u03bcs","stmt_id":"view::5e543fa3d3d03d8287f64466e402bd6c597ad058:458","connection":"microland_shop","start_percent":86.882,"width_percent":1.86},{"sql":"select count(*) as aggregate from `tickets` where `viewed` = 0","type":"query","params":[],"bindings":["0"],"hints":null,"show_copy":false,"backtrace":[{"index":14,"namespace":"view","name":"5e543fa3d3d03d8287f64466e402bd6c597ad058","line":671},{"index":16,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":19,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00136,"duration_str":"1.36ms","stmt_id":"view::5e543fa3d3d03d8287f64466e402bd6c597ad058:671","connection":"microland_shop","start_percent":88.742,"width_percent":3.328},{"sql":"select * from `conversations` where `receiver_id` = 9 and `receiver_viewed` = '1'","type":"query","params":[],"bindings":["9","1"],"hints":null,"show_copy":false,"backtrace":[{"index":14,"namespace":"view","name":"5e543fa3d3d03d8287f64466e402bd6c597ad058","line":683},{"index":16,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":19,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00079,"duration_str":"790\u03bcs","stmt_id":"view::5e543fa3d3d03d8287f64466e402bd6c597ad058:683","connection":"microland_shop","start_percent":92.07,"width_percent":1.933},{"sql":"select * from `notifications` where `notifications`.`notifiable_type` = 'App\\Models\\User' and `notifications`.`notifiable_id` = 9 and `notifications`.`notifiable_id` is not null and `read_at` is null order by `created_at` desc","type":"query","params":[],"bindings":["App\\Models\\User","9"],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":"view","name":"091d7ad2b099b7f70a7c295a4b1bf52764ac64ba","line":50},{"index":21,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":24,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00135,"duration_str":"1.35ms","stmt_id":"view::091d7ad2b099b7f70a7c295a4b1bf52764ac64ba:50","connection":"microland_shop","start_percent":94.004,"width_percent":3.304},{"sql":"select * from `languages` where `status` = 1","type":"query","params":[],"bindings":["1"],"hints":null,"show_copy":false,"backtrace":[{"index":14,"namespace":"view","name":"091d7ad2b099b7f70a7c295a4b1bf52764ac64ba","line":117},{"index":16,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":17,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":18,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":19,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.0005200000000000001,"duration_str":"520\u03bcs","stmt_id":"view::091d7ad2b099b7f70a7c295a4b1bf52764ac64ba:117","connection":"microland_shop","start_percent":97.308,"width_percent":1.273},{"sql":"select * from `uploads` where `uploads`.`id` is null and `uploads`.`deleted_at` is null limit 1","type":"query","params":[],"bindings":[],"hints":null,"show_copy":false,"backtrace":[{"index":19,"namespace":null,"name":"\/app\/Http\/Helpers.php","line":950},{"index":22,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php","line":108},{"index":23,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php","line":58},{"index":24,"namespace":null,"name":"\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php","line":61},{"index":25,"namespace":null,"name":"\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php","line":37}],"duration":0.00058,"duration_str":"580\u03bcs","stmt_id":"\/app\/Http\/Helpers.php:950","connection":"microland_shop","start_percent":98.581,"width_percent":1.419}]},"models":{"data":{"Illuminate\\Notifications\\DatabaseNotification":1,"App\\Models\\Conversation":1,"App\\Models\\Language":5,"App\\Models\\Upload":12,"App\\Models\\ProductTax":11,"App\\Models\\ProductTranslation":10,"App\\Models\\Product":12,"Spatie\\Permission\\Models\\Permission":211,"Spatie\\Permission\\Models\\Role":3,"App\\Models\\CategoryTranslation":58,"App\\Models\\Category":54,"App\\Models\\User":1},"count":379},"swiftmailer_mails":{"count":0,"mails":[]},"gate":{"count":104,"messages":[{"message":"[ability => smtp_settings, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1725633440 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"13 characters\">smtp_settings<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1725633440\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874438.998363},{"message":"[ability => admin_dashboard, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1213761130 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">admin_dashboard<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1213761130\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.00453},{"message":"[ability => admin_dashboard, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-593148169 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">admin_dashboard<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-593148169\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.559157},{"message":"[ability => add_new_product, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-680337111 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">add_new_product<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-680337111\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.562141},{"message":"[ability => add_new_product, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-711354626 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">add_new_product<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-711354626\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.564077},{"message":"[ability => show_all_products, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-260661302 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"17 characters\">show_all_products<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-260661302\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.565943},{"message":"[ability => show_in_house_products, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-712338321 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"22 characters\">show_in_house_products<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-712338321\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.567872},{"message":"[ability => show_seller_products, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1449936171 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"20 characters\">show_seller_products<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1449936171\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.571945},{"message":"[ability => show_digital_products, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-608901539 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"21 characters\">show_digital_products<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-608901539\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.573898},{"message":"[ability => product_bulk_import, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-749362610 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"19 characters\">product_bulk_import<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-749362610\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.575728},{"message":"[ability => product_bulk_export, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1647953544 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"19 characters\">product_bulk_export<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1647953544\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.577659},{"message":"[\n  ability => view_product_categories,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-1786466156 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"23 characters\">view_product_categories<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1786466156\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.579654},{"message":"[ability => view_all_brands, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1995053815 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">view_all_brands<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1995053815\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.582232},{"message":"[\n  ability => view_product_attributes,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-1079085773 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"23 characters\">view_product_attributes<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1079085773\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.585445},{"message":"[ability => view_colors, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-462003930 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"11 characters\">view_colors<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-462003930\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.587957},{"message":"[ability => view_product_reviews, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1712543753 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"20 characters\">view_product_reviews<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1712543753\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.590001},{"message":"[ability => add_wholesale_product, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-166691080 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"21 characters\">add_wholesale_product<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-166691080\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.593246},{"message":"[ability => add_wholesale_product, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1573797389 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"21 characters\">add_wholesale_product<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1573797389\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.595445},{"message":"[\n  ability => view_all_wholesale_products,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-261124013 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"27 characters\">view_all_wholesale_products<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-261124013\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.59763},{"message":"[\n  ability => view_inhouse_wholesale_products,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-1808635909 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"31 characters\">view_inhouse_wholesale_products<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1808635909\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.599898},{"message":"[\n  ability => view_sellers_wholesale_products,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-1712576421 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"31 characters\">view_sellers_wholesale_products<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1712576421\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.602198},{"message":"[ability => view_all_orders, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1196294064 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">view_all_orders<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1196294064\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.604153},{"message":"[ability => view_all_orders, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-391191736 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">view_all_orders<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-391191736\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.606018},{"message":"[ability => view_inhouse_orders, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1144637094 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"19 characters\">view_inhouse_orders<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1144637094\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.608038},{"message":"[ability => view_seller_orders, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-925402440 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"18 characters\">view_seller_orders<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-925402440\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.610107},{"message":"[\n  ability => view_pickup_point_orders,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-856470323 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"24 characters\">view_pickup_point_orders<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-856470323\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.612125},{"message":"[ability => view_all_delivery_boy, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-918793909 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"21 characters\">view_all_delivery_boy<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-918793909\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.614962},{"message":"[ability => view_all_delivery_boy, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-2106932145 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"21 characters\">view_all_delivery_boy<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-2106932145\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.617409},{"message":"[ability => add_delivery_boy, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-948628158 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"16 characters\">add_delivery_boy<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-948628158\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.619692},{"message":"[\n  ability => delivery_boy_payment_history,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-1109744832 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"28 characters\">delivery_boy_payment_history<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1109744832\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.621952},{"message":"[\n  ability => collected_histories_from_delivery_boy,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-1364428501 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"37 characters\">collected_histories_from_delivery_boy<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1364428501\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.62418},{"message":"[\n  ability => order_cancle_request_by_delivery_boy,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-337111004 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"36 characters\">order_cancle_request_by_delivery_boy<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-337111004\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.626351},{"message":"[\n  ability => delivery_boy_configuration,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-2125273609 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"26 characters\">delivery_boy_configuration<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-2125273609\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.628538},{"message":"[ability => view_all_customers, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-506789972 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"18 characters\">view_all_customers<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-506789972\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.630984},{"message":"[ability => view_all_customers, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-738229465 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"18 characters\">view_all_customers<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-738229465\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.632905},{"message":"[ability => view_all_seller, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1396438684 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">view_all_seller<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1396438684\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.637172},{"message":"[ability => view_all_seller, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-292490323 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">view_all_seller<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-292490323\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.639229},{"message":"[ability => seller_payment_history, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-2065971901 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"22 characters\">seller_payment_history<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-2065971901\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.645593},{"message":"[\n  ability => view_seller_payout_requests,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-2122089728 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"27 characters\">view_seller_payout_requests<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-2122089728\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.647624},{"message":"[\n  ability => seller_commission_configuration,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-974292980 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"31 characters\">seller_commission_configuration<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-974292980\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.649642},{"message":"[ability => seller_subscription, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-615477225 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"19 characters\">seller_subscription<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-615477225\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.652356},{"message":"[\n  ability => seller_verification_form_configuration,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-236957224 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"38 characters\">seller_verification_form_configuration<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-236957224\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.654387},{"message":"[\n  ability => in_house_product_sale_report,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-532145289 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"28 characters\">in_house_product_sale_report<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-532145289\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.658041},{"message":"[\n  ability => in_house_product_sale_report,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-213183088 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"28 characters\">in_house_product_sale_report<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-213183088\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.659984},{"message":"[\n  ability => seller_products_sale_report,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-284100705 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"27 characters\">seller_products_sale_report<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-284100705\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.662206},{"message":"[ability => products_stock_report, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-677236657 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"21 characters\">products_stock_report<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-677236657\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.664193},{"message":"[\n  ability => product_wishlist_report,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-1767553297 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"23 characters\">product_wishlist_report<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1767553297\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.666173},{"message":"[ability => user_search_report, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1972788614 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"18 characters\">user_search_report<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1972788614\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.668213},{"message":"[\n  ability => commission_history_report,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-311061576 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"25 characters\">commission_history_report<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-311061576\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.670333},{"message":"[\n  ability => wallet_transaction_report,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-1398226996 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"25 characters\">wallet_transaction_report<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1398226996\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.672303},{"message":"[ability => view_blogs, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-2044272093 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">view_blogs<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-2044272093\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.674362},{"message":"[ability => view_blogs, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-451653055 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">view_blogs<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-451653055\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.676313},{"message":"[ability => view_blog_categories, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1140117305 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"20 characters\">view_blog_categories<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1140117305\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.678427},{"message":"[ability => view_all_flash_deals, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-2106370290 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"20 characters\">view_all_flash_deals<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-2106370290\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.680451},{"message":"[ability => view_all_flash_deals, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-316079326 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"20 characters\">view_all_flash_deals<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-316079326\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.682484},{"message":"[ability => send_newsletter, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1331048505 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">send_newsletter<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1331048505\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.685603},{"message":"[ability => view_all_subscribers, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1090922678 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"20 characters\">view_all_subscribers<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1090922678\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.688427},{"message":"[ability => view_all_coupons, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-48646470 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"16 characters\">view_all_coupons<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-48646470\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.693029},{"message":"[\n  ability => view_all_support_tickets,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-455028767 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"24 characters\">view_all_support_tickets<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-455028767\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.695179},{"message":"[\n  ability => view_all_support_tickets,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-538528445 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"24 characters\">view_all_support_tickets<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-538528445\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.697485},{"message":"[\n  ability => view_all_product_queries,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-2040289435 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"24 characters\">view_all_product_queries<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-2040289435\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.710549},{"message":"[\n  ability => view_all_manual_payment_methods,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-1307984429 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"31 characters\">view_all_manual_payment_methods<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1307984429\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.723303},{"message":"[\n  ability => view_all_manual_payment_methods,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-2064119991 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"31 characters\">view_all_manual_payment_methods<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-2064119991\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.725931},{"message":"[\n  ability => view_all_offline_wallet_recharges,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-372326465 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"33 characters\">view_all_offline_wallet_recharges<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-372326465\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.728202},{"message":"[\n  ability => view_all_offline_seller_package_payments,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-785442006 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">view_all_offline_seller_package_payments<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-785442006\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.733286},{"message":"[ability => header_setup, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1827499338 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"12 characters\">header_setup<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1827499338\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.73727},{"message":"[ability => header_setup, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1063114457 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"12 characters\">header_setup<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1063114457\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.7393},{"message":"[ability => footer_setup, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1939332378 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"12 characters\">footer_setup<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1939332378\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.741345},{"message":"[ability => view_all_website_pages, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1914343685 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"22 characters\">view_all_website_pages<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1914343685\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.743428},{"message":"[ability => website_appearance, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-615476395 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"18 characters\">website_appearance<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-615476395\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.745657},{"message":"[ability => general_settings, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-396233239 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"16 characters\">general_settings<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-396233239\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.747733},{"message":"[ability => general_settings, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-2383851 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"16 characters\">general_settings<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-2383851\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.749935},{"message":"[ability => features_activation, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1097500173 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"19 characters\">features_activation<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1097500173\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.752133},{"message":"[ability => language_setup, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-255983509 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"14 characters\">language_setup<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-255983509\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.75426},{"message":"[ability => currency_setup, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1455421570 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"14 characters\">currency_setup<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1455421570\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.756355},{"message":"[ability => vat_&_tax_setup, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1889676492 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">vat_&amp;_tax_setup<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1889676492\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.758446},{"message":"[ability => pickup_point_setup, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1444711616 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"18 characters\">pickup_point_setup<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1444711616\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.760546},{"message":"[ability => smtp_settings, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-155293472 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"13 characters\">smtp_settings<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-155293472\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.762685},{"message":"[\n  ability => payment_methods_configurations,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-2021958278 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"30 characters\">payment_methods_configurations<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-2021958278\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.764737},{"message":"[ability => order_configuration, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-500421394 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"19 characters\">order_configuration<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-500421394\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.766834},{"message":"[\n  ability => file_system_&_cache_configuration,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-462599141 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"33 characters\">file_system_&amp;_cache_configuration<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-462599141\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.768947},{"message":"[ability => social_media_logins, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-853584938 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"19 characters\">social_media_logins<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-853584938\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.771087},{"message":"[ability => facebook_chat, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1836438710 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"13 characters\">facebook_chat<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1836438710\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.773292},{"message":"[ability => facebook_chat, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1444980466 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"13 characters\">facebook_chat<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1444980466\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.775441},{"message":"[ability => facebook_comment, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-80941679 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"16 characters\">facebook_comment<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-80941679\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.777586},{"message":"[\n  ability => analytics_tools_configuration,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-1275883159 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"29 characters\">analytics_tools_configuration<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1275883159\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.779709},{"message":"[\n  ability => analytics_tools_configuration,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-1247393315 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"29 characters\">analytics_tools_configuration<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1247393315\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.781902},{"message":"[\n  ability => google_recaptcha_configuration,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-1610439195 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"30 characters\">google_recaptcha_configuration<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1610439195\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.784227},{"message":"[ability => google_map_setting, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1055569943 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"18 characters\">google_map_setting<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1055569943\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.786509},{"message":"[\n  ability => google_firebase_setting,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-707767380 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"23 characters\">google_firebase_setting<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-707767380\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.788761},{"message":"[ability => shipping_configuration, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1495987618 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"22 characters\">shipping_configuration<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1495987618\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.7909},{"message":"[ability => shipping_configuration, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-531731178 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"22 characters\">shipping_configuration<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-531731178\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.792965},{"message":"[\n  ability => shipping_country_setting,\n  result => true,\n  user => 9,\n  arguments => []\n]","message_html":"<pre class=sf-dump id=sf-dump-603461134 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"24 characters\">shipping_country_setting<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-603461134\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.795148},{"message":"[ability => manage_shipping_states, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1909063427 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"22 characters\">manage_shipping_states<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1909063427\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.797299},{"message":"[ability => manage_shipping_cities, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1671961610 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"22 characters\">manage_shipping_cities<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1671961610\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.799424},{"message":"[ability => manage_zones, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1106509457 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"12 characters\">manage_zones<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1106509457\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.801758},{"message":"[ability => manage_carriers, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-337253523 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">manage_carriers<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-337253523\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.804157},{"message":"[ability => header_setup, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1190073370 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"12 characters\">header_setup<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1190073370\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.806303},{"message":"[ability => view_all_staffs, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1211197454 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">view_all_staffs<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1211197454\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.808374},{"message":"[ability => view_staff_roles, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-1717287085 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"16 characters\">view_staff_roles<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1717287085\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.810472},{"message":"[ability => system_update, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-644520627 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"13 characters\">system_update<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-644520627\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.812688},{"message":"[ability => system_update, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-936298322 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"13 characters\">system_update<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-936298322\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.814766},{"message":"[ability => server_status, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-617970070 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"13 characters\">server_status<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-617970070\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.817085},{"message":"[ability => manage_addons, result => true, user => 9, arguments => []]","message_html":"<pre class=sf-dump id=sf-dump-121981829 data-indent-pad=\"  \"><span class=sf-dump-note>array:4<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>ability<\/span>\" => \"<span class=sf-dump-str title=\"13 characters\">manage_addons<\/span>\"\n  \"<span class=sf-dump-key>result<\/span>\" => <span class=sf-dump-const>true<\/span>\n  \"<span class=sf-dump-key>user<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>arguments<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">[]<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-121981829\", {\"maxDepth\":0})<\/script>\n","is_string":false,"label":"success","time":1695874439.819234}]},"session":{"_token":"vPgAqDZsFhTPj3bFGwyI6PuwRI8jvPJ5RVtYtPCU","locale":"mm","_previous":"array:1 [\n  \"url\" => \"http:\/\/shop.microland.cloud\/admin\"\n]","_flash":"array:2 [\n  \"old\" => []\n  \"new\" => []\n]","url":"array:1 [\n  \"intended\" => \"http:\/\/shop.microland.cloud\/admin\"\n]","login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d":"9","auth":"array:1 [\n  \"password_confirmed_at\" => 1695874429\n]","PHPDEBUGBAR_STACK_DATA":"[]"},"request":{"path_info":"\/admin","status_code":"<pre class=sf-dump id=sf-dump-611476504 data-indent-pad=\"  \"><span class=sf-dump-num>200<\/span>\n<\/pre><script>Sfdump(\"sf-dump-611476504\", {\"maxDepth\":0})<\/script>\n","status_text":"OK","format":"html","content_type":"text\/html; charset=UTF-8","request_query":"<pre class=sf-dump id=sf-dump-1636599785 data-indent-pad=\"  \">[]\n<\/pre><script>Sfdump(\"sf-dump-1636599785\", {\"maxDepth\":0})<\/script>\n","request_request":"<pre class=sf-dump id=sf-dump-2095289853 data-indent-pad=\"  \">[]\n<\/pre><script>Sfdump(\"sf-dump-2095289853\", {\"maxDepth\":0})<\/script>\n","request_headers":"<pre class=sf-dump id=sf-dump-835567973 data-indent-pad=\"  \"><span class=sf-dump-note>array:11<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>cookie<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"130 characters\">XSRF-TOKEN=vPgAqDZsFhTPj3bFGwyI6PuwRI8jvPJ5RVtYtPCU; microland_ecommerce_platform_session=qnifmIK09kx2RPIgQiGycfzrWrDRqGA6ZGeGYswr<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept-language<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"11 characters\">my,en;q=0.9<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept-encoding<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"13 characters\">gzip, deflate<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"135 characters\">text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/avif,image\/webp,image\/apng,*\/*;q=0.8,application\/signed-exchange;v=b3;q=0.7<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>user-agent<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"101 characters\">Mozilla\/5.0 (X11; Linux x86_64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/117.0.0.0 Safari\/537.36<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>upgrade-insecure-requests<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str>1<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>dnt<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str>1<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>connection<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"5 characters\">close<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>x-accel-internal<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"31 characters\">\/internal-nginx-static-location<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>x-real-ip<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"11 characters\">69.160.8.34<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>host<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"20 characters\">shop.microland.cloud<\/span>\"\n  <\/samp>]\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-835567973\", {\"maxDepth\":0})<\/script>\n","request_server":"<pre class=sf-dump id=sf-dump-189917591 data-indent-pad=\"  \"><span class=sf-dump-note>array:48<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>USER<\/span>\" => \"<span class=sf-dump-str title=\"27 characters\">microland.cloud_7sfitjuepd6<\/span>\"\n  \"<span class=sf-dump-key>HOME<\/span>\" => \"<span class=sf-dump-str title=\"31 characters\">\/var\/www\/vhosts\/microland.cloud<\/span>\"\n  \"<span class=sf-dump-key>SCRIPT_NAME<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">\/index.php<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_URI<\/span>\" => \"<span class=sf-dump-str title=\"6 characters\">\/admin<\/span>\"\n  \"<span class=sf-dump-key>QUERY_STRING<\/span>\" => \"\"\n  \"<span class=sf-dump-key>REQUEST_METHOD<\/span>\" => \"<span class=sf-dump-str title=\"3 characters\">GET<\/span>\"\n  \"<span class=sf-dump-key>SERVER_PROTOCOL<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">HTTP\/1.0<\/span>\"\n  \"<span class=sf-dump-key>GATEWAY_INTERFACE<\/span>\" => \"<span class=sf-dump-str title=\"7 characters\">CGI\/1.1<\/span>\"\n  \"<span class=sf-dump-key>REDIRECT_URL<\/span>\" => \"<span class=sf-dump-str title=\"6 characters\">\/admin<\/span>\"\n  \"<span class=sf-dump-key>REMOTE_PORT<\/span>\" => \"<span class=sf-dump-str title=\"5 characters\">54804<\/span>\"\n  \"<span class=sf-dump-key>SCRIPT_FILENAME<\/span>\" => \"<span class=sf-dump-str title=\"64 characters\">\/var\/www\/vhosts\/microland.cloud\/shop.taidictionary.com\/index.php<\/span>\"\n  \"<span class=sf-dump-key>SERVER_ADMIN<\/span>\" => \"<span class=sf-dump-str title=\"14 characters\">root@localhost<\/span>\"\n  \"<span class=sf-dump-key>CONTEXT_DOCUMENT_ROOT<\/span>\" => \"<span class=sf-dump-str title=\"54 characters\">\/var\/www\/vhosts\/microland.cloud\/shop.taidictionary.com<\/span>\"\n  \"<span class=sf-dump-key>CONTEXT_PREFIX<\/span>\" => \"\"\n  \"<span class=sf-dump-key>REQUEST_SCHEME<\/span>\" => \"<span class=sf-dump-str title=\"4 characters\">http<\/span>\"\n  \"<span class=sf-dump-key>DOCUMENT_ROOT<\/span>\" => \"<span class=sf-dump-str title=\"54 characters\">\/var\/www\/vhosts\/microland.cloud\/shop.taidictionary.com<\/span>\"\n  \"<span class=sf-dump-key>REMOTE_ADDR<\/span>\" => \"<span class=sf-dump-str title=\"11 characters\">69.160.8.34<\/span>\"\n  \"<span class=sf-dump-key>SERVER_PORT<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">80<\/span>\"\n  \"<span class=sf-dump-key>SERVER_ADDR<\/span>\" => \"<span class=sf-dump-str title=\"13 characters\">150.95.31.224<\/span>\"\n  \"<span class=sf-dump-key>SERVER_NAME<\/span>\" => \"<span class=sf-dump-str title=\"20 characters\">shop.microland.cloud<\/span>\"\n  \"<span class=sf-dump-key>SERVER_SOFTWARE<\/span>\" => \"<span class=sf-dump-str title=\"6 characters\">Apache<\/span>\"\n  \"<span class=sf-dump-key>SERVER_SIGNATURE<\/span>\" => \"\"\n  \"<span class=sf-dump-key>PATH<\/span>\" => \"<span class=sf-dump-str title=\"49 characters\">\/usr\/local\/sbin:\/usr\/local\/bin:\/usr\/sbin:\/usr\/bin<\/span>\"\n  \"<span class=sf-dump-key>HTTP_COOKIE<\/span>\" => \"<span class=sf-dump-str title=\"130 characters\">XSRF-TOKEN=vPgAqDZsFhTPj3bFGwyI6PuwRI8jvPJ5RVtYtPCU; microland_ecommerce_platform_session=qnifmIK09kx2RPIgQiGycfzrWrDRqGA6ZGeGYswr<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT_LANGUAGE<\/span>\" => \"<span class=sf-dump-str title=\"11 characters\">my,en;q=0.9<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT_ENCODING<\/span>\" => \"<span class=sf-dump-str title=\"13 characters\">gzip, deflate<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT<\/span>\" => \"<span class=sf-dump-str title=\"135 characters\">text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/avif,image\/webp,image\/apng,*\/*;q=0.8,application\/signed-exchange;v=b3;q=0.7<\/span>\"\n  \"<span class=sf-dump-key>HTTP_USER_AGENT<\/span>\" => \"<span class=sf-dump-str title=\"101 characters\">Mozilla\/5.0 (X11; Linux x86_64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/117.0.0.0 Safari\/537.36<\/span>\"\n  \"<span class=sf-dump-key>HTTP_UPGRADE_INSECURE_REQUESTS<\/span>\" => \"<span class=sf-dump-str>1<\/span>\"\n  \"<span class=sf-dump-key>HTTP_DNT<\/span>\" => \"<span class=sf-dump-str>1<\/span>\"\n  \"<span class=sf-dump-key>HTTP_CONNECTION<\/span>\" => \"<span class=sf-dump-str title=\"5 characters\">close<\/span>\"\n  \"<span class=sf-dump-key>HTTP_X_ACCEL_INTERNAL<\/span>\" => \"<span class=sf-dump-str title=\"31 characters\">\/internal-nginx-static-location<\/span>\"\n  \"<span class=sf-dump-key>HTTP_X_REAL_IP<\/span>\" => \"<span class=sf-dump-str title=\"11 characters\">69.160.8.34<\/span>\"\n  \"<span class=sf-dump-key>HTTP_HOST<\/span>\" => \"<span class=sf-dump-str title=\"20 characters\">shop.microland.cloud<\/span>\"\n  \"<span class=sf-dump-key>proxy-nokeepalive<\/span>\" => \"<span class=sf-dump-str>1<\/span>\"\n  \"<span class=sf-dump-key>PASSENGER_DOWNLOAD_NATIVE_SUPPORT_BINARY<\/span>\" => \"<span class=sf-dump-str>0<\/span>\"\n  \"<span class=sf-dump-key>PASSENGER_COMPILE_NATIVE_SUPPORT_BINARY<\/span>\" => \"<span class=sf-dump-str>0<\/span>\"\n  \"<span class=sf-dump-key>PERL5LIB<\/span>\" => \"<span class=sf-dump-str title=\"49 characters\">\/usr\/share\/awstats\/lib:\/usr\/share\/awstats\/plugins<\/span>\"\n  \"<span class=sf-dump-key>UNIQUE_ID<\/span>\" => \"<span class=sf-dump-str title=\"27 characters\">ZRT9hhBj56u6oSpgxDSkDwAAAEM<\/span>\"\n  \"<span class=sf-dump-key>REDIRECT_STATUS<\/span>\" => \"<span class=sf-dump-str title=\"3 characters\">200<\/span>\"\n  \"<span class=sf-dump-key>REDIRECT_PASSENGER_DOWNLOAD_NATIVE_SUPPORT_BINARY<\/span>\" => \"<span class=sf-dump-str>0<\/span>\"\n  \"<span class=sf-dump-key>REDIRECT_PASSENGER_COMPILE_NATIVE_SUPPORT_BINARY<\/span>\" => \"<span class=sf-dump-str>0<\/span>\"\n  \"<span class=sf-dump-key>REDIRECT_PERL5LIB<\/span>\" => \"<span class=sf-dump-str title=\"49 characters\">\/usr\/share\/awstats\/lib:\/usr\/share\/awstats\/plugins<\/span>\"\n  \"<span class=sf-dump-key>REDIRECT_UNIQUE_ID<\/span>\" => \"<span class=sf-dump-str title=\"27 characters\">ZRT9hhBj56u6oSpgxDSkDwAAAEM<\/span>\"\n  \"<span class=sf-dump-key>FCGI_ROLE<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">RESPONDER<\/span>\"\n  \"<span class=sf-dump-key>PHP_SELF<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">\/index.php<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_TIME_FLOAT<\/span>\" => <span class=sf-dump-num>1695874438.3804<\/span>\n  \"<span class=sf-dump-key>REQUEST_TIME<\/span>\" => <span class=sf-dump-num>1695874438<\/span>\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-189917591\", {\"maxDepth\":0})<\/script>\n","request_cookies":"<pre class=sf-dump id=sf-dump-1168775361 data-indent-pad=\"  \"><span class=sf-dump-note>array:2<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>XSRF-TOKEN<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">vPgAqDZsFhTPj3bFGwyI6PuwRI8jvPJ5RVtYtPCU<\/span>\"\n  \"<span class=sf-dump-key>microland_ecommerce_platform_session<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">qnifmIK09kx2RPIgQiGycfzrWrDRqGA6ZGeGYswr<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1168775361\", {\"maxDepth\":0})<\/script>\n","response_headers":"<pre class=sf-dump id=sf-dump-1887066465 data-indent-pad=\"  \"><span class=sf-dump-note>array:7<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>content-type<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"24 characters\">text\/html; charset=UTF-8<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>cache-control<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"24 characters\">private, must-revalidate<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>date<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"29 characters\">Thu, 28 Sep 2023 04:13:58 GMT<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>pragma<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"8 characters\">no-cache<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>expires<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => <span class=sf-dump-num>-1<\/span>\n  <\/samp>]\n  \"<span class=sf-dump-key>set-cookie<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"112 characters\">XSRF-TOKEN=vPgAqDZsFhTPj3bFGwyI6PuwRI8jvPJ5RVtYtPCU; expires=Thu, 28-Sep-2023 06:13:59 GMT; Max-Age=7200; path=\/<\/span>\"\n    <span class=sf-dump-index>1<\/span> => \"<span class=sf-dump-str title=\"148 characters\">microland_ecommerce_platform_session=qnifmIK09kx2RPIgQiGycfzrWrDRqGA6ZGeGYswr; expires=Thu, 28-Sep-2023 06:13:59 GMT; Max-Age=7200; path=\/; httponly<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>Set-Cookie<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"98 characters\">XSRF-TOKEN=vPgAqDZsFhTPj3bFGwyI6PuwRI8jvPJ5RVtYtPCU; expires=Thu, 28-Sep-2023 06:13:59 GMT; path=\/<\/span>\"\n    <span class=sf-dump-index>1<\/span> => \"<span class=sf-dump-str title=\"134 characters\">microland_ecommerce_platform_session=qnifmIK09kx2RPIgQiGycfzrWrDRqGA6ZGeGYswr; expires=Thu, 28-Sep-2023 06:13:59 GMT; path=\/; httponly<\/span>\"\n  <\/samp>]\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1887066465\", {\"maxDepth\":0})<\/script>\n","session_attributes":"<pre class=sf-dump id=sf-dump-513437221 data-indent-pad=\"  \"><span class=sf-dump-note>array:8<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>_token<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">vPgAqDZsFhTPj3bFGwyI6PuwRI8jvPJ5RVtYtPCU<\/span>\"\n  \"<span class=sf-dump-key>locale<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">mm<\/span>\"\n  \"<span class=sf-dump-key>_previous<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>url<\/span>\" => \"<span class=sf-dump-str title=\"33 characters\">http:\/\/shop.microland.cloud\/admin<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>_flash<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>old<\/span>\" => []\n    \"<span class=sf-dump-key>new<\/span>\" => []\n  <\/samp>]\n  \"<span class=sf-dump-key>url<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>intended<\/span>\" => \"<span class=sf-dump-str title=\"33 characters\">http:\/\/shop.microland.cloud\/admin<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d<\/span>\" => <span class=sf-dump-num>9<\/span>\n  \"<span class=sf-dump-key>auth<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>password_confirmed_at<\/span>\" => <span class=sf-dump-num>1695874429<\/span>\n  <\/samp>]\n  \"<span class=sf-dump-key>PHPDEBUGBAR_STACK_DATA<\/span>\" => []\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-513437221\", {\"maxDepth\":0})<\/script>\n"}}, "Xa2abd0328a23d5277a88feaf7a627c50");

</script>
</body>
</html>
