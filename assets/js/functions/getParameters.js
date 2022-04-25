// Return GET parameter
function getGETParam(param) {
    return new URLSearchParams(window.location.search).get(param);
}

// Set GET parameter
function setGETParam(param, value) {
    let url = new URLSearchParams(window.location.search);
    url.set(param, value);
    let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + url;
    window.history.replaceState({}, document.title, newurl);
}

// Remove GET Parameter
function removeGetParam(param) {
    let url = new URLSearchParams(window.location.search);
    url.delete(param);
    url = url.toString().length > 0 ? '?' + url : url;
    let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + url;
    window.history.replaceState({}, document.title, newurl);
}

export {getGETParam, setGETParam, removeGetParam}