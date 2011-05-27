has-js
======

Adds the class "has-js" to the body to prevent fallback content from showing. Removes this class if an error occurs.

Use this class in your CSS to hide fallback elements.

Usage
-----

Add this javascript directly under the opening `<body>` tag. This will ensure the class is added _before_ the content is shown:

```html
<script>
	document.body.className+=' has-js';
	var hasjsrm=setTimeout(function(){document.body.className=document.body.className.replace(' has-js','')},5000);
</script>
```

The first line adds the class "has-js" to the body. The second removes it again after 5 seconds. We will be cancelling this timeout later _if_ there are no errors in our javascript.

At the foot of the page, just before the closing `</html>` tag, link to your javascript file(s) as usual:

```html
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="/script.js"></script>
```

In your final js file (`script.js`), add these lines of code to the bottom of the script:

```javascript
clearTimeout(hasjsrm);
$('body').addClass('has-js');
```

This removes the timeout (and adds the class again if it was too late).

If you aren't using jQuery on your page then use this code instead:

```javascript
clearTimeout(hasjsrm);
document.body.className+=' has-js';
```

The CSS
-------

This should be obvious, but hide any fallback elements in your CSS by setting them to `display: none;`:

```css
.has-js input[type="submit"] {
	display: none;
}
```

Why has-js
----------

Progressive enhancement is a great technique, but many websites briefly show the fallback before the javascript has loaded fully. On slow connections this can be particularly noticeable.

By running this javascript inline and before the closing body tag, there is no possibility for fallback content to be shown.

One potential issue could be if has-js works, but for whatever reason the main JS file fails (dropped network connection, parse error etc). We need our websites to be bulletproof. If, after 5 seconds our javascript hasn't loaded, we show the non-javascript controls to the user. If the script was just taking its time, no harm done, we will hide them again.

If 5 seconds isn't long enough for your particular scenario, feel free to make this time longer.