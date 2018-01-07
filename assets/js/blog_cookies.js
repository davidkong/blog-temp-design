// note: this file is no longer includde in WP and can be removed

console.log("beginning blog_cookies")

function getCookie(name)
  {
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? unescape(value[1]) : null;
  }

// note: we started setting and incrementing this cookie in September 2017
var viewCount = parseFloat(getCookie("viewed_article_count"));

if (!viewCount) {
    viewCount = 1;
} else {
    viewCount += 1;
    console.log("viewcount incrementing to " + viewCount);
}

document.cookie="viewed_article_count=" + viewCount + "; domain=.frame.io; expires=Thu, 18 Dec 2035 12:00:00 UTC";

