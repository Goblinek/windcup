function kill(e) {
    return false;
}

function reEnable() {
    return true;
}

document.onselectstart = new Function("return false");

if(window.sidebar) {
    document.onmousedown = kill;
    document.onclick = reEnable;
}
